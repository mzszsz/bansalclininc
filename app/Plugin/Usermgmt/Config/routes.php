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

// Routes for standard actions

Router::connect('/login', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'login'));
Router::connect('/logout', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'logout'));
Router::connect('/forgotPassword', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'forgotPassword'));
Router::connect('/activatePassword/*', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'activatePassword'));
Router::connect('/register', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'register'));
Router::connect('/changePassword', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'changePassword'));
Router::connect('/changeUserPassword/*', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'changeUserPassword'));
Router::connect('/addUser/*', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'addUser'));

//Patient CONTROLLER
Router::connect('/addPatient', array('controller' => 'patients', 'action' => 'addPatient'));
Router::connect('/editPatient/*', array('controller' => 'patients', 'action' => 'editPatient'));
Router::connect('/allPatients', array( 'controller' => 'patients', 'action' => 'index'));
Router::connect('/deletePatient/*', array('controller' => 'patients', 'action' => 'deletePatient'));

Router::connect('/addConsultation/*', array('controller' => 'Treatment', 'action' => 'addConsultation'));
Router::connect('/allConsultations/*', array('controller' => 'Treatment', 'action' => 'allConsultations'));
Router::connect('/deleteConsultation/*', array('controller' => 'Treatment', 'action' => 'deleteConsultation'));
Router::connect('/editConsultation/*', array('controller' => 'Treatment', 'action' => 'editConsultation'));

Router::connect('/addProcedure/*', array('controller' => 'Treatment', 'action' => 'addProcedure'));
Router::connect('/allProcedures/*', array('controller' => 'Treatment', 'action' => 'allProcedures'));
Router::connect('/deleteProcedure/*', array('controller' => 'Treatment', 'action' => 'deleteProcedure'));
Router::connect('/editProcedure/*', array('controller' => 'Treatment', 'action' => 'editProcedure'));

//CASE CONTROLLER
Router::connect('/addProCat', array('controller' => 'ProcedureCategory', 'action' => 'addProCat'));
Router::connect('/editProCat/*', array('controller' => 'ProcedureCategory', 'action' => 'editProCat'));
Router::connect('/allProCats', array( 'controller' => 'ProcedureCategory', 'action' => 'index'));
Router::connect('/deleteProCat/*', array('controller' => 'ProcedureCategory', 'action' => 'deleteProCat'));

Router::connect('/editUser/*', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'editUser'));
Router::connect('/deleteUser/*', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'deleteUser'));
Router::connect('/viewUser/*', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'viewUser'));
Router::connect('/userVerification/*', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'userVerification'));
Router::connect('/allUsers/*', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'index'));
Router::connect('/dashboard', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'dashboard'));
Router::connect('/permissions', array('plugin' => 'usermgmt', 'controller' => 'user_group_permissions', 'action' => 'index'));
Router::connect('/update_permission', array('plugin' => 'usermgmt', 'controller' => 'user_group_permissions', 'action' => 'update'));
Router::connect('/accessDenied', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'accessDenied'));
Router::connect('/myprofile', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'myprofile'));
Router::connect('/allGroups', array('plugin' => 'usermgmt', 'controller' => 'user_groups', 'action' => 'index'));
Router::connect('/addGroup', array('plugin' => 'usermgmt', 'controller' => 'user_groups', 'action' => 'addGroup'));
Router::connect('/editGroup/*', array('plugin' => 'usermgmt', 'controller' => 'user_groups', 'action' => 'editGroup'));
Router::connect('/deleteGroup/*', array('plugin' => 'usermgmt', 'controller' => 'user_groups', 'action' => 'deleteGroup'));
Router::connect('/emailVerification', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'emailVerification'));


