<div id="wrapper">
<?php echo $this->element('dashboard'); ?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo __('Add Group '); ?></h1>
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
                            <?php echo __('Add Group '); ?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
									<?php echo $this->Form->create('UserGroup', array('action' => 'addGroup')); ?>
									<div class="form-group">
										<label><?php echo __('Group Name');?><font color='red'>*</font></label>
										<div class="umstyle4" ><?php echo $this->Form->input("name" ,array('label' => false,'div' => false,'class'=>"form-control" ))?></div>
										<div class="umstyle7">for ex. Business User</div>
									</div>
									<div class="form-group">
										<label><?php echo __('Alias Group Name');?><font color='red'>*</font></label>
										<div class="umstyle4" ><?php echo $this->Form->input("alias_name" ,array('label' => false,'div' => false,'class'=>"form-control" ))?></div>
										<div class="umstyle7">for ex. Business_User (Must not contain space)</div>
									</div>
									<div class="form-group">
									<?php   if (!isset($this->request->data['UserGroup']['allowRegistration'])) {
												$this->request->data['UserGroup']['allowRegistration']=true;
											}   ?>
										<div class="checkbox">
										<label><?php echo $this->Form->input("allowRegistration" ,array("type"=>"checkbox",'label' => false))?> <?php echo __('Allow Registration');?></label>
										</div>
									</div>
									<div class="form-group">
										<label></label>
										<div class="umstyle4"><?php echo $this->Form->Submit(__('Add Group'),array("class"=>"btn btn-primary"));?></div>
									</div>
									<div>Note: If you add a new group then you should give permissions to this newly created Group.</div>
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
document.getElementById("UserUserGroupId").focus();
</script>