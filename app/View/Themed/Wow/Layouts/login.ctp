<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'Reputaion Management System');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?> 
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<?php echo $this->Html->charset(); ?>
<title>
           <?php 
		   if(isset($design['AgencysiteSetting']['sitetitle']))
           {
			   $bname = $design['AgencysiteSetting']['sitetitle'];
               echo $bname;
			   echo ' ';
               echo $this->fetch('title'); 
            }
            else
            {
           	echo $cakeDescription;
           	echo $this->fetch('title');
            }
	     ?> 
		<?php
		if(isset($design['AgencysiteSetting'][''])) 
		?>
	</title>
	<?php echo $this->Html->script('jquery'); ?>
	<?php echo $this->Html->script('jquery.validate.min'); ?>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
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
<?php 
if(isset($design['AgencysiteSetting']['faviconimageurl']) && $design['AgencysiteSetting']['faviconimageurl'])
{
	$url = $design['AgencysiteSetting']['faviconimageurl'];


?>
<link href="/repmgsys/img/agencylogo/<?php echo @$url ?>" type="image/x-icon" rel="shortcut icon" />
<?php
}else { ?>
<link href="/repmgsys/favicon.ico" type="image/x-icon" rel="shortcut icon" />
<?php }?>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<?php  
 
//if(isset($design) && !empty($design['AgencysiteSetting']['sitebackgroundcolor']))
                     //  {
                     //  $bodycolor = $design['AgencysiteSetting']['sitebackgroundcolor'];  
                        ?>

<body class="login">
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGO -->
<div class="logo">
	<a href="#">
	<?php echo $this->Html->image('logo.png', ['class' => 'logo-default']); ?>
	</a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<!-- BEGIN CONTAINER -->
<div class="content">
	
	
				<?php echo $this->Session->flash(); ?>
			
				<?php echo $this->fetch('content'); ?>	
</div>
<div class="copyright">
	 2015 © ReForce by Gale Force Digital Technologies, Inc.
</div>
<!-- END LOGIN -->

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
<?php echo $this->Html->script('select2.min'); ?>
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
<?php echo $this->Html->script('demo'); ?>
<?php echo $this->Html->script('index'); ?>
<?php echo $this->Html->script('form-wizard'); ?>
<?php echo $this->Html->script('tasks'); ?>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   QuickSidebar.init(); // init quick sidebar  
   FormComponents.init();
   FormWizard.init();
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
<!-- END BODY -->
</html>