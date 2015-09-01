<div id="wrapper">
<?php echo $this->element('dashboard'); ?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo __('Edit User'); ?></h1>
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
                            <?php echo __('Edit User'); ?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
								<?php echo $this->Form->create('User',array('enctype'=>'multipart/form-data')); ?>
                                <div class="col-sm-6">
								<?php echo $this->Form->input("id" ,array('type' => 'hidden', 'label' => false,'div' => false))?>
								<?php   if (count($userGroups) >2) { ?>
									<div class="form-group">
										<div class="umstyle3"><?php echo __('Group');?><font color='red'>*</font></div>
										<div class="umstyle4" ><?php echo $this->Form->input("user_group_id" ,array('type' => 'select', 'label' => false,'div' => false,'class'=>"form-control" ))?></div>
										<div style="clear:both"></div>
									</div>
								<?php   }  else{
										echo $this->Form->input("user_group_id" ,array('type' => 'hidden', 'label' => false,'div' => false,'value' => $userGroupId ));
									}  ?>
								<div class="form-group">
									<div class="umstyle3"><?php echo __('Username');?><font color='red'>*</font></div>
									<div class="umstyle4" ><?php echo $this->Form->input("username" ,array('label' => false,'div' => false,'class'=>"form-control" ))?></div>
									<div style="clear:both"></div>
								</div>
								<div class="form-group">
									<div class="umstyle3"><?php echo __('First Name');?><font color='red'>*</font></div>
									<div class="umstyle4" ><?php echo $this->Form->input("first_name" ,array('label' => false,'div' => false,'class'=>"form-control" ))?></div>
									<div style="clear:both"></div>
								</div>
								<div class="form-group">
									<div class="umstyle3"><?php echo __('Last Name');?><font color='red'>*</font></div>
									<div class="umstyle4" ><?php echo $this->Form->input("last_name" ,array('label' => false,'div' => false,'class'=>"form-control" ))?></div>
									<div style="clear:both"></div>
								</div>
								<div class="form-group">
									<div class="umstyle3"><?php echo __('Email');?><font color='red'>*</font></div>
									<div class="umstyle4" ><?php echo $this->Form->input("email" ,array('label' => false,'div' => false,'class'=>"form-control" ))?></div>
									<div style="clear:both"></div>
								</div>
								
							</div>			
                                <!-- /.col-lg-6 (nested) -->
                            <div class="col-sm-6">
                            	<div class="row">
                            		<?php if($this->data['User']['image_url']!=''){?>
                            		<div class="col-md-6">
                            			<img src="<?php echo $this->webroot.$this->data['User']['image_url'] ?>" width="300" class="thumbnail">
                            		</div>
                            		<div class="col-md-6">
                            			<label>New Image</label>
										<?php echo $this->Form->input("image" ,array("type"=>"file",'label' => false,'div' => false))?>
                            		</div>
                            		<?php }else{ ?>
                            		<div class="col-md-6">
                            			<label>New Image</label>
										<?php echo $this->Form->input("image" ,array("type"=>"file",'label' => false,'div' => false))?>
                            		</div>
                            		<?php } ?>
                            	</div>
                            </div>
                            <div class="col-md-12">
	                            <div class="form-group">
									<div class="umstyle3"></div>
									<div class="umstyle4"><?php echo $this->Form->Submit(__('Update User'),array('class'=>'btn btn-primary'));?></div>
									<div style="clear:both"></div>
								</div>
							</div>
								<?php echo $this->Form->end(); ?>
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
document.getElementById("Username").focus();
</script>
