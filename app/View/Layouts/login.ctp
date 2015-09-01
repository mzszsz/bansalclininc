<?php
$cakeDescription = __d('cake_dev', 'Property Reports');
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

		echo $this->Html->css('cake.generic');
		echo $this->Html->css('umstyle.css');
		echo $this->Html->css('bower_components/bootstrap/dist/css/bootstrap.min.css');
		echo $this->Html->css('bower_components/metisMenu/dist/metisMenu.min.css');
		echo $this->Html->css('dist/css/sb-admin-2.css');
		echo $this->Html->css('bower_components/font-awesome/css/font-awesome.min.css');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
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
	
<?php 
    echo $this->Html->script('bower_components/jquery/dist/jquery.min.js');
    echo $this->Html->script('bower_components/bootstrap/dist/js/bootstrap.min.js');
    echo $this->Html->script('bower_components/metisMenu/dist/metisMenu.min.js');
    echo $this->Html->script('sb-admin-2.js');
    ?>
</body>
</html>