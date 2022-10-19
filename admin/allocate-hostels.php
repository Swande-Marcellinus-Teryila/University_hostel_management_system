<?php
session_start();
//error_reporting(0);

if (strlen($_SESSION['admin_session1']) == "") {
    header("Location:../login.php");
} else {
    require('includes/autoloader.php');
    include('../includes/connectionpage.php');
    include('../includes/functions/functions.inc.php');
    $error = '';
    $msg = '';
    $crud = new Crud();
    $total = 0;

    if (isset($_POST['submit'])) {

        $gender =  $_POST['sex'];
        if ($gender == 'female') {

            $sql = "UPDATE applicants SET status='1' WHERE sex='Female'";
            $stmt = $con->prepare($sql);
            $success = $stmt->execute();
            $msg = 'Hostel allocation for all Female applicants is successfully';
        }





        if ($gender == 'male') {

            $sql = "UPDATE applicants SET status='1' WHERE sex='Male'";
            $stmt = $con->prepare($sql);
            $success = $stmt->execute();
            $msg = 'Hostel allocattion to all Male Applicants successfully';
        }
    }


    if (isset($_POST['disapprove'])) {

        $gender =  $_POST['sex'];
        if ($gender == 'female') {

            $sql = "UPDATE applicants SET status='0' WHERE sex='Female'";
            $stmt = $con->prepare($sql);
            $success = $stmt->execute();
            $msg = 'Hostel allocation is disapproved for all Female applicants successfully';
        }





        if ($gender == 'male') {

            $sql = "UPDATE applicants SET status='0' WHERE sex='Male'";
            $stmt = $con->prepare($sql);
            $success = $stmt->execute();
            $msg = 'Hostel allocation is disapproved for all Male applicants successfully';
        }
    }



?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Hostel Management System| Dashboard</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
        <link rel="stylesheet" href="css/toastr/toastr.min.css" media="screen">
        <link rel="stylesheet" href="css/icheck/skins/line/blue.css">
        <link rel="stylesheet" href="css/icheck/skins/line/red.css">
        <link rel="stylesheet" href="css/icheck/skins/line/green.css">
        <link rel="stylesheet" href="css/main.css" media="screen">
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>

    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
            <?php include('includes/topbar.php'); ?>
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">

                    <!-- ========== LEFT SIDEBAR ========== -->
                    <?php include('includes/leftbar.php'); ?>
                    <!-- /.left-sidebar -->

                    <div class="main-page">

                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Aprrove/Disparove Applicants </h2>

                                </div>

                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>

                                        <li class="active">Aprrove/Disparove Applicants</li>
                                    </ul>
                                </div>

                            </div>
                            <!-- /.row -->
                        </div>
                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-md-1 col-sm-1 col-lg-1">&nbsp;</div>
                                <div class="col-md-11">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <div class="panel-title ">
                                                <h5>Aprrove/Disparove Applicants</h5>
                                            </div>
                                        </div>
                                        <div class="panel-body  w">
                                            <?php if ($msg) { ?>
                                                <div class="alert alert-success left-icon-alert" role="alert">
                                                    <strong></strong><?php echo htmlentities($msg); ?>
                                                </div><?php } else if ($error) { ?>
                                                <div class="alert alert-danger left-icon-alert" role="alert">
                                                    <strong>Oops! </strong> <?php echo htmlentities($error);
                                                                        } ?>
                                                </div>





                                                <form class="form-horizontal " method="POST" enctype="multipart/form-data">
                                                    <table class="table  table-responsive">


                                                        <td width="80%">



                                                            <div class="form-group">
                                                                <div class="col-sm-12 input-group margin-bottom-sm">
                                                                    <span class="input-group-addon">SELECT HOSTELS<i class="fa-user fa fa-fw"></i></span>
                                                                    <select name="sex" class="form-control">
                                                                        <option value="male">MALE HOSTELS</option>
                                                                        <option value="female">FEMALE HOSTELS</option>
                                                                    </select>
                                                                </div>
                                                            </div>


                                                        </td>


                                                        <div class="form-group">
                                                            <div class="col-sm-offset-10 col-sm-10">
                                                                <div class="col-sm-10">
                                                                    <input type="submit" name="submit" value="Approve All" class="btn btn-primary"><Br>
                                                                    <input type="submit" name="disapprove" value="Disapprove all" class="btn btn-danger">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </td>
                                                        </tr>
                                                    </table>

                                                </form>


                                        </div>
                                    </div>
                                    <!-- /.content-container -->
                                </div>
                                <!-- /.content-wrapper -->

                            </div>
                        </div>

                        <!-- /.main-wrapper -->
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
                                $(".js-states").select2();
                                $(".js-states-limit").select2({
                                    maximumSelectionLength: 2
                                });
                                $(".js-states-hide").select2({
                                    minimumResultsForSearch: Infinity
                                });
                            });
                        </script>
    </body>

    </html>
<?PHP } ?>