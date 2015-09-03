<?php
/*
	This file is part of UserMgmt.

	Author: Chetan Varshney (http://ektasoftwares.com)

	UserMgmt is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	UserMgmt is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
*/

App::uses('UserMgmtAppController', 'Usermgmt.Controller');

class TreatmentController extends UserMgmtAppController {
	/**
	 * This controller uses following models
	 *
	 * @var array
	 */
	public $uses = array('Usermgmt.User', 'Usermgmt.UserGroup', 'Usermgmt.LoginToken','Treatment','Patient','ProcedureCategory');
	/**
	 * Called before the controller action.  You can use this method to configure and customize components
	 * or perform logic that needs to happen before each controller action.
	 *
	 * @return void
	 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this->User->userAuth=$this->UserAuth;
	}
	/**
	 * Used to display all users by Admin
	 *
	 * @access public
	 * @return array
	 */
	public function index($type='') {
		$treatment=$this->Treatment->find('all', array('order'=>'Treatment.id desc'));
		$this->set('treatment', $treatment);
	}

	public function allConsultations(){
		$this->Treatment->bindModel(array('belongsTo'=>array('User'=>array(),'User'=>array('foreignKey'=>false,'conditions'=>array("User.id = Treatment.doctor_id")))));
		$this->Treatment->bindModel(array('belongsTo'=>array('Patient'=>array(),'Patient'=>array('foreignKey'=>false,'conditions'=>array("Patient.id = Treatment.patient_id")))));
		

		$limit=PAGE_LIMIT;
		$this->paginate = array(
				 'conditions'=>array('Treatment.type'=>'consultation'),
				 'order'=>array('Treatment.id'=> 'desc'),
                 'limit' => $limit
             );
        $data = $this->paginate('Treatment');
        $this->set('patients',$data);


		//$patients=$this->Treatment->find('all', array('conditions'=>array('Treatment.type'=>'consultation'),'order'=>array('Treatment.id'=> 'desc')));
		//$this->set('patients',$patients);
	}

	public function allProcedures(){
		$this->Treatment->bindModel(array('belongsTo'=>array('User'=>array(),'User'=>array('foreignKey'=>false,'conditions'=>array("User.id = Treatment.doctor_id")))));
		$this->Treatment->bindModel(array('belongsTo'=>array('Patient'=>array(),'Patient'=>array('foreignKey'=>false,'conditions'=>array("Patient.id = Treatment.patient_id")))));
		
		$limit=PAGE_LIMIT;
		$this->paginate = array(
				 'conditions'=>array('Treatment.type'=>'procedure'),
				 'order'=>array('Treatment.id'=> 'desc'),
                 'limit' => $limit
             );
        $data = $this->paginate('Treatment');
        $this->set('patients',$data);

		// $patients=$this->Treatment->find('all', array('conditions'=>array('Treatment.type'=>'procedure'),'order'=>array('Treatment.id'=> 'desc')));
		// $this->set('patients',$patients);
	}

	
	public function addConsultation($patId='')
	{
		$doc=$this->User->getDoc();
		//var_dump($doc);
		$this->set('doctors', $doc);

		$patient=$this->Patient->find('first', array('order'=>'Patient.id desc','conditions'=>array('Patient.id'=>$patId)));
		$this->set('patient',$patient);
		$this->Treatment->bindModel(array('belongsTo'=>array('User'=>array(),'User'=>array('foreignKey'=>false,'conditions'=>array("User.id = Treatment.doctor_id")))));
		$patients=$this->Treatment->find('all', array('conditions'=>array('Treatment.patient_id'=>$patId,'Treatment.type'=>'consultation'),'order'=>array('Treatment.id'=> 'desc')));
		//debug($patients);
		$this->set('patients',$patients);

		if ($this->request -> isPost()) {
				$this->request->data['Treatment']['type']='consultation';
				//var_dump($this->request->data['Treatment']['image']);

				if(!empty($this->request->data['Treatment']['image']['name']))
                {
                        $file = $this->request->data['Treatment']['image']; //put the data into a var for easy use

                        $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                        $arr_ext = array('jpg', 'jpeg', 'gif','png'); //set allowed extensions
                        $rand=rand('111111','999999')."_";
                        //only process if the extension is valid
                        if(in_array($ext, $arr_ext))
                        {
                                //do the actual uploading of the file. First arg is the tmp name, second arg is 
                                //where we are putting it
                                move_uploaded_file($file['tmp_name'], WWW_ROOT . 'uploads/consultation/' . $rand.$file['name']);

                                //prepare the filename for database entry
                                
                        }
                }
				
				if(isset($file))
					$this->request->data['Treatment']['image'] = 'uploads/consultation/'.$rand.$file['name'];
				else
					$this->request->data['Treatment']['image'] = "";



				$this->Treatment->set($this->data);
				//if($this->Treatment->thisValidate()){
					$this->Treatment->save($this->request->data,false);
					$this->Session->setFlash(__('The Treatment is successfully added'));
					$this->redirect('/addConsultation/'.$patId);
				//}
		}
	}
	public function addProcedure($patId='')
	{
		$doc=$this->User->getDoc();
		//var_dump($doc);
		$this->set('doctors', $doc);

		$categories=$this->ProcedureCategory->getCategory();
		//var_dump($doc);
		$this->set('categories', $categories);

		$patient=$this->Patient->find('first', array('order'=>'Patient.id desc','conditions'=>array('Patient.id'=>$patId)));
		$this->set('patient',$patient);

		$this->Treatment->bindModel(array('belongsTo'=>array('User'=>array(),'User'=>array('foreignKey'=>false,'conditions'=>array("User.id = Treatment.doctor_id")))));
		$patients=$this->Treatment->find('all', array('conditions'=>array('Treatment.patient_id'=>$patId,'Treatment.type'=>'procedure'),'order'=>array('Treatment.id'=> 'desc')));
		//debug($patients);
		$this->set('patients',$patients);
		

		if ($this->request -> isPost()) {
				$this->request->data['Treatment']['type']='procedure';
				//var_dump($this->request->data['Treatment']['image'])
				$this->Treatment->set($this->data);
				//if($this->Treatment->thisValidate()){
					$this->Treatment->save($this->request->data,false);
					$this->Session->setFlash(__('The Treatment is successfully added'));
					$this->redirect('/addProcedure/'.$patId);
				//}
		}
	}

