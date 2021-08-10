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
?>
<!-- Add Dropzone -->
<link rel="stylesheet" type="text/css" href="css/dropzone.css" />
<script type="text/javascript">
function createPhotoThumb(){	
	document.getElementById('imageForm').innerHTML= '<META http-equiv="refresh" content="0;URL=crop/upload_thumb.php"><img src="load.gif" />';
}
</script>

<script type="text/javascript" src="js/dropzone.js"></script>
<style type="text/css"> 
body{
color:#666666;
}
</style>
</head>
<body style="">
<div>
<div  id="imageForm"  class="image_upload_div" style="background-color:#F7F7F7;">

	<form action="upload2.php" class="dropzone" style="background-color:#F7F7F7;color:#822049">
	
    </form>
</div> 	
<p align="center">
<?php 
$file= '../../../images/'.$category.'/'.$nextphoto;
if(file_exists($file) && $nextphoto!=""){ ?>
<img src="<?php echo $file;?>" style="max-width:600px;" />
<?php } ?>
</p>
</body>
</html>  

    
    
    
    
    

