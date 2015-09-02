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
                    <h1 class="page-header"><?php echo __('Update Patient Details'); ?></h1>
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
            	<div class="col-md-6">
            		<div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo __('Update Patient Details'); ?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12">
                                	<?php echo $this->Form->create('Patient'); ?>
                                    <?php echo $this->Form->input("id" ,array('label' => false,'div' => false,'type'=>"hidden"))?>
                                            <div class="">
                                                    <div class="form-group">
                                                        <div class="row">
                                                        <div class="col-sm-4"><label><?php echo __('Name *');?></label></div>
                                                        <div class="col-sm-4"><?php echo $this->Form->input("first_name" ,array('label' => false,'div' => false,'class'=>"form-control",'placeholder'=>'First Name' ))?></div>
                                                        <div class="col-sm-4"><?php echo $this->Form->input("last_name" ,array('label' => false,'div' => false,'class'=>"form-control",'placeholder'=>'Last Name' ))?></div>
                                                    </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                        <div class="col-sm-4"><label><?php echo __('Phone *');?></label></div>
                                                        <div class="col-sm-8"><?php echo $this->Form->input("phone" ,array('label' => false,'div' => false,'class'=>"form-control" ))?></div>
                                                    </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                        <div class="col-sm-4"><label><?php echo __('Email *');?></label></div>
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
                                                    
                                            </div>
                                            <div class="form-group">
                                                <label></label>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                    <?php echo $this->Form->Submit(__('Update Patient'),array("class"=>"btn btn-primary"));?> 
                                                    </div>
                                                    <div class="col-md-4">
                                                    <a href="<?php echo $this->webroot.'addConsultation/'.$this->request->data['Patient']['id'];?>" class="btn btn-danger">Add Consultation</a> 
                                                    </div>
                                                    <div class="col-md-4">
                                                    <a href="<?php echo $this->webroot.'addProcedure/'.$this->request->data['Patient']['id'];?>" class="btn btn-danger">Add Procedure</a>
                                                    </div>
                                                </div>
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
<div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo __("Patient's History"); ?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                <?php //echo $this->element('sql_dump');
                                if(!empty($patients)){
                                    foreach ($patients as $key => $value) {
                                      ?>

                                      <div class="well well-sm">
                                        <div class="row">
                                            <?php 

                                            if($value['Treatment']['type']=='consultation'){?>
                                            <div class="col-md-3">
                                                <img src="<?php echo $this->webroot.$value['Treatment']['image']; ?>" class="thumbnail">
                                            </div>
                                            <div class="col-md-9">
                                            <?php }else{
                                                ?>
                                            <div class="col-md-12">

                                            <?php } ?>
                                      <div class="row">
                                        <div class="col-md-6"><b>Patient Name: </b></div>
                                        <div class="col-md-6"><?php echo $value['Patient']['first_name']." ".$value['Patient']['last_name']." (ID:".$value['Patient']['id'].")"; ?></div>
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
                                </div></div>
                            </div>
                            </div>
                        </div><!--panel -default -->
            	</div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
