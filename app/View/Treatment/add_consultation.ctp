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
                    <h1 class="page-header"><?php echo __('Add Consultation Details'); ?></h1>
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
                            <?php echo __('Add Consultation Details'); ?>
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
                                                        <div class="col-sm-4"><label><?php echo __('Consult By');?></label></div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <?php echo $this->Form->input("doctor_id" ,array('label' => false,'div' => false,'class'=>'form-control'))?>
                                                            </div>
                                                            
                                                    </div>
                                                    </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                        <div class="col-sm-4"><label><?php echo __('Message');?></label></div>
                                                        <div class="col-sm-8"><?php echo $this->Form->input("detail" ,array('label' => false,'div' => false,'class'=>"form-control"))?></div>
                                                    </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                        <div class="col-sm-4"></div>
                                                        <div class="col-sm-8"><?php echo $this->Form->input("type" ,array('type' => 'radio','label' => true,'legend' => false,'div' => false,
                                                                'options' => array('0'=>'Follow Up','1'=>'New'),'value'=>'1','class'=>'fee_Cat'))?></div>
                                                    </div>
                                                    </div>

                                                     <div class="form-group fee_input">
                                                        <div class="row">
                                                        <div class="col-sm-4"><label><?php echo __('Fee');?></label></div>
                                                        <div class="col-sm-8"><?php echo $this->Form->input("fee" ,array('label' => false,'div' => false,'class'=>"form-control" ))?></div>
                                                    </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <div class="row">
                                                        <div class="col-sm-4"><label><?php echo __('Upload Image');?></label></div>
                                                        <div class="col-sm-8"><?php echo $this->Form->input("image" ,array("type"=>"file",'label' => false,'div' => false))?></div>
                                                    </div>
                                                    </div>
                                                    
                                            </div>
											<div class="form-group">
												<label></label>
												<div class="umstyle4"><?php echo $this->Form->Submit(__('Add Details'),array("class"=>"btn btn-primary"));?></div>
											</div>
											<?php echo $this->Form->end(); ?>
								</div>
                                <!-- /.col-lg-6 (nested) -->

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
                                            <div class="col-md-3">
                                                <img src="<?php echo $this->webroot.$value['Treatment']['image']; ?>" class="thumbnail" onerror="this.onerror=null;this.src='<?php echo $this->webroot; ?>images/noimage.jpg';">
                                            </div>
                                            <div class="col-md-9">

                                      <div class="row">
                                        <div class="col-md-6"><b>Patient Name: </b></div>
                                        <div class="col-md-6"><?php echo $patient['Patient']['first_name']." ".$patient['Patient']['last_name']." (ID:".$patient['Patient']['id'].")"; ?></div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-6"><b>Treated By: </b></div>
                                        <div class="col-md-6"><?php echo $value['User']['first_name']." ".$value['User']['last_name']; ?></div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-6"><b>Type of Treatment: </b></div>
                                        <div class="col-md-6"><?php echo ucfirst($value['Treatment']['type']); ?></div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-6"><b>Medical Details: </b></div>
                                        <div class="col-md-6"><?php echo ucfirst($value['Treatment']['detail']); ?></div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-6"><b>Fee: </b></div>
                                        <div class="col-md-6"><?php echo ucfirst($value['Treatment']['fee']); ?></div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-6"><b>Date: </b></div>
                                        <div class="col-md-6"><?php echo date('d M Y',strtotime($value['Treatment']['time'])); ?></div>
                                      </div>
                                      </div>
                                        </div>
                                      </div>
                                      <?php
                                    }
                                }?>
                                </div>
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
