<?php
App::uses('UserMgmtAppController', 'Usermgmt.Controller');

class PatientsController extends UserMgmtAppController {
	/**
	 * This controller uses following models
	 *
	 * @var array
	 */
	public $uses = array('Usermgmt.User', 'Usermgmt.UserGroup', 'Usermgmt.LoginToken','Patient','Treatment');
	var $paginate = array(
		'limit' => 5
		);

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
		$limit=PAGE_LIMIT;
		$this->paginate = array(
				 //'conditions'=>array('admin_id'=>$this->UserAuth->getUserId()),
				 'order'=>'Patient.id desc',
                 'limit' => $limit
             );
        $data = $this->paginate('Patient');
        $this->set('patients',$data);
        $this->set('limit',$limit);

            // echo "<pre>";
            // var_dump($data); 
            // echo "</pre>";

		//ALL PATIENTS LOOP
		//$patients=$this->Patient->find('all', array('order'=>'Patient.id desc',array('conditions'=>array('admin_id'=>$this->UserAuth->getUserId()))));
		//$this->set('patients', $patients);

		//COUNT CONSULTAIONS FOR EACH PATIENT
		$queryConsultation=$this->Treatment->query("SELECT count(*) as total,patient_id FROM treatments where type='consultation' group by patient_id;");
		$countConsultation=array();
		foreach ($queryConsultation as $key => $value) {
			$countConsultation[$value['treatments']['patient_id']]=$value[0]['total'];
		}
		$this->set('countConsultation',$countConsultation);

		//COUNT PROCEDURES FOR EACH PATIENT
		$queryProcedure=$this->Treatment->query("SELECT count(*) as total,patient_id FROM treatments where type='procedure' group by patient_id;");
		$countProcedure=array();
		foreach ($queryProcedure as $key => $value) {
			$countProcedure[$value['treatments']['patient_id']]=$value[0]['total'];
		}
		$this->set('countProcedure',$countProcedure);
	}
	public function addPatient($value='')
	{
		$typeOfTreatments=array('consultation'=>'Consultation','procedure'=>'Procedure');
		
		$this->set('typeOfTreatments', $typeOfTreatments);

		if ($this->request -> isPost()) {
				$this->Patient->set($this->data);
				if($this->Patient->thisValidate()){
					$this->request->data['Patient']['admin_id']=$this->User->mainParentId();
					$this->Patient->save($this->request->data,false);
					$this->Session->setFlash(__('Patient is successfully added'));
					$maxpID=$this->Patient->getLastInsertId();
					if($this->request->data['Patient']['type_of_treatment']=='consultation')
					$this->redirect('/addConsultation/'.$maxpID);
					if($this->request->data['Patient']['type_of_treatment']=='procedure')
					$this->redirect('/addProcedure/'.$maxpID);
				}
				else{
					//var_dump($this->Patient->validationErrors);
					if(isset($this->Patient->validationErrors['phone']) && $this->request->data['Patient']['phone']!=''){
						$old_patient=$this->Patient->find('first', array('order'=>'Patient.id desc','conditions'=>array('phone'=>$this->request->data['Patient']['phone'])));
						$this->set('old_patient', $old_patient['Patient']['id']);
					}
					elseif(isset($this->Patient->validationErrors['email']) && $this->request->data['Patient']['email']!=''){
						$old_patient=$this->Patient->find('first', array('order'=>'Patient.id desc','conditions'=>array('email'=>$this->request->data['Patient']['email'])));
						$this->set('old_patient', $old_patient['Patient']['id']);
					}
					//var_dump($old_patient['Patient']['id']);
				}
		}
	}

	public function deletePatient($patientId='')
	{
		if (!empty($patientId)) {
				if ($this->request -> isPost()) {
					if ($this->Patient->delete($patientId, false)) {
						$this->Session->setFlash(__('Patient is successfully deleted'));
						$this->redirect('/allPatients');
					}
					else{
						$this->Session->setFlash(__('Cannot Delete Patient'));
						$this->redirect('/allPatients');
					}
				}
			} else {
				$this->redirect('/allPatients');
			}
	}

	public function editPatient($patientId='')
	{
		if (!empty($patientId)) {
				
				if ($this->request -> isPut()) {
					$this->Patient->set($this->data);
					if ($this->Patient->thisValidate()) {
						$this->Patient->save($this->request->data,false);
						$this->Session->setFlash(__('The Patient is successfully updated'));
						$this->redirect('/allPatients');
					}
				} 
				else 
				{
					$patient = $this->Patient->read(null, $patientId);
					$this->request->data=null;
					if (!empty($patient)) {
						$this->request->data = $patient;
					}
				}
			} else {
				$this->redirect('/allPatients');
			}
			$this->Treatment->bindModel(array('belongsTo'=>array('User'=>array(),'User'=>array('foreignKey'=>false,'conditions'=>array("User.id = Treatment.doctor_id")))));
			$this->Treatment->bindModel(array('belongsTo'=>array('Patient'=>array(),'Patient'=>array('foreignKey'=>false,'conditions'=>array("Patient.id = Treatment.patient_id")))));
			$patients=$this->Treatment->find('all', array('conditions'=>array('Treatment.patient_id'=>$patientId),'order'=>array('Treatment.id'=> 'desc')));
			$this->set('patients',$patients);
	}
	public function searchPatient($value='')
	{
		$this->layout='ajax';
		$limit=PAGE_LIMIT;
		$this->paginate = array(
				 'conditions'=>array('first_name like "%'.$value.'%" or last_name like "%'.$value.'%" or email like "%'.$value.'%" or phone like "%'.$value.'%"'),
				 'order'=>'Patient.id desc',
                 'limit' => $limit
             );
        $data = $this->paginate('Patient');
        $this->set('patients',$data);
        $this->set('limit',$limit);
	}
	
}