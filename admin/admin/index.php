<?php
  
  session_start();
  include_once 'class.php';
    
  $user = new db_class();
  //check if user is logged in
  if(isset($_SESSION['aid'])){
     $aid=$_SESSION['aid'];
     //echo $aid;
     
    $sql3="SELECT name FROM account WHERE aid = $aid";

   


     $conn = $user->database_connect();
            $results = $conn->query($sql3);
            

            $user_data = mysqli_fetch_array($results);
    
    if(!$user_data){
      //session_destroy();
        header("Location:../");
    }else{
      $myname=$user_data['name'];
      //echo $myname;
    }
  }else{
    //session_destroy();
    header("Location:../");
  }
  if(isset($_REQUEST['category'])){
    $_SESSION['category']=$_REQUEST['category'];
    header("Location:index.php");
  }elseif(!isset($_SESSION['category'])){
      $_SESSION['category']="slider";
      //echo $_SESSION['category'];
      header("Location:index.php");
  }else{
    $category=$_SESSION['category'];
     //echo $_SESSION['category'];
  }
  
  if(isset($_REQUEST['logout'])){
  session_destroy();
  header("Location:../");
  }
?>
<style type="text/css">
  .ion{
    color: #ffffff;
    font-size: 60px;
    padding-top: 10px;
  }
  .small-box{
    border-radius: 10px;

    -webkit-box-shadow: 10px 10px 5px 0px rgba(242,230,242,1);
-moz-box-shadow: 10px 10px 5px 0px rgba(242,230,242,1);
box-shadow: 10px 10px 5px 0px rgba(242,230,242,1);
  }
  .shadow {
  -webkit-box-shadow: 3px 3px 5px 6px #ccc;  /* Safari 3-4, iOS 4.0.2 - 4.2, Android 2.3+ */
  -moz-box-shadow:    3px 3px 5px 6px #ccc;  /* Firefox 3.5 - 3.6 */
  box-shadow:         3px 3px 5px 6px #ccc;  /* Opera 10.5, IE 9, Firefox 4+, Chrome 6+, iOS 5 */
}
</style>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Casa sean</title>
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
</head>

<body class="hold-transition  sidebar-mini" style=" background:#764c29;">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header" style="background: #5e4129">

    <!-- Logo -->
    <a href="index.php" class="logo" style="background: #d66a10">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini" style="color: #ffffff"><b>CASA SEAN</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg" style="color: #ffffff"><b>CASA SEAN</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button" style="color: #ffffff">
        <span class="sr-only" style="color: #ffffff">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel" style="padding-left: 80px">
        <div class="pull-left image">
          <img src="images/defualt_user.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-right info" >
          <p>&nbsp;</p>

          <!-- Status -->
          <a href="#" ><i class="fa fa-circle text-success"></i></a>
        </div>
      </div>

    
      <ul class="sidebar-menu" style="text-align: center;">

        <li class="header" style="color: #ffffff">MENU</li>
        <!-- Optionally, you can add icons to the links -->
        
        <li style="text-align: left;margin-left: 50px">
          
    

        <a  href="#" onclick="add_new_page()" style="text-transform:uppercase;color: #ffffff "> Add new page </a>


              
        </li>
        <li>
          <form  method="POST" >
          <select    type="text" name="category" onchange="this.form.submit()" style="padding: 8px;border-radius: 10px;font-family: Arial;font-size: 14px;background: rgba(255, 255, 255, 0.7);">
                 <option>Select Page / Section:</option>
                 USA</option>
                 <?php 
    $sql7="SELECT distinct category from photo";
    $conn = $user->database_connect();
    $result7 = $conn->query($sql7);
     //$sel = $user-> get_page_title();
    while($val=mysqli_fetch_array($result7) ){
    $ct= $val['category'];
    ?>    
         
          
           <option value="<?php echo $val['category'];?> ">
            <?php 
      if($ct=='black') echo "Black & White"; else echo str_replace("_", " ", $ct);
      ?>   
          </option> 
            <?php } ?>
          </select>
        </form>
         

       
        </li>
        <li><a href="?logout" ><i class="fa fa-link" style="color: #ffffff"></i> <span style="color: #ffffff">Log out</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Casa sean
        <small>Website analytics</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Home</li>
      </ol>
    </section>

    <!-- Main content -->
  
    <section class="content">
      <!-- Your Page Content Here -->
    <div class="row">
        <div class="col-lg-3 col-xs-6" >
          <!-- small box -->
          <div class="small-box bg-aqua shadow" style="border-radius: 10px;">
            <div class="inner">
              <h3><?php
                        
                 $visitors = $user->get_total_visitors();
                 ?></h3>
              <p>Total visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green"  style="border-radius: 10px;">
            <div class="inner">
              <h3><?php
                       $visits = $user-> get_total_visits();
                   ?>
                <sup style="font-size: 20px"></sup></h3>

              <p>Total visits</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow"  style="border-radius: 10px;">
            <div class="inner">
              <h3><?php
        //$av=$tvisit/$visit;
  //echo $av;
  echo "4";
  ?></h3>

              <p>Average visits</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red"  style="border-radius: 10px;">
            <div class="inner">
              <h3>
                  <?php
                        $clicks = $user-> get_total_clicks();
                   ?></h3>

              <p>Total clicks</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
    
      </div>
    
    
          <div class="row">
        <div class="col-xs-12">         
          <div class="" style="border-radius: 10px;background: #ffffff;-webkit-box-shadow: 0px 7px 20px 8px rgba(238,238,238,1);
