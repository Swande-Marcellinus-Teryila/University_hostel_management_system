<?php
session_start();
require('includes/autoloader.php');
$error = "";
$admin = new Auth();

if ($_SERVER['REQUEST_METHOD'] == "POST") {

  $username = $_POST['username'];
  $password = $_POST['password'];
  

  try {

    $admin->is_AuthenticatedAdmin($_POST);
  } catch (Exception $e) {
    $error = $e->getMessage();
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hostel Management System</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/fontawesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
</head>

<body>
  <?php include('includes/header.php'); ?>
  <div id="about" class="about_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">&nbsp;</div>
        <div class="col-md-8">

          <div><i class="fa fa-user-circle fa-7x" aria-hidden="true"></i>
            <h1>Admin Login</h1>
          </div> <br>
          <!-- beginning of modal -->

          <?php if ($error) { ?>
            <div class="alert alert-danger"> <?php echo $error; ?></div>
          <?php } ?>
          <form method="post" class="form-group">

            <input type="text" name="username" placeholder="Username" class="form-control" autofocus="on"> <br>
            <input type="password" name="password" placeholder="password" class="form-control">
            <br>
            <input type="submit" name="login" value="login" class="btn btn-success btn-lg">
          </form>

          <!--end of login -->


        </div>
      </div>
    </div>
  </div>
  <?php include('footer.php'); ?>
  <script>
    /*health 
        
    $("#health").change(function(){ 
         let status=$("#health").val();
         if(status=='Not Physically impared'){
                   
             $("#challengespecification").val("NIL");
             //$("#challengespecification").hide(500);
         }else{
           $("#challengespecification").show(1000);
           $("#challengespecification").val("");
         }
    });   */
  </script>