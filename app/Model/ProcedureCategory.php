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
App::uses('UserMgmtAppModel', 'Usermgmt.Model');
App::uses('CakeEmail', 'Network/Email');

class ProcedureCategory extends UserMgmtAppModel {

	
	public function getCategory($single='') {
		$result=$this->find("all");
		$docs=array();
		foreach ($result as $row) {
			$docs[$row['ProcedureCategory']['id']]=$row['ProcedureCategory']['name']."-".$row['ProcedureCategory']['type'];
		}
		return $docs;
	}

}