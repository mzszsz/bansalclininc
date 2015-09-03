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

$cakeDescription = __d('cake_dev', 'Bansal Clinic');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');
		//echo $this->Html->css('umstyle.css');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		
		
	?>
	  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<?php echo $this->Html->css('bower_components/bootstrap/dist/css/bootstrap.min.css');?>
    <?php echo $this->Html->css('bower_components/metisMenu/dist/metisMenu.min.css');?>
    <?php echo $this->Html->css('dist/css/timeline.css');?>
    <?php echo $this->Html->css('dist/css/sb-admin-2.css');?>
    <?php echo $this->Html->css('bower_components/morrisjs/morris.css');?>
    <?php echo $this->Html->css('bower_components/font-awesome/css/font-awesome.min.css');?>
    <?php echo $this->Html->css('style.css');echo $this->Html->css('custom_s');?>

    <!-- jQuery -->
    <?php echo $this->Html->script('bower_components/jquery/dist/jquery.min.js'); ?>
<?php //echo $this->Html->script('bower_components/morrisjs/morris.min.js'); ?>
	    <?php //echo $this->Html->script('morris-data.js'); ?>
    <!-- Bootstrap Core JavaScript -->
    <?php echo $this->Html->script('bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>

    <!-- Metis Menu Plugin JavaScript -->
    <?php echo $this->Html->script('bower_components/metisMenu/dist/metisMenu.min.js'); ?>

    <!-- Morris Charts JavaScript -->
    <?php echo $this->Html->script('bower_components/raphael/raphael-min.js'); ?>
 
   

    <!-- Custom Theme JavaScript -->
    <?php echo $this->Html->script('sb-admin-2.js'); ?>
    <?php echo $this->Html->script('csv.js'); ?>
</head>
<body>
	<div id="container">
		<!-- <div id="header">
			<h1><?php echo $this->Html->link($cakeDescription, $this->html->url('/', true)); ?></h1>
		</div> -->
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<!-- <div id="footer">
			<?php /*echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
				);*/
			?>
			<p>
				<?php //echo $cakeVersion; ?>
			</p>
		</div> -->
	</div>
	<?php //echo $this->element('sql_dump'); ?>
	   <?php echo $this->fetch('script'); ?>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type="text/javascript">
  $('.datepicker').datepicker({
    format: 'yy-mm-dd',
    startDate: '-3d'
  })
  $(document).ready(function(){
  	$('body').on('click','.fee_Cat',function() {
      var val=$(this).val();
      if(val!=0){
        $('.fee_input').show();
      }
      else{
        $('.fee_input').hide();
        $('.fee_input input').val('0');
      }
    });
    $('body').on('change','.byid select',function() {
      $('.byid').submit();
    });
  });
</script>
	   
<script type="text/javascript">
var path="<?php echo $this->webroot; ?>";
jQuery(document).ready(function(){
  jQuery('body').on('click','.search_btn',function(e){
    e.preventDefault();
    var search=jQuery('.search_field').val();
    jQuery.ajax({
      url:path+'searchPatient/'+search,
      success:function(res){
        jQuery('.search_result').html(res);
      }
    });
  })
});
</script>
</body>
</html>
