<div id="wrapper">
<?php echo $this->element('dashboard'); ?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo __('Change Password for '); echo h($name); ?></h1>
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
                            Change Password
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
				            		<?php echo $this->Form->create('User'); ?>
									<div class="form-group">
										<label><?php echo __('Password');?></label>
										<div class="umstyle4"><?php echo $this->Form->input("password" ,array("class"=>"form-control","type"=>"password",'label' => false,'div' => false ))?></div>
									</div>
									<div class="form-group">
										<label><?php echo __('Confirm Password');?></label>
										<div class="umstyle4"><?php echo $this->Form->input("cpassword" ,array("class"=>"form-control","type"=>"password",'label' => false,'div' => false ))?></div>
									</div>
									<div class="form-group">
										<label></label>
										<div class="umstyle4"><?php echo $this->Form->Submit(__('Change'),array("class"=>"btn btn-primary"));?></div>
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