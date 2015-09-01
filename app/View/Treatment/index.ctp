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

            <?php       if (!empty($categories)) {
                            $sl=0;
                            foreach ($categories as $row) {
                                $sl++;
                                echo "<tr>";
                                echo "<td>".$sl."</td>";
                                echo "<td>".h($row['ProcedureCategory']['name'])."</td>";
                                echo "<td>".h($row['ProcedureCategory']['type'])."</td>";
                                echo "<td>".h($row['ProcedureCategory']['details'])."</td>";
                                echo "<td>";
                                    echo "<span class='icon'><a href='".$this->Html->url('/editProCat/'.$row['ProcedureCategory']['id'])."'><img src='".SITE_URL."usermgmt/img/edit.png' border='0' alt='Edit' title='Edit'></a></span>";
                                    echo $this->Form->postLink($this->Html->image(SITE_URL.'usermgmt/img/delete.png', array("alt" => __('Delete'), "title" => __('Delete'))), array('action' => 'deleteProCat', $row['ProcedureCategory']['id']), array('escape' => false, 'confirm' => __('Are you sure you want to delete this Procedure Category?')));
                                    }
                                echo "</td>";
                                echo "</tr>";
                            }
                         else {
                            echo "<tr><td colspan=10><br/><br/>No Data</td></tr>";
                        } ?>
                    </tbody>
                </table>
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