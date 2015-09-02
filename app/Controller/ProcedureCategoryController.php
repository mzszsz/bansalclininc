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

class ProcedureCategoryController extends UserMgmtAppController {
	/**
	 * This controller uses following models
	 *
	 * @var array
	 */
	public $uses = array('Usermgmt.User', 'Usermgmt.UserGroup', 'Usermgmt.LoginToken','ProcedureCategory');
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
		// $categories=$this->ProcedureCategory->find('all', array('order'=>'ProcedureCategory.id desc','conditions'=>array('admin_id'=>$this->UserAuth->getUserId())));
		// $this->set('categories', $categories);

		$limit=PAGE_LIMIT;
		$this->paginate = array(
				 'conditions'=>array('admin_id'=>$this->UserAuth->getUserId()),
				 'order'=>'ProcedureCategory.id desc',
                 'limit' => $limit
             );
        $data = $this->paginate('ProcedureCategory');
        $this->set('categories',$data);
        $this->set('limit',$limit);
	}
	public function addProCat($value='')
	{
		if ($this->request -> isPost()) {
				$this->ProcedureCategory->set($this->data);
				//if($this->ProcedureCategory->thisValidate()){
					$this->ProcedureCategory->save($this->request->data,false);
					$this->Session->setFlash(__('The Category is successfully added'));
					$this->redirect('/allProCats');
				//}
		}
	}

	public function deleteProCat($catId='')
	{
		if (!empty($catId)) {
				if ($this->request -> isPost()) {
					if ($this->ProcedureCategory->delete($catId, false)) {
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

	public function editProCat($catId='')
	{
		if (!empty($catId)) {
				
				if ($this->request -> isPut()) {
					$this->ProcedureCategory->set($this->data);
					//if ($this->PropertyCase->thisValidate()) {
						$this->ProcedureCategory->save($this->request->data,false);
						$this->Session->setFlash(__('The Category is successfully updated'));
						$this->redirect('/allProCats');
					//}
				} 
				else 
				{
					$case = $this->ProcedureCategory->read(null, $catId);
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