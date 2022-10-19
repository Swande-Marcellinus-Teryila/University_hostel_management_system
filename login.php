
<?php
 require("includes/autoloader.php");
  $error=""; 
   $admin=new Auth();

                            try {
                                   if($_SERVER['REQUEST_METHOD']=="POST"){
                                    session_start();
                                  $admin->is_AuthenticatedApplicant($_POST);
                                    
                                  }} catch (Exception $e) {
                                   $error=$e->getMessage(); 
                              }
                            
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>hostel application -student login</title>
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
               
                <div class="col-lg-9">
                <div><i class="fa fa-user-circle fa-7x" aria-hidden="true"></i>
                                      <h1>Student Login</h1></div> <br>
                  <?php if($error){?> 
                    <div class="alert alert-danger"> <?php echo $error; ?></div>
                  <?php } ?>
                  
                            <form method="post" class="form-group">
                      <div class="col-md-12">
                    <input type="text" name="matno" placeholder="Matric No" class="form-control">
                  </div>
                    <div class="col-md-3 col-sm-3" style="margin-top:10px">
                    <input type="submit" name="login" value="LOGIN" class="btn btn-success btn-xlg form-control">
                  </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
      <?php include('footer.php');?>
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

           
        
    
     
  
      