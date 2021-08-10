<?php
  include_once '../class.php';
  $user = new db_class();
  session_start();
  if(isset($_REQUEST['category'],$_REQUEST['photo_id'])){
      $_SESSION['r_category']=$_REQUEST['category'];
	  $_SESSION['photo_id']=$_REQUEST['photo_id'];
    header("Location:replace_image.php");
  }elseif(isset($_SESSION['r_category'],$_SESSION['photo_id'])){
      $category=$_SESSION['r_category'];
	  $photo_id=$_SESSION['photo_id'];
  }else{
      echo "<h1 style='color:red'>Photo not found</h1>";
	  return;
  }
?>
<?php
	//get id of the next photo to be edited;
    $sql3="SELECT * from photo where photo_id='$photo_id' && category='$category' ";
    $conn = $user->database_connect();
    $results = $conn->query($sql3);
    $valy = mysqli_fetch_array($results);
	if($valy){
	$nextid=$valy['photo_id'];
	$nextphoto=$valy['photo_name'];
	}else{
	  echo "<h1 style='color:red'>Photo not found</h1>";
	  return;
	}
	/*$ext= explode(".", $lastimage);//explode the image name
	$last_value=$ext[0];//the name of the image without the extension
	if($last_value==21){
	$next_value=1;
	}else{
	$next_value=$last_value+1;
	}*/
	$next_value=time()."".rand(100, 1000);
  
?>
<?php

// If you want to ignore the uploaded files, 
// set $demo_mode to true;

$demo_mode = false;
$upload_dir = '../../../img/'.$category."/";//where to upload images
$new_image=$next_value.".jpg";//image name
$allowed_ext = array('jpg','jpeg','png','gif','JPG','PNG');


if(strtolower($_SERVER['REQUEST_METHOD']) != 'post'){
	exit_status('Error! Wrong HTTP method!');
}


if(array_key_exists('file',$_FILES) && $_FILES['file']['error'] == 0 ){
	
	$file = $_FILES['file'];

	if(!in_array(get_extension($file['name']),$allowed_ext)){
		exit_status('Only '.implode(',',$allowed_ext).' files are allowed!');
	}	

	if($demo_mode){
		
		// File uploads are ignored. We only log them.
		
		$line = implode('		', array( date('r'), $_SERVER['REMOTE_ADDR'], $file['size'], $file['name']));
		file_put_contents('log.txt', $line.PHP_EOL, FILE_APPEND);
		
		exit_status('Uploads are ignored in demo mode.');
	}
	
	
	// Move the uploaded file from the temporary 
	// directory to the uploads folder:
	
 if(move_uploaded_file($file['tmp_name'], $upload_dir.$new_image)){
	//after uploading the image, compress it to reduce space consumtion
	$source_img      = $upload_dir.$new_image; 
    $destination_img = $upload_dir.$new_image; 
    if($category=="slider")
    $max_width="1900";
    else	
	$max_width="1200";
	$width = getWidth($source_img);
			$height = getHeight($source_img);
			//Scale the image if it is greater than the width set above
			if ($width > $max_width){
				$scale = $max_width/$width;
				$uploaded = resizeImage($source_img,$width,$height,$scale);
			}else{
				$scale = 1;
				$uploaded = resizeImage($source_img,$width,$height,$scale);
			}
	/*$fsx=filesize($source_img);
	//$d = compress($source_img, $destination_img, 10);
	if($fsx >= 2000000){
	   $d = compress($source_img, $destination_img, 10);
	}
	elseif($fsx >= 1000000){
	   $d = compress($source_img, $destination_img, 20);
	}
	elseif($fsx >= 100000){
	   $d = compress($source_img, $destination_img, 30);
	}
	elseif($fsx >= 10000){
	   $d = compress($source_img, $destination_img, 40);
	}	
	else{
	   $d = compress($source_img, $destination_img, 60);
	}*/
	
	//insert file information into db table
	$time=time();
	//mysql_query("update last_edited set photo_name='$new_image' where category='$category'")or die(mysql_error());
	 
	 $sql5="update photo set update_time='$time',photo_name='$new_image' where photo_id='$nextid' && category ='$category'";
    $conn = $user->database_connect();
    $results = $conn->query($sql5);
	 $oldfile=$upload_dir.$nextphoto;
	 unlink($oldfile);//delete previous file
	/*$selx=mysql_query("Select * from photo where category='$category' && photo_name='$new_image'")or die(mysql_error());
	$valx=mysql_fetch_array($selx);
	
	if($valx){
	  mysql_query("update photo set update_time='$time' where photo_name='$new_image'")or die(mysql_error());
	}else{
	    mysql_query("insert into photo set update_time='$time',photo_name='$new_image',title='$category',comment='Classic photo', category='$category'")or die(mysql_error());
	}*/
		exit_status('File was uploaded successfuly!');
	}
	
}

exit_status('Something went wrong with your upload!');


// Helper functions

function exit_status($str){
	echo json_encode(array('status'=>$str));
	exit;
}

function get_extension($file_name){
	$ext = explode('.', $file_name);
	$ext = array_pop($ext);
	return strtolower($ext);
}
?>

<?php 

function compress($source, $destination, $quality) { 
$info = getimagesize($source); 
if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source);
 elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source); 
 elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source); 
 imagejpeg($image, $destination, $quality); 
 return $destination; 
 } 
 
 
 function resizeImage($image,$width,$height,$scale) {
	list($imagewidth, $imageheight, $imageType) = getimagesize($image);
	$imageType = image_type_to_mime_type($imageType);
	$newImageWidth = ceil($width * $scale);
	$newImageHeight = ceil($height * $scale);
	$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
	switch($imageType) {
		case "image/gif":
			$source=imagecreatefromgif($image); 
			break;
	    case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
			$source=imagecreatefromjpeg($image); 
			break;
	    case "image/png":
		case "image/x-png":
			$source=imagecreatefrompng($image); 
			break;
  	}
	imagecopyresampled($newImage,$source,0,0,0,0,$newImageWidth,$newImageHeight,$width,$height);	
	switch($imageType) {
		case "image/gif":
	  		imagegif($newImage,$image); 
			break;
      	case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
	  		imagejpeg($newImage,$image,90); 
			break;
		case "image/png":
		case "image/x-png":
			imagepng($newImage,$image);  
			break;
    }
	
	//chmod($image, 0777);
	return $image;
}


//You do not need to alter these functions
function getHeight($image) {
	$size = getimagesize($image);
	$height = $size[1];
	return $height;
}
//You do not need to alter these functions
function getWidth($image) {
	$size = getimagesize($image);
	$width = $size[0];
	return $width;
}

 ?> 