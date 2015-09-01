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
</script>
	   
<script type="text/javascript">
var path="<?php echo $this->webroot; ?>";
/*Property Images Upload*/
          var files_0;
          $('.property_upload').on('change', prepareUpload);
          function prepareUpload(event)
          {
            files_0 = event.target.files;
          }
          $('#property_upload').on('click',function(){
            if($('.property_upload').val==''){
              return false;
            }
          }, uploadFiles);
          // Catch the form submit and upload the files
          function uploadFiles(event)
          {
             event.stopPropagation(); // Stop stuff happening
             event.preventDefault(); // Totally stop stuff happening
      			 var data = new FormData();
      			 var hash=$(this).data('hash');
              $.each(files_0, function(key, value)
              {
                  data.append(key, value);
              });
              
              $.ajax({
                  url: path+'uploadImage/'+hash+'/property',
                  type: 'POST',
                  data: data,
                  cache: false,
                  //dataType: 'json',
                  processData: false, // Don't process the files
                  contentType: false, // Set content type to false as jQuery will tell the server its a query string request
                  success: function(res)
                  {
                      //console.log(res);
                     //alert("Images Uploaded");
                     $('#property_image_div').html(res);
                     $('.property_upload').val('');
                  }
              });
           }
/*Property Images Upload End*/
/*bed_upload Images Upload*/
          var files_1;
          $('.bed_upload').on('change', prepareUpload_1);
          function prepareUpload_1(event)
          {
            files_1 = event.target.files;
          }
          $('#bed_upload').on('click', uploadFiles_1);
          // Catch the form submit and upload the files
          function uploadFiles_1(event)
          {
             event.stopPropagation(); // Stop stuff happening
             event.preventDefault(); // Totally stop stuff happening
    			 var data = new FormData();
    			 var hash=$(this).data('hash');
              $.each(files_1, function(key, value)
              {
                  data.append(key, value);
              });
              
              $.ajax({
                  url: path+'uploadImage/'+hash+'/bed',
                  type: 'POST',
                  data: data,
                  cache: false,
                  //dataType: 'json',
                  processData: false, // Don't process the files
                  contentType: false, // Set content type to false as jQuery will tell the server its a query string request
                  success: function(res)
                  {
                      //console.log(res);
                     //alert("Images Uploaded");
                     $('#bed_image_div').html(res);
                     $('.bed_upload').val('');
                  }
              });
           }
/*bed_upload Images Upload end*/  
/*kitchen_upload Images Upload*/           
          var files_2;
          $('.kitchen_upload').on('change', prepareUpload_2);
          function prepareUpload_2(event)
          {
            files_2 = event.target.files;
          }
          $('#kitchen_upload').on('click', uploadFiles_2);
          // Catch the form submit and upload the files
          function uploadFiles_2(event)
          {
             event.stopPropagation(); // Stop stuff happening
             event.preventDefault(); // Totally stop stuff happening
    			 var data = new FormData();
    			 var hash=$(this).data('hash');
              $.each(files_2, function(key, value)
              {
                  data.append(key, value);
              });
              
              $.ajax({
                  url: path+'uploadImage/'+hash+'/kitchen',
                  type: 'POST',
                  data: data,
                  cache: false,
                  //dataType: 'json',
                  processData: false, // Don't process the files
                  contentType: false, // Set content type to false as jQuery will tell the server its a query string request
                  success: function(res)
                  {
                      //console.log(res);
                     //alert("Images Uploaded");
                     $('#kitchen_image_div').html(res);
                     $('.kitchen_upload').val('');
                  }
              });
           }
/*kitchen_upload Images Upload end*/   

/*drawing_upload Images Upload*/   
          var files_3;
          $('.drawing_upload').on('change', prepareUpload_3);
          function prepareUpload_3(event)
          {
            files_3 = event.target.files;
          }
          $('#drawing_upload').on('click', uploadFiles_3);
          // Catch the form submit and upload the files
          function uploadFiles_3(event)
          {
             event.stopPropagation(); // Stop stuff happening
             event.preventDefault(); // Totally stop stuff happening
    			 var data = new FormData();
    			 var hash=$(this).data('hash');
              $.each(files_3, function(key, value)
              {
                  data.append(key, value);
              });
              
              $.ajax({
                  url: path+'uploadImage/'+hash+'/drawing',
                  type: 'POST',
                  data: data,
                  cache: false,
                  //dataType: 'json',
                  processData: false, // Don't process the files
                  contentType: false, // Set content type to false as jQuery will tell the server its a query string request
                  success: function(res)
                  {
                      //console.log(res);
                     //alert("Images Uploaded");
                     $('#drawing_image_div').html(res);
                     $('.drawing_upload').val('');
                  }
              });
           }
/*drawing_upload Images Upload end*/              

$(document).ready(function(){
  $('body').on('click','.img_del',function(e){
      e.preventDefault();
      var type=$(this).data('type');
      var dir=$(this).data('dir');
      var id=$(this).data('id');
      if(confirm("Are you sure?")){
        $.ajax({
            url: path+'deleteImage/'+dir+'/'+type+'/'+id,
            type: 'POST',
            data: {type},
            cache: false,
            success: function(res)
            {
               //alert("Images Deleted");
               $('#'+type+'_image_div').html(res);
            }
        });
      }
  });
});
</script>
</body>
</html>
