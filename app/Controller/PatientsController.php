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

class PatientsController extends UserMgmtAppController {
	/**
	 * This controller uses following models
	 *
	 * @var array
	 */
	public $uses = array('Usermgmt.User', 'Usermgmt.UserGroup', 'Usermgmt.LoginToken','Patient','Treatment');
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
		$patients=$this->Patient->find('all', array('order'=>'Patient.id desc','admin_id'=>$this->UserAuth->getUserId()));
		$this->set('patients', $patients);
	}
	public function addPatient($value='')
	{
		$typeOfTreatments=array('consultation'=>'Consultation','procedure'=>'Procedure');
			$this->set('typeOfTreatments', $typeOfTreatments);

		if ($this->request -> isPost()) {
				$this->Patient->set($this->data);
				//if($this->ProcedureCategory->thisValidate()){
					$this->Patient->save($this->request->data,false);
					$this->Session->setFlash(__('Patient is successfully added'));
					$maxpID=$this->Patient->getLastInsertId();
					if($this->request->data['Patient']['type_of_treatment']=='consultation')
					$this->redirect('/addConsultation/'.$maxpID);
					if($this->request->data['Patient']['type_of_treatment']=='procedure')
					$this->redirect('/addProcedure/'.$maxpID);
				//}
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
					//if ($this->PropertyCase->thisValidate()) {
						$this->Patient->save($this->request->data,false);
						$this->Session->setFlash(__('The Patient is successfully updated'));
						$this->redirect('/allPatients');
					//}
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

	
}