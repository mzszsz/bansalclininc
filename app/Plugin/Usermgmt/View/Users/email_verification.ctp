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
?>
<div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="login-panel panel panel-default" style="margin-top:40px;">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                        	<span class="umstyle1"><?php echo __('Email Verification'); ?></span>
							<span class="umstyle2" style="float:right"><?php echo $this->Html->link(__("Home",true),"/") ?></span>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <?php echo $this->Session->flash(); ?>


						<?php echo $this->Form->create('User', array('action' => 'emailVerification')); ?>
						<div class="form-group">
							<div class="row">
							<div class="col-sm-5"><?php echo __('Enter Email / Username');?></div>
							<div class="col-sm-7" ><?php echo $this->Form->input("email" ,array('label' => false,'div' => false,'class'=>"form-control" ))?></div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
							<div class="col-sm-5"></div>
							<div class="col-sm-7"><?php echo $this->Form->Submit(__('Send Email'));?></div>
							</div>
						</div>
						<?php echo $this->Form->end(); ?>
					</div>
			</div>
		</div>
	</div>
</div>	