-moz-box-shadow: 0px 7px 20px 8px rgba(238,238,238,1);
box-shadow: 0px 7px 20px 8px rgba(238,238,238,1);">
            <div class="box-header">
              <h3 class="box-title" style="font-size:large; text-transform:uppercase"> <?php 
         echo str_replace("_", " ", $category);
        ?> page Content</h3><br/>
<p style="text-align: center;">

        <a class="btn btn-danger" href="#" onclick="add_new_content('<?php echo $category;?>')">ADD NEW ITEM</a></p>
        


       
            </div>
            <!-- /.box-header -->
            <div class="box-body" >
          <div class="row" style="padding:0px;margin:0px;margin-bottom: 50px">

<script type="text/javascript">
function replace_image(id,category){
  document.getElementById("overlay").style="visibility:visible";
  document.getElementById("image_change_div").innerHTML='<iframe src="upload/replace_image.php?photo_id='+id+'&&category='+category+'" style="border:none;min-height:100%;height:100%;padding:0px;margin:0px;"  width="100%" height="100%"></iframe>'; 
              }
              function close_overlay(){
              document.getElementById("overlay").style="visibility:invisible";
              }
              
              function edit_image_content(id,category){
  document.getElementById("overlay").style="visibility:visible";
  document.getElementById("image_change_div").innerHTML='<object width="100%" height="100%" type="text/html" data="edit_branches.php?photo_id='+id+'&&category='+category+'" ></object>'; 
              }
             function delete_content(id){
  document.getElementById("overlay").style="visibility:visible";
  document.getElementById("image_change_div").innerHTML='<object width="100%" height="100%" type="text/html" data="delete.php?photo_id='+id+'" ></object>'; 
              }

              function add_new_page(){
  document.getElementById("overlay").style="visibility:visible";
  document.getElementById("image_change_div").innerHTML='<object width="100%" height="100%" type="text/html" data="add_new_page.php" ></object>'; 
              }

                function add_new_content(category){
  document.getElementById("overlay").style="visibility:visible";
  document.getElementById("image_change_div").innerHTML='<object width="100%" height="100%" type="text/html" data="add_item.php?category='+category+'" ></object>'; 
              }
               function add_product_content(){
  document.getElementById("overlay").style="visibility:visible";
  document.getElementById("image_change_div").innerHTML='<object width="100%" height="100%" type="text/html" data="product_upload.php" ></object>'; 
              }
              </script>


     <?php 
    $sql7="SELECT * from photo where category='$category'";
    $conn = $user->database_connect();
    $result7 = $conn->query($sql7);
     //$sel = $user-> get_page_title();
    while($val=mysqli_fetch_array($result7) ){
       //show last edited image
       $photo_id=$val['photo_id']; 
       $category4 = $val['category'];              
              ?>
<?php if($category!="slider" && $category!="works" && $category!="about" && $category!="home_about" && $category!="services" && $category!="blog" && $category!="projects" && $category!="our_clients" && $category!="yib" && $category!="yeb" && $category!="our_mentors" && $category!="consultancy" && $category!="vegetables"&& $category!="jewery"&& $category!="camps" && $category!="africa_print" && $category!="partners"&& $category!="footer_about" && $category!="footer_contact" ){ ?>
<div class="col-md-3" >
<?php }else{ ?>
            <div class="col-md-3" >
<?php } ?>
              <div class="color-palette-set" style="background: rgba(255,255,255,0.1);box-shadow: 0 7px 10px rgba(210,207,207,0.9), 0 5px 5px rgba(210,207,207,0.5);border-radius: 5px;color: #000;">
              <?php 
              
$file= '../../img/'.$category4.'/thumb/'.$val['thumb_nail'];
if(file_exists($file) && $val['thumb_nail']!=""){ ?>
                <img src="<?php echo $file; ?>" width="100%"  />
                <?php } ?>
                <div id="bdiv<?php echo $photo_id; ?>" style="padding-top: 8px;padding-bottom: 15px;padding-right: 2px !important;padding-left: 2px !important"><p align="center"> 
<?php if( $category=="home_tiles" || $category=="our_clients"  || $category=="join_us_tile" || $category=="learning_tile" || $category=="home_about" || $category=="blog" || $category=="slider" || $category=="yeb"|| $category=="yib" || $category=="our_mentors" || $category=="consultancy"|| $category=="vegetables"|| $category=="camps"|| $category=="africa_print"|| $category=="jewery"|| $category=="partners"){ ?>
                <!--a href="#" onClick="replace_image('<?php echo $photo_id;?>','<?php echo $category;?>')">Change Photo</a--> | 
<?php } ?>
                  <a href="#" onClick="replace_image('<?php echo $photo_id;?>','<?php echo $category;?>')" style="color: #5f5b55">Change Photo</a> | 
                <a href="#" onClick="edit_image_content('<?php echo $photo_id;?>','<?php echo $category;?>')" style="color: #5f5b55">Edit Content</a>  | 
                <a href="#" onClick="delete_content('<?php echo $photo_id;?>')" style="color: #5f5b55">Delete</a></p></div>
        <p align="center" style="text-align: justify;padding-left: 10px;padding-right: 10px;color: #5f5b55"><?php echo $val['title'];  ?></p>
        <p style="text-align: justify;padding-left: 10px !important;padding-right: 10px !important;padding-bottom: 10px;color: #5f5b55"><?php echo $val['comment'];  ?></p>
        <?php $video_id=$val['video_id'];
          if($video_id!="none" && $video_id !=""){
         ?>
         <p><?php echo $video_id; ?></p>
        <hr/>
        <?php } ?>
              </div>
            </div>
      <?php } ?>
      <style type="text/css">
      #overlay {
    position: fixed;
  visibility:hidden;
    top: 0;
    left: 0;
    width: 100%;
    height: 90%;
    background-color: #000;
    opacity: 1;
    z-index: 10000;
}
#image_change_div{
margin:auto;
width:100%;
height:100%;
margin-top:10px;
overflow:visible;
}
      </style>
      <style type="text/css">
  ::-webkit-scrollbar {
    width: 1px;
  }
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 1px rgba(0,0,0,0.9); 
    border-radius: 1px;
}
 
::-webkit-scrollbar-thumb {
    border-radius: 1px;
    -webkit-box-shadow: inset 0 0 1px rgba(0,0,0,0.9); 
}

  </style>
      <div id="overlay">
      <p style="text-align:center" onClick="close_overlay()"><a href="index.php">
      <i style="color:#ffffff; font-size:30px; margin-top:10px" class="fa fa-close"></i></a></p>
      <div id="image_change_div" style="background-color:#CCC"> </div>
      </div>
            <!-- /.col -->
           
          </div>
          <!-- /.row -->
          
          <!-- /.row -->
        </div>
            <!-- /.box-body -->
          </div>
      </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
    
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?php echo date("Y"); ?> .</strong> All rights reserved.
  </footer>

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery 2.2.0 -->
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
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
