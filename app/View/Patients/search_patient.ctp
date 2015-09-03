<div class="search_result_inner">
<?php if (!empty($patients)) { ?>
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

            <?php       
                            
                            $sl=1;
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
                            
                       ?>
                    </tbody>
                </table>
<?php } else { ?>
           <p>No Records found. Please add new patient or search again.</p>
           <a href="<?php echo $this->base; ?>/addPatient/" class="btn btn-primary">Add new Patient</a>              
<?php  } ?>


</div>