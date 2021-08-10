<?php

  include("../../connect.php");
  if(!function_exists("clean_data")){
  include("../../security.php");
  }
     //$photo_id = $_REQUEST['photo_id'];
     //mysql_query("DELETE FROM photo WHERE photo_id = '$photo_id'") ;


?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="css/ionicons.min.css">
   <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script type="text/javascript" src="whizzywig.js"></script>
  <style type="text/css">
    .form-control{
      border-radius: 5px;
      margin: 5px;
    }
  </style>
</head>
<body onload="whizzywig()">
<div class="col-md-6 col-md-offset-3" style="background: #eee;border-radius: 10px;padding-top: 20px;margin-top: 20px;padding-bottom: 20px">
   <?php      
              $id = $_REQUEST['id'];
              $sel= mysql_query("select * from shop_products WHERE id = '$id'")or die(mysql_error());
       while($val=mysql_fetch_array($sel)){

        ?>

<form method="post" role="form" enctype="multipart/form-data" action="edit_product.php">
  
  <div class="col-md-12" >
  <input type="text" name="product_name"   placeholder="Product Name" maxlength="100" class="form-control" value="<?php echo $val['product_name'];  ?>" />
  </div>
   <div class="col-md-12" >
   
  <input class="form-control" type="text" name="product_description" maxlength="100"  placeholder="Product Description" value="<?php echo $val['product_desc'];  ?>">

  </div> 
  
    <div class="col-md-12" >
  <input type="text" name="product_code"   placeholder="Product Code" maxlength="100" class="form-control" value="<?php echo $val['product_code'];  ?>" />
  </div>

  <div class="col-md-12" >
  <input class="form-control" type="text" name="product_price" maxlength="100"  placeholder="Product Price" 
  value="<?php echo $val['product_price'];  ?>">
  </div> 
    <div class="col-md-12" >
  <input type="text" name="category"   placeholder="Category" maxlength="100" class="form-control" value="<?php echo $val['categories'];  ?>" />
  </div>

  <div class="col-md-12" >
  <input class="form-control" type="text" name="sub_category" maxlength="100"  placeholder="Sub category" value="<?php echo $val['sub_categories'];  ?>">
  </div> 
  <div class="col-md-12" >
  <input class="form-control" type="hidden" name="id" maxlength="100"  placeholder="Sub category" value="<?php echo $val['id'];  ?>">
  </div> 

  <div class="col-md-12" >
  <input type="file" name="product_image"   value="" style="padding-left: 10px;padding-top: 8px;padding-bottom: 10px" />
  </div> 
  <div class="col-md-12" >
     <input type="hidden" name="photo_id"   value="<?php echo $photo_id ?>" class="btn btn-success"/>
     <button id="send" type="submit" name="submit" class="btn btn-success form-control">Submit</button>
  </div> 

  
 
</form>

<?php
}
?>

</div>

<!--<script type="text/javascript" src="nicEdit.js"></script>
<script type="text/javascript">
    bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>-->

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