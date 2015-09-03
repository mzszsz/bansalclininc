<?php /* echo $this->Session->flash(); ?><?php echo $this->Html->link(__("Sign Up",true),"/register") ?>
	<?php echo $this->Form->create('User', array('action' => 'login')); ?>
	<h3 class="form-title">Sign In</h3>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Username</label>			
			<?php echo $this->Form->input("email" ,array('label' => false,'div' => false,'class'=>"form-control form-control-solid placeholder-no-fix" ))?>
		</div>
<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Password</label>			
			<?php echo $this->Form->input("password" ,array("type"=>"password",'label' => false,'div' => false,'class'=>"form-control form-control-solid placeholder-no-fix" ))?>
		</div>

		<?php   if(!isset($this->request->data['User']['remember']))
								$this->request->data['User']['remember']=true;
					?>

		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label ">Remember me</label>			
			<?php echo $this->Html->link(__("Forgot Password?",true),"/forgotPassword",array("class"=>"style30")) ?>
		</div>
<?php echo $this->Form->Submit(__('Sign In'));?>
<?php echo $this->Html->link(__("Email Verification",true),"/emailVerification",array("class"=>"style30")) ?>
	<?php echo $this->Form->end(); */ ?>


    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <?php echo $this->Session->flash(); ?>
                        <?php //echo $this->Html->link(__("Sign Up",true),"/register") ?>
						<?php echo $this->Form->create('User', array('action' => 'login')); ?>
                            <fieldset>
                                <div class="form-group">
                                	<?php echo $this->Form->input("email" ,array('label' => false,'div' => false,'class'=>"form-control",'placeholder'=>"E-mail" ))?>
                                </div>
                                <div class="form-group">
                                	<?php echo $this->Form->input("password" ,array("type"=>"password",'label' => false,'div' => false,'class'=>"form-control",'placeholder'=>"Password" ))?>
                                </div>
                                <div class="checkbox">
                                	<?php   if(!isset($this->request->data['User']['remember']))
												$this->request->data['User']['remember']=true;
									?>
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me 
                                    </label>
                                    <?php echo $this->Html->link(__("Forgot Password?",true),"/forgotPassword",array("class"=>"style30")) ?>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <?php echo $this->Form->Submit(__('Sign In'),array('class' => 'btn btn-lg btn-success btn-block'));?>
                                <?php //echo $this->Html->link(__("Email Verification",true),"/emailVerification",array("class"=>"style30")) ?>
								<span class="pull-right"><?php //echo $this->Html->link(__("Sign Up",true),"/register") ?></span>

                            </fieldset>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
document.getElementById("UserEmail").focus();
</script>
