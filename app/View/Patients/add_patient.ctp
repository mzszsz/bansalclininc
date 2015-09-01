<div id="wrapper">
<?php echo $this->element('Usermgmt.dashboard'); ?>
<?php function generateRandomString($length = 10) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }
        $rand=generateRandomString(15); ?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo __('Add Patient'); ?></h1>
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
                            <?php echo __('Add Patient'); ?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-7">
                                	<?php echo $this->Form->create('Patient'); ?>
                                	<?php echo $this->Form->input("admin_id" ,array('label' => false,'div' => false,'type'=>"hidden",'value'=>$this->UserAuth->getUserId() ))?>
											<div class="">
                                                    <div class="form-group">
                                                        <div class="row">
                                                        <div class="col-sm-4"><label><?php echo __('Name');?></label></div>
                                                        <div class="col-sm-4"><?php echo $this->Form->input("first_name" ,array('label' => false,'div' => false,'class'=>"form-control",'placeholder'=>'First Name' ))?></div>
                                                        <div class="col-sm-4"><?php echo $this->Form->input("last_name" ,array('label' => false,'div' => false,'class'=>"form-control",'placeholder'=>'Last Name' ))?></div>
                                                    </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                        <div class="col-sm-4"><label><?php echo __('Phone');?></label></div>
                                                        <div class="col-sm-8"><?php echo $this->Form->input("phone" ,array('label' => false,'div' => false,'class'=>"form-control" ))?></div>
                                                    </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                        <div class="col-sm-4"><label><?php echo __('Email');?></label></div>
                                                        <div class="col-sm-8"><?php echo $this->Form->input("email" ,array('label' => false,'div' => false,'class'=>"form-control" ))?></div>
                                                    </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                        <div class="col-sm-4"><label><?php echo __('Address1');?></label></div>
                                                        <div class="col-sm-8"><?php echo $this->Form->input("address1" ,array('label' => false,'div' => false,'class'=>"form-control" ))?></div>
                                                    </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                        <div class="col-sm-4"><label><?php echo __('Address2');?></label></div>
                                                        <div class="col-sm-8"><?php echo $this->Form->input("address2" ,array('label' => false,'div' => false,'class'=>"form-control" ))?></div>
                                                    </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="row">
                                                        <div class="col-sm-4"><label><?php echo __('City');?></label></div>
                                                        <div class="col-sm-8"><?php echo $this->Form->input("city" ,array('label' => false,'div' => false,'class'=>"form-control" ))?></div>
                                                    </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="row">
                                                        <div class="col-sm-4"><label><?php echo __('State');?></label></div>
                                                        <div class="col-sm-8"><?php echo $this->Form->input("state" ,array('label' => false,'div' => false,'class'=>"form-control" ))?></div>
                                                    </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="row">
                                                        <div class="col-sm-4"><label><?php echo __('Country');?></label></div>
                                                        <div class="col-sm-8"><?php echo $this->Form->input("country" ,array('label' => false,'div' => false,'class'=>"form-control" ))?></div>
                                                    </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="row">
                                                        <div class="col-sm-4"><label><?php echo __('Type of Treatment');?></label></div>
                                                        <div class="col-sm-8"><?php echo $this->Form->input("type_of_treatment" ,array('label' => false,'div' => false,'class'=>"form-control" ))?></div>
                                                    </div>
                                                    </div>
                                                    
                                            </div>
											<div class="form-group">
												<label></label>
												<div class="umstyle4"><?php echo $this->Form->Submit(__('Add Patient'),array("class"=>"btn btn-primary"));?></div>
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