	public function deleteProcedure($catId='')
	{
		if (!empty($catId)) {
				if ($this->request -> isPost()) {
					if ($this->Treatment->delete($catId, false)) {
						$this->Session->setFlash(__('Category is successfully deleted'));
						$this->redirect('/allProCats');
					}
					else{
						$this->Session->setFlash(__('Cannot Delete Category'));
						$this->redirect('/allProCats');
					}
				}
			} else {
				$this->redirect('/allProCats');
			}
	}
	public function deleteConsultation($catId='')
	{
		if (!empty($catId)) {
				if ($this->request -> isPost()) {
					if ($this->Treatment->delete($catId, false)) {
						$this->Session->setFlash(__('Category is successfully deleted'));
						$this->redirect('/allProCats');
					}
					else{
						$this->Session->setFlash(__('Cannot Delete Category'));
						$this->redirect('/allProCats');
					}
				}
			} else {
				$this->redirect('/allProCats');
			}
	}

	public function editProcedure($catId='')
	{
		if (!empty($catId)) {
				
				if ($this->request -> isPut()) {
					$this->Treatment->set($this->data);
					//if ($this->PropertyCase->thisValidate()) {
						$this->Treatment->save($this->request->data,false);
						$this->Session->setFlash(__('The Category is successfully updated'));
						$this->redirect('/allProCats');
					//}
				} 
				else 
				{
					$case = $this->Treatment->read(null, $catId);
					$this->request->data=null;
					if (!empty($case)) {
						$this->request->data = $case;
					}
				}
			} else {
				$this->redirect('/allProCats');
			}
	}
	public function editConsultation($catId='')
	{
		if (!empty($catId)) {
				
				if ($this->request -> isPut()) {
					$this->Treatment->set($this->data);
					//if ($this->PropertyCase->thisValidate()) {
						$this->Treatment->save($this->request->data,false);
						$this->Session->setFlash(__('The Category is successfully updated'));
						$this->redirect('/allProCats');
					//}
				} 
				else 
				{
					$case = $this->Treatment->read(null, $catId);
					$this->request->data=null;
					if (!empty($case)) {
						$this->request->data = $case;
					}
				}
			} else {
				$this->redirect('/allProCats');
			}
	}

