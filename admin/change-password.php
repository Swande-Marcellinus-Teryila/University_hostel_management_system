
<?php
session_start();
//error_reporting(0);


if(strlen($_SESSION['admin_session1'])=="")
    {   
    header("Location:../login.php"); 
    }
    else{
   require('includes/autoloader.php');
include('../includes/connectionpage.php');
 $error='';
 $msg='';
 $crud= new Crud();


                               
 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
           <title>Hostel Management System |Dashboard</title>
      <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/toastr/toastr.min.css" media="screen" >
        <link rel="stylesheet" href="css/icheck/skins/line/blue.css" >
        <link rel="stylesheet" href="css/icheck/skins/line/red.css" >
        <link rel="stylesheet" href="css/icheck/skins/line/green.css" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
          <style>
        .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
        </style>
    </head>
    <body class="top-navbar-fixed" id="showBody" onclick="showBody()">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
   <?php include('includes/topbar.php');?> 
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">
<?php include('includes/leftbar.php');?>  

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                               
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                       
                                    </ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">

                             

                                <div class="row">
                                    <div class="col-md-12">
 
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Change password</h5>
                                                </div>
                                            </div>
                                        </div>
                                            <div class="col-md-10 col-lg-10 alert alert-success">
                                                <?Php    
                                                if($_SERVER['REQUEST_METHOD']=="POST"){

                                 $current_email=$_POST['current_email'];
                                $current_password=$_POST['current_password'];
                                $new_email=$_POST['new_email'];
                                $new_password=$_POST['new_password'];
                                
                                    $admin=new Admin();
                                  if($admin->is_Authenticated($current_email,$current_password)){
                                   $values=array($new_email,$new_password);
                                   $crud->update("UPDATE admin SET email=?,password=?",$values);
                                    $msg="password Changed successfully";
                                

                                    
                                    }else{
                                   $error="Invalid Email or Password"; 
                              }
                        }
                        ?>  
                                                <?php  if($error){ ?>
                                                    <div class="alert alert-danger">Invalid Email Or Password</div> <?php }?>
                                                     <?Php if($msg){ ?>
                                                    <div class="alert alert-success"><?Php echo $msg ?> </div> <?php }?>
                                    <form  method="post" >
                                    <div class=" col-md-5">
                                         <input  type="email"  placeholder="email" class="form-control" name="current_email"> 
                                     
                                        <input  type="password"  placeholder="current password" class="form-control" name="current_password"> 
                                     
                                        <input  type="email"  placeholder=" New Email" class="form-control" name="new_email">
                                         <input  type="password"  placeholder="New  password" class="form-control" name="new_password"> 
                                     


                                        <input  type="submit"  value="Change" name="Change" class="btn btn-success"> 
                                     </div>
                                    </form>

                                </div>
            
                                </div>
                                <!-- /.row -->

                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->

                    </div>
                    <!-- /.main-page -->

                    

                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /.main-wrapper -->

        <!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism/prism.js"></script>
        <script src="js/DataTables/datatables.min.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        <script>
            $(function($) {
                $('#example').DataTable();

                $('#example2').DataTable( {
                    "scrollY":        "300px",
                    "scrollCollapse": true,
                    "paging":         false
                } );

                $('#example3').DataTable();
            });
        </script>


    </body>
</html>
<?php } ?>

