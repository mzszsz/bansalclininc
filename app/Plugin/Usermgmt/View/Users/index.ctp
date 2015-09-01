<?php   if(isset($usersGroupID)){
			$link_id="/".$usersGroupID;
			$link_id_2=$usersGroupID;
		}else{
			$link_id='';
			$link_id_2='';
		}
?>
<div id="wrapper">
<?php echo $this->element('dashboard'); ?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo __('All Users'); ?></h1>
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
                            <?php echo __('All Users'); ?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12">
				<table class="table table-bordered" >
					<thead>
						<tr>
							<th><?php echo __('SL');?></th>
							<th><?php echo __('Name');?></th>
							<th><?php echo __('Username');?></th>
							<th><?php echo __('Email');?></th>
							<?php if(!$this->UserAuth->isOrgAdmin()){ ?>
							<th><?php echo __('Group');?></th>
							<?php } ?>
							<th><?php echo __('Email Verified');?></th>
							<th><?php echo __('Status');?></th>
							<th><?php echo __('Created');?></th>
							<th><?php echo __('Action');?></th>
						</tr>
					</thead>
					<tbody>
						 
			<?php       if (!empty($users)) {
							$sl=0;
							foreach ($users as $row) {
								$sl++;
								echo "<tr>";
								echo "<td>".$sl."</td>";
								echo "<td>".h($row['User']['first_name'])." ".h($row['User']['last_name'])."</td>";
								echo "<td>".h($row['User']['username'])."</td>";
								echo "<td>".h($row['User']['email'])."</td>";
								if(!$this->UserAuth->isOrgAdmin()){
									echo "<td>".h($row['UserGroup']['name'])."</td>";
								 } 
								echo "<td>";
								if ($row['User']['email_verified']==1) {
									echo "Yes";
								} else {
									echo "No";
								}
								echo"</td>";
								echo "<td>";
								if ($row['User']['active']==1) {
									echo "Active";
								} else {
									echo "Inactive";
								}
								echo"</td>";
								echo "<td>".date('d-M-Y',strtotime($row['User']['created']))."</td>";
								echo "<td>";
									echo "<span class='icon'><a href='".$this->Html->url('/viewUser/'.$row['User']['id'])."'><img src='".SITE_URL."usermgmt/img/view.png' border='0' alt='View' title='View'></a></span>";
									echo "<span class='icon'><a href='".$this->Html->url('/editUser/'.$row['User']['id'].$link_id)."'><img src='".SITE_URL."usermgmt/img/edit.png' border='0' alt='Edit' title='Edit'></a></span>";
									echo "<span class='icon'><a href='".$this->Html->url('/changeUserPassword/'.$row['User']['id'].$link_id)."'><img src='".SITE_URL."usermgmt/img/password.png' border='0' alt='Change Password' title='Change Password'></a></span>";
									if ($row['User']['email_verified']==0) {
										echo "<span class='icon'><a href='".$this->Html->url('/usermgmt/users/verifyEmail/'.$row['User']['id'])."'><img src='".SITE_URL."usermgmt/img/email-verify.png' border='0' alt='Verify Email' title='Verify Email'></a></span>";
									}
									if ($row['User']['active']==0) {
										echo "<span class='icon'><a href='".$this->Html->url('/usermgmt/users/makeActiveInactive/'.$row['User']['id'].'/1'.$link_id)."'><img src='".SITE_URL."usermgmt/img/dis-approve.png' border='0' alt='Make Active' title='Make Active'></a></span>";
									} else {
										echo "<span class='icon'><a href='".$this->Html->url('/usermgmt/users/makeActiveInactive/'.$row['User']['id'].'/0'.$link_id)."'><img src='".SITE_URL."usermgmt/img/approve.png' border='0' alt='Make Inactive' title='Make Inactive'></a></span>";
									}
									if ($row['User']['id']!=1 && $row['User']['username']!='Admin') {
										echo $this->Form->postLink($this->Html->image(SITE_URL.'usermgmt/img/delete.png', array("alt" => __('Delete'), "title" => __('Delete'))), array('action' => 'deleteUser', $row['User']['id'],$link_id_2), array('escape' => false, 'confirm' => __('Are you sure you want to delete this user?')));
									}
								echo "</td>";
								echo "</tr>";
							}
						} else {
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