	public function allReports($value='')
	{
		$typeOfTreatments=array('all'=>'All Treatments','consultation'=>'Consultation','procedure'=>'Procedure');
		$this->set('types', $typeOfTreatments);
		$by=array('day'=>'By Day','week'=>'Weekly','month'=>'Monthly','year'=>'Yearly');
		$this->set('bydays', $by);

		$category_id=array('0'=>'All Procedure','Cosmatic'=>'Cosmatic','Medicare'=>'Medicare');
		$this->set('categories', $category_id);

		$doc=$this->User->getDocAll();
		$this->set('doctors', $doc);

		$this->Treatment->bindModel(array('belongsTo'=>array('User'=>array(),'User'=>array('foreignKey'=>false,'conditions'=>array("User.id = Treatment.doctor_id")))));
		$this->Treatment->bindModel(array('belongsTo'=>array('Patient'=>array(),'Patient'=>array('foreignKey'=>false,'conditions'=>array("Patient.id = Treatment.patient_id")))));
		$this->Treatment->bindModel(array('belongsTo'=>array('ProcedureCategory'=>array(),'ProcedureCategory'=>array('foreignKey'=>false,'conditions'=>array("ProcedureCategory.id = Treatment.category_id",'Treatment.category_id!=0')))));
		
		//$patients=$this->Treatment->find('all', array('conditions'=>array('Treatment.type'=>'procedure'),'order'=>array('Treatment.id'=> 'desc')));
		if ($this->request -> isPost() && isset($this->request->data['allReports']['byday_id'])) {
			
			$byid=$this->request->data['allReports']['byday_id'];
			
			if($byid=='day'){
				$conditions=array("STR_TO_DATE(Treatment.time, '%Y-%m-%d') = '".date('Y-m-d')."'");
			}
			elseif($byid=='week'){
				$dayoftheweek = date('w'); //PHP : from 0 (sunday) to 6 (pour saturday)
				if ($dayoftheweek == 0)
				$dayoftheweek = 7;
				$monday= mktime(0, 0, 0, date('m') , date('d') - $dayoftheweek +1, date('Y'));
				$sunday= mktime(0, 0, 0, date('m') , date('d') + 7 - $dayoftheweek, date('Y'));
				$date1=date('Y-m-d', $monday);$date2=date('Y-m-d', $sunday) ;

				$conditions=array("STR_TO_DATE(Treatment.time, '%Y-%m-%d') between '$date1' and '$date2'");
			}
			elseif($byid=='month'){
				$conditions=array("DATE_FORMAT(Treatment.time, '%Y-%m') = '".date('Y-m')."'");
			}
			elseif($byid=='year'){
				$conditions=array("YEAR(STR_TO_DATE(Treatment.time, '%Y-%m-%d')) = '".date('Y')."'");
			}
			else{
				$conditions=array("STR_TO_DATE(Treatment.time, '%Y-%m-%d') = '".date('Y-m-d')."'");
			}

			$patients=$this->Treatment->find('all', array('conditions'=>$conditions,'order'=>array('Treatment.id'=> 'desc')));
			$this->set('patients',$patients);
		}
		elseif ($this->request -> isPost() && !isset($this->request->data['allReports']['byday_id'])) {
			$chk_date1=$this->request->data['allReports']['date1'];
			$chk_date2=$this->request->data['allReports']['date2'];
			$date1=date('Y-m-d',strtotime($this->request->data['allReports']['date1']));
			$date2=date('Y-m-d',strtotime($this->request->data['allReports']['date2']));
			$type=$this->request->data['allReports']['type_id'];
			$doctor=$this->request->data['allReports']['doctor_id'];
			$category=$this->request->data['allReports']['category_id'];
			$conditions=array();
			
			if($type!='all'){
				$conditions['Treatment.type']=$type;
			}

			if($doctor!='0'){
				$conditions['Treatment.doctor_id']=$doctor;
			}
			if($category!='0'){
				$conditions['ProcedureCategory.type']=$category;
			}
			if(!empty($chk_date1) && !empty($chk_date2)){
				$conditions=array();
				if($type!='all'){
					$conditions['Treatment.type']=$type;
				}

				if($doctor!='0'){
					$conditions['Treatment.doctor_id']=$doctor;
				}
				$conditions['and'] = array(array("STR_TO_DATE(Treatment.time, '%Y-%m-%d') between '$date1' and '$date2'"));
			}


			$patients=$this->Treatment->find('all', array('conditions'=>$conditions,'order'=>array('Treatment.id'=> 'desc')));
			$this->set('patients',$patients);
		}
		else{

			$conditions=array();
			$limit=PAGE_LIMIT;
			$this->paginate = array(
					 'conditions'=>$conditions,
					 'order'=>array('Treatment.id'=> 'desc'),
	                 'limit' => $limit
	             );
	        $data = $this->paginate('Treatment');
	        $this->set('patients',$data);
	        $this->set('all',true);
	        $total=$this->Treatment->find('first', array('conditions'=>$conditions,'fields'=>'count(*) as total_row','order'=>array('Treatment.id'=> 'desc')));
			$total=$total[0]['total_row'];
			$this->set('total',$total);
			//var_dump($total);

			$sum=$this->Treatment->find('first', array('conditions'=>$conditions,'fields'=>'sum(fee) as sum_row','order'=>array('Treatment.id'=> 'desc')));
			$sum=$sum[0]['sum_row'];
			$this->set('sum',$sum);
			//var_dump($sum);



		}
	}
	
}