<?Php
require('includes/autoloader.php');
$crud = new Crud();
$error = "";
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hostel Management System-Federal University of Agriculture Makurdi</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/fontawesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
</head>

<body>
  <?php include('header.php'); ?>
  <div id="about" class="about_section layout_padding">
    <div class="container shadow-lg">
      <div class="row card ">
        <div class="col-md-5 well card-body">


          <?php
          try {
            if(isset($_POST['surname'])){
            $surname = ucfirst($_POST['surname']);
            $firstname = ucfirst($_POST['fname']);
            $othernames = ucfirst($_POST['othernames']);
            $crud->insertApplicant($_POST, $_FILES);
            echo "<b>".$surname . ' ' . $firstname . ' ' . $othernames . ', </b>your hostel application is succcessful, login  to check approval!<br> <br/><a href="../login.php" class="btn btn-success">Login</a>';
          }} catch (Exception $se) {
            $error = $se->getMessage();
          }
          

          if ($error) { ?>
            <div class="alert alert-danger left-icon-alert" role="alert">
              <strong>Oh snap!</strong> <?php echo htmlentities($error);
                                      } ?>
            </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <?php include('../includes/footer.php');?>
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