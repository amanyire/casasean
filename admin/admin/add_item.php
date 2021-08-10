<?php
  include_once 'class.php';
    
  $user = new db_class();
  session_start();
  if(isset($_REQUEST['category'])){
      $_SESSION['r_category']=$_REQUEST['category'];
    header("Location:add_item.php");
  }elseif(isset($_SESSION['r_category'])){
      $category=$_SESSION['r_category'];
    $sql3="SELECT count(*) total from photo where category='$category'";
    $conn = $user->database_connect();
    $results = $conn->query($sql3);
    $vl = mysqli_fetch_array($results);
      
      $count=$vl['total'];
      if($count>35){
        echo "<h1 style='text-align: center'><br/><br/><br/>Content Limit Exceeded. You can not add more content in this category.";return;
      }
  }else{
      echo "<h1 style='color:red'>Content not found</h1>";
	  return;
  }

?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
<h1 style="text-align: center">Add new <?php echo str_replace("_", " ", $category); ?></h1>
<div class="col-md-6 col-md-offset-3" style="text-align:center">
<form action="" method="post">
<h1 style="color:red"><?php
if(isset($_REQUEST['title'],$_REQUEST['comment'],$_REQUEST['video_id'])){
	$title=$user->clean_data($_REQUEST['title']);
	$video_id=$user->clean_data($_REQUEST['video_id']);
	$comment=$_REQUEST['comment'];
	$time=time();
	if($title && $comment && $video_id){
    $sql3="INSERT INTO photo set title='$title',comment='$comment',update_time='$time',video_id='$video_id', category='$category'";
    $conn = $user->database_connect();
    $results = $conn->query($sql3);
    


		
		echo "Content added successfuly";
		}
}

?></h1>

<p>Title:<br/><input type="text" class="form-control" name="title" value="<?php echo isset($_POST['title'])?$_POST['title']:'';  ?>"></p>
<?php if($category!=" "){ ?>
<p>Description:<br/><textarea style="width:100%; height:150px" class="form-control" type="text" name="comment" cols="50" rows="10"><?php echo isset($_POST['comment'])?$_POST['comment']:'';  ?></textarea></p>
<?php }else{ ?>
<p>Comment:<br/><input class="form-control" type="text" name="comment" maxlength="100" value="<?php echo isset($_POST['comment'])?$_POST['comment']:'';  ?>"></p>
<?php }?>
<?php if($category=="projects" || $category=="works" || $category=="ways_to_give" ){ ?>
<p title="More Info">Title<br/><input class="form-control" type="text" name="video_id" maxlength="100" value="<?php echo isset($_POST['video_id'])?$_POST['video_id']:'';  ?>"></p>
<?php }else{ ?>
<p><input type="hidden" name="video_id" value="<?php echo isset($_POST['video_id'])?$_POST['video_id']:'none';  ?>"></p>
<?php }?>


<p><input type="submit" style="font-size:large; background-color:red; padding:10px; color:#FFF; border:1px solid #CCC" value="Save Item" /></p>
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