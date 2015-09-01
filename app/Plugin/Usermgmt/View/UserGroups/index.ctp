<div id="wrapper">
<?php echo $this->element('dashboard'); ?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo __('All Groups'); ?></h1>
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
                            <?php echo __('All Groups'); ?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12">
				<table class="table table-bordered" >
					<thead>
						<tr>
							<th><?php echo __('Group Id');?></th>
							<th><?php echo __('Name');?></th>
							<th><?php echo __('Alias Name');?></th>
							<th><?php echo __('Allow Registration');?></th>
							<th><?php echo __('Created');?></th>
							<th><?php echo __('Action');?></th>
						</tr>
					</thead>
					<tbody>
				<?php   if(!empty($userGroups)) {
							foreach ($userGroups as $row) {
								echo "<tr>";
								echo "<td>".$row['UserGroup']['id']."</td>";
								echo "<td>".h($row['UserGroup']['name'])."</td>";
								echo "<td>".h($row['UserGroup']['alias_name'])."</td>";
								echo "<td>";
								if ($row['UserGroup']['allowRegistration']) {
									echo "Yes";
								} else {
									echo "No";
								}
								echo"</td>";
								echo "<td>".date('d-M-Y',strtotime($row['UserGroup']['created']))."</td>";
								echo "<td>";
									echo "<span class='icon'><a href='".$this->Html->url('/editGroup/'.$row['UserGroup']['id'])."'><img src='".SITE_URL."usermgmt/img/edit.png' border='0' alt='Edit' title='Edit'></a></span>";
									if ($row['UserGroup']['id']!=1) {
										echo $this->Form->postLink($this->Html->image(SITE_URL.'usermgmt/img/delete.png', array("alt" => __('Delete'), "title" => __('Delete'))), array('action' => 'deleteGroup', $row['UserGroup']['id']), array('escape' => false, 'confirm' => __('Are you sure you want to delete this group? Delete it your own risk')));
									}
								echo "</td>";
								echo "</tr>";
							}
						} else {
							echo "<tr><td colspan=6><br/><br/>No Data</td></tr>";
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