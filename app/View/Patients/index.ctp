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
                    <?php echo $this->Session->flash(); ?>
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
                            <th><?php echo __('Procedure');?></th>
                            <th><?php echo __('Date of Admit');?></th>
                            <th><?php echo __('Action');?></th>
                        </tr>
                    </thead>
                    <tbody>

            <?php       if (!empty($patients)) {
                            $sl=0;
                            foreach ($patients as $row) {
                                $sl++;
                                echo "<tr>";
                                echo "<td>".$sl."</td>";
                                echo "<td>".h($row['Patient']['id'])."</td>";
                                echo "<td>".h($row['Patient']['first_name'])." ".h($row['Patient']['last_name'])."</td>";
                                echo "<td>".h($row['Patient']['email'])."</td>";
                                echo "<td>".h($row['Patient']['phone'])."</td>";
                                echo "<td><a href='".$this->webroot."addConsultation/".h($row['Patient']['id'])."'>Consultation</a> / <a href='".$this->webroot."addProcedure/".h($row['Patient']['id'])."'>Procedure</a></td>";
                                echo "<td>".date('d M Y',strtotime(h($row['Patient']['time'])))."</td>";
                                echo "<td>";
                                    echo "<span class='icon'><a href='".$this->Html->url('/editPatient/'.$row['Patient']['id'])."'><img src='".SITE_URL."usermgmt/img/edit.png' border='0' alt='Edit' title='Edit'></a></span>";
                                    echo $this->Form->postLink($this->Html->image(SITE_URL.'usermgmt/img/delete.png', array("alt" => __('Delete'), "title" => __('Delete'))), array('action' => 'deletePatient', $row['Patient']['id']), array('escape' => false, 'confirm' => __('Are you sure you want to delete this Patient?')));
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