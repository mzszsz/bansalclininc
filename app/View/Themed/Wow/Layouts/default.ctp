<?php
$cakeDescription = __d('cake_dev', 'CakePHP');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport"/>
	<meta content="" name="description"/>
	<meta content="" name="author"/>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');?>

		<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<?php echo $this->Html->css('font-awesome.css'); ?>
<?php echo $this->Html->css('simple-line-icons.min.css'); ?>
<?php echo $this->Html->css('bootstrap.min.css'); ?>
<?php echo $this->Html->css('uniform.default.css'); ?>
<?php echo $this->Html->css('bootstrap-switch.min.css'); ?>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<?php echo $this->Html->css('daterangepicker-bs3.css'); ?>
<?php echo $this->Html->css('fullcalendar.min.css'); ?>
<?php echo $this->Html->css('jqvmap.css'); ?>
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<?php echo $this->Html->css('tasks.css'); ?>
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->
<?php echo $this->Html->css('components.css'); ?>
<?php echo $this->Html->css('plugins.css'); ?>
<?php echo $this->Html->css('layout.css'); ?>
<?php echo $this->Html->css('default.css'); ?>
<?php // DISABLED THEME echo $this->Html->css('grey.css'); ?>
<?php echo $this->Html->css('custom.css'); ?>
<?php echo $this->Html->css('select2.css'); ?>
<?php echo $this->Html->css('login.css'); ?>
<?php // echo $this->Html->css('repelev.css'); ?>
<!-- END THEME STYLES -->

