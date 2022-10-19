
<?php 
include('includes/connectionpage.php'); 
require('includes/autoloader.php');
session_start();
                                  $error="";

                                  if($_SERVER['REQUEST_METHOD']=="POST"){

                                $email=$_POST['email'];
                                $password=$_POST['password'];
                                  try {
                                    $admin=new Admin();
                                  if($admin->is_AuthenticatedApplicant($email,$password)){
                                    $_SESSION['applicant_session']=$email;
                                  header("location:applications/applicant-dashboard.php");
                                  }else{
                                    throw new Exception("Invalid Username or Password");
                                    
                                    }

                                  } catch (Exception $e) {
                                   $error=$e->getMessage(); 
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
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/style.css">
      <link rel="stylesheet" href="../css/fontawesome.min.css">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
   </head>
   <body>
     <?php include('includes/header.php'); ?>
      <div id="about" class="about_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-5">
                 <a href="#" class="btn btn-default  btn-xs " data-toggle="modal"  data-target="#myModal">login</a>
    &nbsp;  &nbsp;  &nbsp;  &nbsp;  



<!--login -->
    
             
      <div  id="myModal"class="modal wow fadeInBig" role="dialog">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text text-primary">login your Account</h4>
      </div>
      <div class="modal-body"> 
          <div align="center">
            <figure>
              <img src="images/admin.png" height="150" width="150">
            </figure> 

        <form method="post">
  Email: <br>
<input type="text" name="email">
<br>PASSWORD: <br>
<input type="password" name="password">
<br><br>
<input type="submit" name="login" value="login" class="btn btn-primary btm-lg">
</form>
<div class="modal-footer"><button type="button" class="close" data-dismiss="modal">close</button>  
    
          </div> 
          </div>
          </div>
          </div> 
          </div>
          </div> 
          <!--end of login -->

                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php include('includes/footer.php');?>
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

           
        
    
     
  
      