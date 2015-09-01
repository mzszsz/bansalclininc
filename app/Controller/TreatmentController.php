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
		$patients=$this->Treatment->find('all', array('conditions'=>array('Treatment.type'=>'consultation'),'order'=>array('Treatment.id'=> 'desc')));
		$this->set('patients',$patients);
	}

	public function allProcedures(){
		$this->Treatment->bindModel(array('belongsTo'=>array('User'=>array(),'User'=>array('foreignKey'=>false,'conditions'=>array("User.id = Treatment.doctor_id")))));
		$this->Treatment->bindModel(array('belongsTo'=>array('Patient'=>array(),'Patient'=>array('foreignKey'=>false,'conditions'=>array("Patient.id = Treatment.patient_id")))));
		$patients=$this->Treatment->find('all', array('conditions'=>array('Treatment.type'=>'procedure'),'order'=>array('Treatment.id'=> 'desc')));
		$this->set('patients',$patients);
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
					$this->redirect('/allPatients');
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
					$this->redirect('/allPatients');
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

	
}