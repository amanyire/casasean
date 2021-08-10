<?php
  include_once 'class.php';
  $user = new db_class();
  session_start();
  if(isset($_REQUEST['category'])){
    $_SESSION['category']=$_REQUEST['category'];
    header("Location:index.php");
  }elseif(!isset($_SESSION['category'])){
      $_SESSION['category']="color";
      header("Location:index.php");
  }else{
    $category=$_SESSION['category'];
  }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<!-- Add Dropzone -->
<link rel="stylesheet" type="text/css" href="css/dropzone.css" />
<script type="text/javascript" src="js/dropzone.js"></script>
<style type="text/css"> 
body{
color:#666666;
}
</style>
</head>
<body >

<h2 align="center" style="text-transform:uppercase; color:#006600"> Upload <span style="color:#FF0000; "><?php if($category=='black') echo "Black & White"; else echo $category; ?></span> photos </h2>
<div class="btn-group" style="width:100%">
	<b>SELECT CATEGORY</b>:<br/> <p> 
    <?php 
    $sql3="SELECT distinct category from photo ";
    $conn = $user->database_connect();
    $results = $conn->query($sql3);
    $valy = mysqli_fetch_array($results);
    

	  while($val=mysqli_fetch_array($results)){
	  $ct= $val['category'];
	  ?>
          <a href="?category=<?php echo $val['category'];?> "><button type="button" class="btn btn-info" style="border:1px solid #009999; background:<?php if($category==$val['category']) echo "#330000"; else echo "#009999"; ?>; border-radius:2px; padding:5px; font-size:medium; color:#F8F8F8; margin:3px"><?php if($ct=='black') echo "Black & White"; else echo $ct; ?></button></a>
					  <?php } ?>
					  </p>
                    </div>
<div  class="image_upload_div" style="background-color:#F7F7F7">

	<form action="upload2.php" class="dropzone" style="background-color:#F7F7F7">
	
    </form>
</div> 	
<div>
<p >
NOTICE: <BR/>
-Please make sure that you are uploading images in the correct category.<br/> The current category is: <b style="color:red; text-transform:uppercase"><?php if($category=='black') echo "Black & White"; else echo $category; ?></b>, All the images you upload now will be saved as <?php if($category=='black') echo "Black & White"; else echo $category; ?> photos . <br/> You can change the category from the above buttons.
</p>
<br/><br/><br/><br/>
<a href="../"><button type="button" class="btn btn-info" style="border:1px solid #009999; background:#CC0000; border-radius:2px; padding:5px; font-size:medium; color:#F8F8F8; margin:3px">Back</button></a>
</div>
<div>

</div>
</body>
</html>  

    
    
    
    
    

