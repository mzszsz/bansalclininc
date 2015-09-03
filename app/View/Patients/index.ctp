<div id="wrapper">
<?php echo $this->element('Usermgmt.dashboard'); ?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo __('All Patients'); ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <?php echo $this->Session->flash();// echo $this->element('sql_dump');?>
                </div>
            </div>
            <div class="row">
            <div class="col-sm-12">
                <form action="#search" name="search form" method="post">
                    <div class="input-group">
                      <span class="input-group-addon" style="padding:0 10px;"><i class="fa fa-search"></i></span>
                      <input type="text" class="form-control search_field" name="search" autocomplete="off" placeholder="Search Patient by name, ID, email or phone number...">
                      <span class="input-group-addon" style="padding:0;border:0"><button type="submit" class="btn btn-primary search_btn">Search</button></span>
                    </div>

                    <div class="search_result">

                    </div>
                </form>
            </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo __('All Patients'); ?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12">
            
                <table class="table table-bordered" >
                    <thead>
                        <tr>
                            <th><?php echo __('SL');?></th>
                            <th><?php echo __('Patient ID');?></th>
                            <th><?php echo __('Name');?></th>
                            <th><?php echo __('Email');?></th>
                            <th><?php echo __('Phone');?></th>
                            <th><?php echo __('Treatment Type');?></th>
                            <th><?php echo __('Date of Admit');?></th>
                            <th><?php echo __('Action');?></th>
                        </tr>
                    </thead>
                    <tbody>
<?php $span = isset($span) ? $span : 8; ?>
<?php $page = isset($this->request->params['named']['page']) ? $this->request->params['named']['page'] : 1; ?>
            <?php       if (!empty($patients)) {
                            
                            $sl=(($page-1)*$limit)+1;
                            foreach ($patients as $row) {
                                
                                if(isset($countConsultation[h($row['Patient']['id'])]))
                                {
                                    $cC=$countConsultation[h($row['Patient']['id'])];
                                    $lC="label-success";
                                }
                                else{
                                    $cC=0;
                                    $lC="label-danger";
                                }
                                if(isset($countProcedure[h($row['Patient']['id'])]))
                                {
                                    $cP=$countProcedure[h($row['Patient']['id'])];
                                    $lP="label-success";
                                }
                                else{
                                    $cP=0;
                                    $lP="label-danger";
                                }
                                echo "<tr>";
                                echo "<td>".$sl."</td>";
                                echo "<td>".h($row['Patient']['id'])."</td>";
                                echo "<td>".h($row['Patient']['first_name'])." ".h($row['Patient']['last_name'])."</td>";
                                echo "<td>".h($row['Patient']['email'])."</td>";
                                echo "<td>".h($row['Patient']['phone'])."</td>";
                                echo "<td><a href='".$this->webroot."addConsultation/".h($row['Patient']['id'])."'>Consultation <span class='label ".$lC."'>".$cC."</span></a> / <a href='".$this->webroot."addProcedure/".h($row['Patient']['id'])."'>Procedure <span class='label ".$lP."'>".$cP."</span></a></td>";
                                echo "<td>".date('d M Y',strtotime(h($row['Patient']['time'])))."</td>";
                                echo "<td>";
                                    echo "<span class='icon'><a href='".$this->Html->url('/editPatient/'.$row['Patient']['id'])."'><img src='".SITE_URL."usermgmt/img/edit.png' border='0' alt='Edit' title='Edit'></a></span>";
                                    echo $this->Form->postLink($this->Html->image(SITE_URL.'usermgmt/img/delete.png', array("alt" => __('Delete'), "title" => __('Delete'))), array('action' => 'deletePatient', $row['Patient']['id']), array('escape' => false, 'confirm' => __('Are you sure you want to delete this Patient?')));
                                    $sl++;
                                echo "</td>";
                                echo "</tr>";
                                    }
                            }
                         else {
                            echo "<tr><td colspan=10><br/><br/>No Data</td></tr>";
                        } ?>
                    </tbody>
                </table>
<!-- PAGINATION -->
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
<!-- PAGINATION -->


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