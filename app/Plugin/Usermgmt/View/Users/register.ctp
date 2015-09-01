    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="login-panel panel panel-default" style="margin-top:40px;">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                        	<span class="umstyle1"><?php echo __('Sign Up or'); ?></span>
							<span  class="umstyle2"><?php echo $this->Html->link(__("Sign In",true),"/login") ?></span>
							<span class="umstyle2 pull-right"><?php echo $this->Html->link(__("Home",true),"/") ?></span>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <?php echo $this->Session->flash(); ?>
		
					<?php echo $this->Form->create('User', array('action' => 'register')); ?>
					<?php   /*if (count($userGroups) >2) { ?>
					<div class="form-group">
						<div class="row">
						<div class="col-sm-4"><label><?php echo __('Group');?><font color='red'>*</font></label></div>
						<div class="col-sm-8" ><?php echo $this->Form->input("user_group_id" ,array('type' => 'select', 'label' => false,'div' => false,'class'=>"form-control" ))?></div>
					</div>
					</div>
					<?php   } */  ?>
					<?php echo $this->Form->input("user_group_id" ,array('type' => 'hidden', 'label' => false,'div' => false,'value'=> $userGroupId))?>
					<div class="form-group">
						<div class="row">
						<div class="col-sm-4"><label><?php echo __('Username');?><font color='red'>*</font></label></div>
						<div class="col-sm-8" ><?php echo $this->Form->input("username" ,array('label' => false,'div' => false,'class'=>"form-control" ))?></div>
					</div>
					</div>
					<div class="form-group">
						<div class="row">
						<div class="col-sm-4"><label><?php echo __('First Name');?><font color='red'>*</font></label></div>
						<div class="col-sm-8" ><?php echo $this->Form->input("first_name" ,array('label' => false,'div' => false,'class'=>"form-control" ))?></div>
					</div>
					</div>
					<div class="form-group">
						<div class="row">
						<div class="col-sm-4"><label><?php echo __('Last Name');?><font color='red'>*</font></label></div>
						<div class="col-sm-8" ><?php echo $this->Form->input("last_name" ,array('label' => false,'div' => false,'class'=>"form-control" ))?></div>
					</div>
					</div>
					<div class="form-group">
						<div class="row">
						<div class="col-sm-4"><label><?php echo __('Email');?><font color='red'>*</font></label></div>
						<div class="col-sm-8" ><?php echo $this->Form->input("email" ,array('label' => false,'div' => false,'class'=>"form-control" ))?></div>
					</div>
					</div>
					<div class="form-group">
						<div class="row">
						<div class="col-sm-4"><label><?php echo __('Password');?><font color='red'>*</font></label></div>
						<div class="col-sm-8"><?php echo $this->Form->input("password" ,array("type"=>"password",'label' => false,'div' => false,'class'=>"form-control" ))?></div>
					</div>
					</div>
					<div class="form-group">
						<div class="row">
						<div class="col-sm-4"><label><?php echo __('Confirm Password');?><font color='red'>*</font></label></div>
						<div class="col-sm-8"><?php echo $this->Form->input("cpassword" ,array("type"=>"password",'label' => false,'div' => false,'class'=>"form-control" ))?></div>
					</div>
					</div>
			<?php   if(USE_RECAPTCHA && PRIVATE_KEY_FROM_RECAPTCHA !="" && PUBLIC_KEY_FROM_RECAPTCHA !="") { ?>
					<div class="form-group">
						<div class="row">
						<div class="umstyle4" style="margin-left:45px"><?php echo $this->UserAuth->showCaptcha(isset($this->validationErrors['User']['captcha'][0]) ? $this->validationErrors['User']['captcha'][0] : ""); ?></div>
					</div>
					</div>
			<?php   } ?>
					<div class="form-group">
						<div class="row">
						<div class="col-sm-4"><label></label></div>
						<div class="col-sm-8"><?php echo $this->Form->Submit(__('Sign Up'),array('class'=>'btn btn-success'));?></div>
					</div>
					</div>
					<?php echo $this->Form->end(); ?>

                   
                    </div>
                </div>
            </div>
        </div>
    </div>	
<script>
document.getElementById("UserUsername").focus();
</script>
