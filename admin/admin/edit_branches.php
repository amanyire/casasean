<?php
  include_once 'class.php';
  $user = new db_class();
  session_start();
  if(isset($_REQUEST['category'],$_REQUEST['photo_id'])){
      $_SESSION['r_category']=$_REQUEST['category'];
	  $_SESSION['photo_id']=$_REQUEST['photo_id'];
    header("Location:edit_branches.php");
  }elseif(isset($_SESSION['r_category'],$_SESSION['photo_id'])){
      $category=$_SESSION['r_category'];
	  $photo_id=$_SESSION['photo_id'];
  }else{
      echo "<h1 style='color:red'>Content not found</h1>";
	  return;
  }

?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
  <script type="text/javascript" src="whizzywig.js"></script>
</head>
<body onload="whizzywig()">
<div class="col-md-6 col-md-offset-3" style="text-align:center">
<form action="" method="post">
<h1 style="color:red">
  <?php
if(isset($_REQUEST['title'],$_REQUEST['comment'],$_REQUEST['video_id'])){
	$title=$user->clean_data($_REQUEST['title']);
	$video_id=$user->clean_data($_REQUEST['video_id']);
	$comment=$_REQUEST['comment'];
	$time=time();
	if($title && $comment && $video_id){
    $sql5="update photo set title='$title',comment='$comment',update_time='$time',video_id='$video_id' where photo_id='$photo_id' && category='$category'";
    $conn = $user->database_connect();
    $results = $conn->query($sql5);
		
		echo "Operation okay";
		}
}

?></h1>
<?php
    $sql3="SELECT * from photo where photo_id='$photo_id' && category='$category' ";
    $conn = $user->database_connect();
    $results = $conn->query($sql3);
    $val = mysqli_fetch_array($results);
            

           

$title=$val['title'];
$comment=$val['comment'];
$photo=$val['photo_name'];
$video_id=$val['video_id'];
 ?>
  <?php 
$file= '../../images/'.$category.'/'.$photo;
if(file_exists($file) && $photo !=""){ ?>
 <p><img src="<?php echo $file; ?>" width="200px" /></p>
 <?php } ?>
<p>Title:<br/><input class="form-control" type="text" name="title" value="<?php echo $title; ?>"></p>
<?php if($category!=" " ){ ?>
<p>Description:<br/><textarea style="width:100%; height:150px" class="form-control" type="text" name="comment" cols="50" rows="10"><?php echo $comment; ?></textarea></p>
<?php }else{ ?>
<p>Comment:<br/><input class="form-control" type="text" name="comment" maxlength="30" value="<?php echo $comment; ?>"></p>
<?php }?>

<?php if($category=="projects" || $category=="ambassadar" || $category=="works"  || $category=="home"  ){ ?>
<p title="More Info">Title<br/><input class="form-control" type="text" name="video_id" maxlength="100" value="<?php echo $video_id; ?>"></p>
<?php }else{ ?>
<p><input  type="hidden" name="video_id" value="<?php echo $video_id; ?>"></p>
<?php }?>
<p><input type="submit" style="font-size:large; background-color:red; padding:10px; color:#FFF; border:1px solid #CCC" value="Update" /></p>
</form>
</div>
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>