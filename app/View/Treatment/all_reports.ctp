<div id="wrapper">
<?php echo $this->element('Usermgmt.dashboard'); ?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo __('Reports'); ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-md-12">
            		<?php echo $this->Session->flash(); //echo $this->element('sql_dump') ?>
            	</div>
            </div>
            <div class="row">
            	<div class="col-md-12">
            		<div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo __('Reports'); ?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <!-- /.col-lg-6 (nested) -->

                                <!-- <div class="col-sm-12">
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
                              
                            </div> -->
                            <div class="col-md-12">
                              <div class="form-group">
                              <div class="row">
                              <?php echo $this->Form->create('allReports',array('class'=>'byid')); ?>
                                  <div class="col-md-3 col-sm-6">
                                  <div class="form-group">
                                      <?php echo $this->Form->input("byday_id" ,array('label' => false,'legend' => false,'div' => false,
                                      'class'=>'form-control'))?>
                                  </div>
                                  </div>

                              <?php echo $this->Form->end(); ?>
                              </div>
                              </div>
                              <?php echo $this->Form->create('allReports'); ?>
                              <div class="row">
                                <!-- <div class="col-md-10"> -->
                                  

                                  <div class="col-md-2">
                                  <div class="form-group">
                                      <?php echo $this->Form->date("date1" ,array('label' => true,'legend' => false,'div' => false,
                                      'class'=>'form-control datepicker','placeholder'=>'Start Date'))?>
                                  </div>
                                  </div>

                                  <div class="col-md-2">
                                  <div class="form-group">
                                      <?php echo $this->Form->date("date2" ,array('label' => true,'legend' => false,'div' => false,
                                      'class'=>'form-control datepicker','placeholder'=>'End Date'))?>
                                  </div>
                                  </div>
                                  <div class="col-md-2">
                                  <div class="form-group">                                  
                                      <?php echo $this->Form->input("type_id" ,array('label' => false,'legend' => false,'div' => false,
                                      'class'=>'form-control'))?>
                                  </div>
                                  </div>
                                   <div class="col-md-2">
                                  <div class="form-group">
                                      <?php echo $this->Form->input("category_id" ,array('label' => false,'legend' => false,'div' => false,
                                      'class'=>'form-control'))?>
                                  </div>
                                  </div>

                                  <div class="col-md-2">
                                  <div class="form-group">
                                      <?php echo $this->Form->input("doctor_id" ,array('label' => false,'legend' => false,'div' => false,
                                      'class'=>'form-control'))?>
                                  </div>
                                  </div>                                  
                                <!-- </div> -->
                                <div class="col-md-2 text-center">
                                  <?php echo $this->Form->Submit(__('Search'),array("class"=>"btn btn-primary pull-left"));?>
                                  <?php if(!isset($all)){ ?>
                                  <a href="#" class="btn btn-primary getfile pull-right"><i class="fa fa-download"></i></a>
                                  <?php } ?>
                                </div>
                              </div>

                      <?php echo $this->Form->end(); ?>

                            </div>
                            </div>

                            <?php
                                if(!empty($patients)){ ?>
<?php $span = isset($span) ? $span : 8; ?>
<?php $page = isset($this->request->params['named']['page']) ? $this->request->params['named']['page'] : 1; ?>
                                <div class="">
                                <table class="table table-bordered table-stripped" id="reports">
                                  <tr style="font-weight:bolder">
                                    <td>Date</td>
                                    <td>Patient ID</td>
                                    <td>Patient Name</td>
                                    <td>Treated By</td>
                                    <td>Type of Treatment</td>
                                    <td>Fee</td>
                                  </tr>
                                  <tbody>
                            <?php  $tr=0;$tf=0;  foreach ($patients as $key => $value) {
                                      if ($value['Treatment']['fee']=='') {
                                        $value['Treatment']['fee']=0;
                                      }
                                      ?>
                                            <!-- <div class="col-md-3">
                                                <img src="<?php echo $this->webroot.$value['Treatment']['image']; ?>" class="thumbnail" onerror="this.onerror=null;this.src='<?php echo $this->webroot; ?>images/noimage.jpg';">
                                            </div>
                                             -->
                                      <tr>
                                        <td><?php echo date('d M Y',strtotime($value['Treatment']['time'])); ?></td>
                                        <td><?php echo $value['Patient']['id']; ?></td>
                                        <td><?php echo $value['Patient']['first_name']." ".$value['Patient']['last_name']; ?></td>
                                        <td><?php echo $value['User']['first_name']." ".$value['User']['last_name']; ?></td>
                                        <td><?php echo ucfirst($value['Treatment']['type']); if($value['ProcedureCategory']['name']!='') echo " - ".$value['ProcedureCategory']['name'] ?></td>
                                        <td><?php echo $value['Treatment']['fee'];$tf=$tf+$value['Treatment']['fee']; ?></td>
                                      </tr>
                                      
                                      <?php
                                      $tr++;
                                    }
                                    ?>
                                    </tbody>
                                    </table>

<div class="pull-left"><strong>Total no of Records:</strong> <?Php if(isset($all)) echo $total; else echo $tr; ?></div>
<div class="pull-right"><strong>Total Fees:</strong> <?Php if(isset($all)) echo $sum; else echo $tf; ?></div>
<!-- PAGINATION -->
<?php if(isset($all)){ ?>
        <ul class="pagination">
            <?php echo $this->Paginator->prev('&larr; ' . __('Previous'),array('escape' => false,'tag' => 'li'),'<a onclick="return false;">&larr; Previous</a>',array('class'=>'disabled prev','escape' => false,'tag' => 'li'));?>
            

            <?php   $count = $page + $span; 
                    $i = $page - $span; 
                    while ($i < $count): 
                    $options = ''; 
                    if ($i == $page): 
                     $options = ' class="active"';
                    endif;
                    if ($this->Paginator->hasPage($i) && $i > 0): ?>
                    <li<?php echo $options; ?>><?php echo $this->Html->link($i, array("page" => $i)); ?></li>
            <?php   endif; 
                     $i += 1; 
                 endwhile; ?>
            
            <?php echo $this->Paginator->next(__('Next') . ' &rarr;',array('escape' => false,'tag' => 'li'),'<a onclick="return false;">Next &rarr;</a>',array('class' => 'disabled next','escape' => false,'tag' => 'li'));?> 
            <li><a href="#" class="disabled"><b><?php echo $this->Paginator->counter(); ?></b></a></li>
        </ul> 
<?php } ?>      
<!-- PAGINATION -->   
                                    </div>
                                <?php } ?>

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
<script type="text/javascript">
var name="<?php echo strtotime(date('Y-m-d'));?>";
$('.getfile').click(
            function() { 
    exportTableToCSV.apply(this, [$('#reports'), 'reports_'+name+'.csv']);
             });
</script>