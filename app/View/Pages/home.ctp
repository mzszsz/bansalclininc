<?php
/**
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 */

if (!Configure::read('debug')):
	throw new NotFoundException();
endif;

App::uses('Debugger', 'Utility');
?>
<html>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<img src="<?php echo $this->Html->url('/').'/app/webroot/img/banner5.jpg' ?>"/>
				<h2><a href="<?php echo $this->Html->url('/').'/login'?>">Sign in</a>
				</h2>
			</div>
		</div>
	</div>
</body>
</html>
