<div id="wrapper">
<?php echo $this->element('Usermgmt.dashboard'); ?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo __('Add Procedure Details'); ?></h1>
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
                            <?php echo __('Add Procedure Details'); ?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                	<?php echo $this->Form->create('Treatment',array('enctype'=>'multipart/form-data')); ?>
                                	<?php echo $this->Form->input("patient_id" ,array('label' => false,'div' => false,'type'=>"hidden",'value'=>$patient['Patient']['id'] ))?>
											<div class="">
                                                    <div class="form-group">
                                                        <div class="row">
                                                        <div class="col-sm-4"><label><?php echo __('Name');?></label></div>
                                                        <div class="col-sm-8">
                                                            <?php echo $patient['Patient']['first_name']." ".$patient['Patient']['last_name']." (ID:".$patient['Patient']['id'].")"; ?>
                                                            
                                                    </div>
                                                    </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="row">
                                                        <div class="col-sm-4"><label><?php echo __('Procedure Category');?></label></div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <?php echo $this->Form->input("category_id" ,array('label' => false,'div' => false,'class'=>'form-control'))?>
                                                            </div>
                                                            
                                                    </div>
                                                    </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                        <div class="col-sm-4"><label><?php echo __('Procedure By');?></label></div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <?php echo $this->Form->input("doctor_id" ,array('label' => false,'div' => false,'class'=>'form-control'))?>
                                                            </div>
                                                            
                                                    </div>
                                                    </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                        <div class="col-sm-4"><label><?php echo __('Medical Details');?></label></div>
                                                        <div class="col-sm-8"><?php echo $this->Form->input("detail" ,array('label' => false,'div' => false,'class'=>"form-control"))?></div>
                                                    </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                        <div class="col-sm-4"><label><?php echo __('Fee');?></label></div>
                                                        <div class="col-sm-8"><?php echo $this->Form->input("fee" ,array('label' => false,'div' => false,'class'=>"form-control" ))?></div>
                                                    </div>
                                                    </div>
											<div class="form-group">
												<label></label>
												<div class="umstyle4"><?php echo $this->Form->Submit(__('Add Details'),array("class"=>"btn btn-primary"));?></div>
											</div>
											<?php echo $this->Form->end(); ?>
								</div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <div class="col-sm-6">
                               
                                <div class="panel panel-primary">
                        <div class="panel-heading">
                            Patient's History
                        </div>
                        <div class="panel-body">
                                <?php
                                if(!empty($patients)){
                                    foreach ($patients as $key => $value) {
                                      ?>
                                      <div class="well well-sm">
                                      <div class="row">
                                        <div class="col-md-4"><b>Patient Name: </b></div>
                                        <div class="col-md-8"><?php echo $patient['Patient']['first_name']." ".$patient['Patient']['last_name']." (ID:".$patient['Patient']['id'].")"; ?></div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-4"><b>Treated By: </b></div>
                                        <div class="col-md-8"><?php echo $value['User']['first_name']." ".$value['User']['last_name']; ?></div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-4"><b>Type of Treatment: </b></div>
                                        <div class="col-md-8"><?php echo ucfirst($value['Treatment']['type']); ?></div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-4"><b>Medical Details: </b></div>
                                        <div class="col-md-8"><?php echo ucfirst($value['Treatment']['detail']); ?></div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-4"><b>Fee: </b></div>
                                        <div class="col-md-8"><?php echo ucfirst($value['Treatment']['fee']); ?></div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-4"><b>Date: </b></div>
                                        <div class="col-md-8"><?php echo date('d M Y',strtotime($value['Treatment']['time'])); ?></div>
                                      </div>
                                      </div>
                                      <?php
                                    }
                                }?>
                            </div>
                            </div>
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
