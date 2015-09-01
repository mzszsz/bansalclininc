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
                            <div class="col-sm-12">
                               
                                
                                <?php
                                if(!empty($patients)){
                                    foreach ($patients as $key => $value) {
                                      ?>
                                      <div class="well well-sm">
                                      <div class="row">
                                        <div class="col-md-4"><b>Patient Name: </b></div>
                                        <div class="col-md-8"><?php echo $value['Patient']['first_name']." ".$value['Patient']['last_name']." (ID:".$value['Patient']['id'].")"; ?></div>
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
