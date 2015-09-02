        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo $this->base; ?>/dashboard">Dashboard - <?php echo ucfirst($this->UserAuth->getGroupName()); ?></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo $this->base; ?>/changePassword"><i class="fa fa-gear fa-fw"></i> Change Password</a>
                    	<?php   if(!$this->UserAuth->isAdmin()) { ?>
                        <li><a href="<?php echo $this->base; ?>/myprofile"><i class="fa fa-user fa-fw"></i> User Profile</a></li>
                        <?php } else { ?>
						<li><a href="<?php echo $this->base; ?>/viewUser/<?php echo $this->UserAuth->getUserId(); ?>"><i class='fa fa-user fa-fw'></i> Profile</a></li>
                        <?php }?>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo $this->base; ?>/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li><a href="<?php echo $this->base; ?>/dashboard"><i class='fa fa-dashboard fa-fw'></i> Dashboard</a></li>
                        <?php   if ($this->UserAuth->isAdmin()) { ?>
            						<li><a href="<?php echo $this->base; ?>/addUser"><i class='fa fa-plus fa-fw'></i> Add User</a></li>
            						<li><a href="<?php echo $this->base; ?>/allUsers"><i class='fa fa-users fa-fw'></i> All Users</a></li>
            						<li><a href="<?php echo $this->base; ?>/addGroup"><i class='fa fa-user fa-fw'></i> Add Group</a></li>
            						<li><a href="<?php echo $this->base; ?>/allGroups"><i class='fa fa-users fa-fw'></i> All Groups</a></li>
            						<li><a href="<?php echo $this->base; ?>/permissions"><i class='fa fa-gear fa-fw'></i> Permissions</a></li>
            						<li><a href="<?php echo $this->base; ?>/viewUser/<?php echo $this->UserAuth->getUserId(); ?>"><i class='fa fa-user fa-fw'></i> Profile</a></li>
            						<li><a href="<?php echo $this->base; ?>/editUser/<?php echo $this->UserAuth->getUserId(); ?>"><i class="fa fa-dashboard fa-fw"></i>  Edit Profile</a></li>
            					  <?php   }
                                  elseif($this->UserAuth->isDoc()){ ?>
                                    <li><a href="<?php echo $this->base; ?>/viewUser/<?php echo $this->UserAuth->getUserId(); ?>"><i class='fa fa-user fa-fw'></i> Profile</a></li>
                                    <li>
                                        <a href="#"><i class="fa fa-users fa-fw"></i> Patients<span class="fa arrow"></span></a>
                                        <ul class="nav nav-second-level">
                                            <li>
                                                <a href="<?php echo $this->base; ?>/addPatient/">Add new Patient</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo $this->base; ?>/allPatients/">All Patients</a>
                                            </li>
                                        </ul>
                                        <!-- /.nav-second-level -->
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-users fa-fw"></i> Procedure Categories<span class="fa arrow"></span></a>
                                        <ul class="nav nav-second-level">
                                            <li>
                                                <a href="<?php echo $this->base; ?>/addProCat/">Add new Procedure Category</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo $this->base; ?>/allProCats/">All Procedure Categories</a>
                                            </li>
                                        </ul>
                                        <!-- /.nav-second-level -->
                                    </li>
                                    <li><a href="<?php echo $this->base; ?>/allProcedures/"><i class="fa fa-file fa-fw"></i> All Procedures</a></li>
                                    <li><a href="<?php echo $this->base; ?>/allConsultations/"><i class="fa fa-file fa-fw"></i> All Consultations</a></li>
                                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a></li>
                                    <li><a href="<?php echo $this->base; ?>/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                                    
                                    <?php }elseif($this->UserAuth->isRec()){ ?>
                                    <li>
                                        <a href="#"><i class="fa fa-users fa-fw"></i> Patients<span class="fa arrow"></span></a>
                                        <ul class="nav nav-second-level">
                                            <li>
                                                <a href="<?php echo $this->base; ?>/addPatient/">Add new Patient</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo $this->base; ?>/allPatients/">All Patients</a>
                                            </li>
                                        </ul>
                                        <!-- /.nav-second-level -->
                                    </li>
                                    <li><a href="<?php echo $this->base; ?>/allProcedures/"><i class="fa fa-file fa-fw"></i> All Procedures</a></li>
                                    <li><a href="<?php echo $this->base; ?>/allConsultations/"><i class="fa fa-file fa-fw"></i> All Consultations</a></li>
                                    <li><a href="<?php echo $this->base; ?>/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                                    <?php } else {?>
            						<li><a href="<?php echo $this->base; ?>/myprofile"><i class="fa fa-user fa-fw"></i>  Profile</a></li>
            					  <?php   } ?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>









