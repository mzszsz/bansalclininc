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
                    <h1 class="page-header"><?php echo __('Update Procedure Category'); ?></h1>
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
                            <?php echo __('Update Procedure Category'); ?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                	<?php echo $this->Form->create('ProcedureCategory'); ?>
                                	<?php echo $this->Form->input("id" ,array('label' => false,'div' => false,'type'=>"hidden"))?>
											<div class="">
                                                    <div class="form-group">
                                                        <div class="row">
                                                        <div class="col-sm-4"><label><?php echo __('Type');?></label></div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <?php echo $this->Form->input("type" ,array('type' => 'radio','label' => true,'legend' => false,'div' => false,
                                                                'options' => array('Cosmatic'=>'Cosmatic','Medicare'=>'Medicare')))?>
                                                            </div>
                                                            
                                                    </div>
                                                    </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                        <div class="col-sm-4"><label><?php echo __('Name');?></label></div>
                                                        <div class="col-sm-8"><?php echo $this->Form->input("name" ,array('label' => false,'div' => false,'class'=>"form-control",'placeholder'=>'Name' ))?></div>
                                                    </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                        <div class="col-sm-4"><label><?php echo __('Details');?></label></div>
                                                        <div class="col-sm-8"><?php echo $this->Form->input("details" ,array('label' => false,'div' => false,'class'=>"form-control" ))?></div>
                                                    </div>
                                                    </div>
                                                    
                                            </div>
											<div class="form-group">
												<label></label>
												<div class="umstyle4"><?php echo $this->Form->Submit(__('Update Category'),array("class"=>"btn btn-primary"));?></div>
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
