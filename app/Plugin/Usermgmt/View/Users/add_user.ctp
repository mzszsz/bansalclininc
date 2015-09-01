<div id="wrapper">
<?php echo $this->element('dashboard'); ?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo __('Add User'); ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-md-12">
            		<?php echo $this->Session->flash(); ?>
            	</div>
            </div>
            <div class="row">
            	<div class="col-md-12">
            		<div class="panel panel-default">
                        <div class="panel-heading">
                            Add User
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
				            		<?php  if(!isset($userGroupId))
				            				echo $this->Form->create('User', array('action' => 'addUser','enctype'=>'multipart/form-data'));
				            			   else
				            				echo $this->Form->create('User', array('action' => 'addUser/'.$userGroupId,'enctype'=>'multipart/form-data')); ?>
									<?php   if (count($userGroups) >2) { ?>
												<div class="form-group">
													<label><?php echo __('Group');?><font color='red'>*</font></label>
													<div class="umstyle4" ><?php echo $this->Form->input("user_group_id" ,array('type' => 'select', 'label' => false,'div' => false,'class'=>"form-control" ))?></div>
													<div style="clear:both"></div>
												</div>
									<?php   }else{
										echo $this->Form->input("user_group_id" ,array('type' => 'hidden', 'label' => false,'div' => false,'value' => $userGroupId ));
									}   ?>
											<div class="form-group">
												<label><?php echo __('Username');?><font color='red'>*</font></label>
												<div class="umstyle4" ><?php echo $this->Form->input("username" ,array('label' => false,'div' => false,'class'=>"form-control" ))?></div>
												<div style="clear:both"></div>
											</div>
											<div class="form-group">
												<label><?php echo __('First Name');?><font color='red'>*</font></label>
												<div class="umstyle4" ><?php echo $this->Form->input("first_name" ,array('label' => false,'div' => false,'class'=>"form-control" ))?></div>
												<div style="clear:both"></div>
											</div>
											<div class="form-group">
												<label><?php echo __('Last Name');?><font color='red'>*</font></label>
												<div class="umstyle4" ><?php echo $this->Form->input("last_name" ,array('label' => false,'div' => false,'class'=>"form-control" ))?></div>
												<div style="clear:both"></div>
											</div>
											<div class="form-group">
												<label><?php echo __('Email');?><font color='red'>*</font></label>
												<div class="umstyle4" ><?php echo $this->Form->input("email" ,array('label' => false,'div' => false,'class'=>"form-control" ))?></div>
												<div style="clear:both"></div>
											</div>
											<div class="form-group">
												<label><?php echo __('Password');?><font color='red'>*</font></label>
												<div class="umstyle4"><?php echo $this->Form->input("password" ,array("type"=>"password",'label' => false,'div' => false,'class'=>"form-control" ))?></div>
												<div style="clear:both"></div>
											</div>
											<div class="form-group">
												<label><?php echo __('Confirm Password');?><font color='red'>*</font></label>
												<div class="umstyle4"><?php echo $this->Form->input("cpassword" ,array("type"=>"password",'label' => false,'div' => false,'class'=>"form-control" ))?></div>
												<div style="clear:both"></div>
											</div>
											<div class="form-group">
												<label>Image</label>
												<?php echo $this->Form->input("image" ,array("type"=>"file",'label' => false,'div' => false))?>
											</div>
											<div class="form-group">
												<label></label>
												<div class="umstyle4"><?php echo $this->Form->Submit(__('Add User'),array("class"=>"btn btn-primary"));?></div>
												<div style="clear:both"></div>
											</div>
											<?php echo $this->Form->end(); ?>
								</div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div><!-- panel panel-default -->
            	</div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<script>
document.getElementById("UserPassword").focus();
</script>