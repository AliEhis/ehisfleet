<?php
//note : profile is the name of your file input field in form, you can choose any name, just make the changes							  		
	    $ftype=$_FILES['pic']['type'];
				  
	//get image width and height	
	list($w, $h) = getimagesize($_FILES['pic']['tmp_name']); 
	
		
	//check upload size
	if($w >550 || $h>650 )
	{
	$filename=resize($_FILES['pic']['tmp_name']);
	$ffile = fopen($filename,"r");
	
	
	$contents = fread($ffile,$_FILES['pic']['size']);
$image = chunk_split(base64_encode($contents)); 
	}
	else
	{
	$ffile = fopen($_FILES['pic']['tmp_name'],"r");
	$contents = fread($ffile,$_FILES['pic']['size']);
$image = chunk_split(base64_encode($contents)); 
	
	}



		function resize($file)
					{
					
					$width = 250;
$height = 265;

// Content type


// Get new dimensions
list($width_orig, $height_orig) = getimagesize($file);

$ratio_orig = $width_orig/$height_orig;

if ($width/$height > $ratio_orig) {
   $width = $height*$ratio_orig;
} else {
   $height = $width/$ratio_orig;
}

// Resample
$image_p = imagecreatetruecolor($width, $height);
$image = imagecreatefromjpeg($file);
imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
imagejpeg($image_p,"re.jpg",100);




return "re.jpg";



					
					
					
					
					}
						
	?>