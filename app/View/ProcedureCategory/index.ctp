<div id="wrapper">
<?php echo $this->element('Usermgmt.dashboard'); ?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo __('All Categories'); ?></h1>
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
                            <?php echo __('All Categories'); ?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12">
                <table class="table table-bordered" >
                    <thead>
                        <tr>
                            <th><?php echo __('SL');?></th>
                            <th><?php echo __('Name');?></th>
                            <th><?php echo __('Type');?></th>
                            <th><?php echo __('Details');?></th>
                            <th><?php echo __('Action');?></th>
                        </tr>
                    </thead>
                    <tbody>
<?php $span = isset($span) ? $span : 8; ?>
<?php $page = isset($this->request->params['named']['page']) ? $this->request->params['named']['page'] : 1; ?>
            <?php       if (!empty($categories)) {
                            $sl=(($page-1)*$limit)+1;
                            foreach ($categories as $row) {
                              
                                echo "<tr>";
                                echo "<td>".$sl."</td>";
                                echo "<td>".h($row['ProcedureCategory']['name'])."</td>";
                                echo "<td>".h($row['ProcedureCategory']['type'])."</td>";
                                echo "<td>".h($row['ProcedureCategory']['details'])."</td>";
                                echo "<td>";
                                    echo "<span class='icon'><a href='".$this->Html->url('/editProCat/'.$row['ProcedureCategory']['id'])."'><img src='".SITE_URL."usermgmt/img/edit.png' border='0' alt='Edit' title='Edit'></a></span>";
                                    echo $this->Form->postLink($this->Html->image(SITE_URL.'usermgmt/img/delete.png', array("alt" => __('Delete'), "title" => __('Delete'))), array('action' => 'deleteProCat', $row['ProcedureCategory']['id']), array('escape' => false, 'confirm' => __('Are you sure you want to delete this Procedure Category?')));
                                echo "</td>";
                                echo "</tr>";
                                      $sl++;
                                    }
                            }
                         else {
                            echo "<tr><td colspan=10><br/><br/>No Data</td></tr>";
                        } ?>
                    </tbody>
                </table>
            </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
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