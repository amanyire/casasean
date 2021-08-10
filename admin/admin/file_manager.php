<?php
  include("../connect.php");
  session_start();
  if(isset($_REQUEST['category'],$_REQUEST['photo_id'])){
      $_SESSION['r_category']=$_REQUEST['category'];
	  $_SESSION['photo_id']=$_REQUEST['photo_id'];
    header("Location:file_manager.php");
  }elseif(isset($_SESSION['r_category'],$_SESSION['photo_id'])){
      $category=$_SESSION['r_category'];
	  $photo_id=$_SESSION['photo_id'];
  }else{
      echo "<h1 style='color:red'>Photo not found</h1>";
	  return;
  }
?>
<!-- Add Dropzone -->
<link rel="stylesheet" type="text/css" href="upload/css/dropzone.css" />
<script type="text/javascript" src="upload/js/dropzone.js"></script>
<style type="text/css"> 
body{
color:#666666;
}
</style>
</head>
<body style="background-repeat:repeat-y; background-position:center; background-size:cover;">

<div  class="image_upload_div" style="background-color:#F7F7F7;">

	<form action="upload/upload2.php" class="dropzone" style="background-color:#F7F7F7">
	
    </form>
</div> 	
<div>

</div>
<div>

</div>
</body>
</html>  

    
    
    
    
    