<?php		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<style>.page-content{margin-top:70px!important; }</style>
</head>
<body class="page-header-fixed page-quick-sidebar-over-content page-style-square">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top" id="logoh"> 
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="<?php //echo HTTP_ROOT?>">
			<?php echo $this->Html->image('logo.png', ['class' => 'logo-default']); ?>
			<?php //CUSTOM LOGO INPUT ?>
			</a>
			<?php echo $this->Html->link($cakeDescription, 'http://cakephp.org'); ?>



			<div class="menu-toggler sidebar-toggler hide">
				<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">
				<!-- BEGIN NOTIFICATION DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<i class="icon-bell"></i>
					<span class="badge badge-default">
					2 </span>
					</a>
					<ul class="dropdown-menu">
						<li class="external">
							<h3><span class="bold">2 pending</span> notifications</h3>
							<a href="extra_profile.html">view all</a>
						</li>
						<li>
							<ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
								<li>
									<a href="javascript:;">
									<span class="time">just now</span>
									<span class="details">
									<span class="label label-sm label-icon label-success">
									<i class="fa fa-plus"></i>
									</span>
									New user registered. </span>
									</a>
								</li>
								<li>
									<a href="javascript:;">
									<span class="time">3 mins</span>
									<span class="details">
									<span class="label label-sm label-icon label-danger">
									<i class="fa fa-bolt"></i>
									</span>
									Server #12 overloaded. </span>
									</a>
								</li>
								<!--removed example notification <li>'s-->
							</ul>
						</li>
					</ul>
				</li>
				<!-- END NOTIFICATION DROPDOWN -->
				<!-- BEGIN INBOX DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<i class="icon-envelope-open"></i>
					<span class="badge badge-default">
					1 </span>
					</a>
					<ul class="dropdown-menu">
						<li class="external">
							<h3>You have <span class="bold">1 New</span> Messages</h3>
							<a href="page_inbox.html">view all</a>
						</li>
						<li>
							<ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
								<li>
									<a href="inbox.html?a=view">
									<span class="photo">
									<img src="../../assets/admin/layout3/img/avatar2.jpg" class="img-circle" alt="">
									</span>
									<span class="subject">
									<span class="from">
									Lisa Wong </span>
									<span class="time">Just Now </span>
									</span>
									<span class="message">
									Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
									</a>
								</li>
								<!--Removed duplicate examples <li>-->
							</ul>
						</li>
					</ul>
				</li>
				<!-- END INBOX DROPDOWN -->
	
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<li class="dropdown dropdown-user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<?php // Removed (temp) due to profile pics // echo $this->Html->image('avatar3_small.jpg', ['class' => 'img-circle']); ?>
					<i class="fa fa-briefcase fa-lg reforce-color profile-icon"></i> <!-- Replacement for profile pic -->
					<span class="username username-hide-on-mobile">
					<?php //echo $bname ?> </span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-default">
						<li>
							<a href="extra_profile.html">
							<i class="icon-user"></i> My Profile </a>
						</li>
						<li>
							<a href="page_calendar.html">
							<i class="icon-calendar"></i> My Settings </a>
						</li>
						<li>
							<a href="inbox.html">
							<i class="icon-envelope-open"></i> My Notifications <span class="badge badge-danger">
							2 </span>
							</a>
						</li>
						<li class="divider">
						</li>
						<li>
							<a href="<?php //echo HTTP_ROOT?>users/logout">
							<i class="icon-key"></i> Log Out </a>
						</li>
					</ul>
				</li>
				<!-- END USER LOGIN DROPDOWN -->
				<!-- BEGIN QUICK SIDEBAR TOGGLER -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<li class="dropdown dropdown-quick-sidebar-toggler" style="display:none;">
					<a href="javascript:;" class="dropdown-toggle">
					<i class="icon-logout"></i>
					</a>
				</li>
				<!-- END QUICK SIDEBAR TOGGLER -->
			</ul>
		</div>
		<!-- END TOP NAVIGATION MENU -->
	</div>
		<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix"></div>	
		<div class="page-container" id="main-content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner">
		 <?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
				);
			?><?php echo $cakeVersion; ?>
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>
<!-- END FOOTER -->	
	<?php echo $this->element('sql_dump'); ?>
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../../assets/global/plugins/respond.min.js"></script>
<script src="../../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<?php echo $this->Html->script('jquery.min'); ?>
<?php echo $this->Html->script('jquery-migrate.min'); ?>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<?php echo $this->Html->script('jquery-ui.min'); ?>
<?php echo $this->Html->script('bootstrap.min'); ?>
<?php echo $this->Html->script('bootstrap-hover-dropdown.min'); ?>
<?php echo $this->Html->script('jquery.slimscroll.min'); ?>
<?php echo $this->Html->script('jquery.blockui.min'); ?>
<?php echo $this->Html->script('jquery.cokie.min'); ?>
<?php echo $this->Html->script('jquery.uniform.min'); ?>
<?php echo $this->Html->script('bootstrap-switch.min'); ?>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<?php echo $this->Html->script('jquery.vmap'); ?>
<?php echo $this->Html->script('jquery.vmap.russia'); ?>
<?php echo $this->Html->script('jquery.vmap.world'); ?>
<?php echo $this->Html->script('jquery.vmap.europe'); ?>
<?php echo $this->Html->script('jquery.vmap.germany'); ?>
<?php echo $this->Html->script('jquery.vmap.usa'); ?>
<?php echo $this->Html->script('jquery.vmap.sampledata'); ?>
<?php echo $this->Html->script('jquery.flot.min'); ?>
<?php echo $this->Html->script('jquery.flot.resize.min'); ?>
<?php echo $this->Html->script('jquery.flot.categories.min'); ?>
<?php echo $this->Html->script('jquery.pulsate.min'); ?>
<?php echo $this->Html->script('moment.min'); ?>
<?php echo $this->Html->script('daterangepicker'); ?>
<?php echo $this->Html->script('jquery.bootstrap.wizard.min'); ?>
<?php // echo $this->Html->script('additional-methods.min'); ?>
<!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
<?php echo $this->Html->script('fullcalendar.min'); ?>
<?php echo $this->Html->script('jquery.easypiechart.min'); ?>
<?php echo $this->Html->script('jquery.sparkline.min'); ?>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<?php echo $this->Html->script('metronic'); ?>
<?php echo $this->Html->script('layout'); ?>
<?php echo $this->Html->script('quick-sidebar'); ?>
<?php echo $this->Html->script('index'); ?>
<?php echo $this->Html->script('tasks'); ?>
<?php echo $this->Html->script('demo'); ?>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   QuickSidebar.init(); // init quick sidebar  
   Demo.init();
   Index.init();   
   Index.initDashboardDaterange();
   Index.initJQVMAP(); // init index page's custom scripts
   Index.initCalendar(); // init index page's custom scripts
   Index.initCharts(); // init index page's custom scripts
   Index.initChat();
   Index.initMiniCharts();
   Tasks.initDashboardWidget();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
</html>
