<?php //var_dump($imagesAll); 
foreach ($imagesAll as $key => $value) {
	echo "<div class='col-md-2 img_cross'><img class='thumbnail' src='".$this->webroot."/".$value['PropertyImage']['path']."'><span data-id='".$value['PropertyImage']['id']."' data-dir='".$value['PropertyImage']['case_id']."' data-type='".$value['PropertyImage']['type']."' class='img_del'><i class='fa fa-times'></i></span></div>";
}
?>