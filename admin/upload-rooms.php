<?php
session_start();
//error_reporting(0);
$msg="";
$error = "";
$password='';
require_once('includes/autoloader.php');
$auth = new Auth();
try{
$password = $auth->displayField('password','admin','password',$_SESSION['admin_session1']);
}
catch(Exception $e){

}

if(!isset($_SESSION['admin_session1']) || $_SESSION['admin_session1']!=$password){
    header("location:../index.php");
}else{
    if(($_SERVER["REQUEST_METHOD"]=="POST") && isset($_POST['submit'])){
        try {
            $msg = $auth->insertRoom($_POST);
        } catch (\Throwable $th) {
            $error = $th->getMessage();
        }
    }
   ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>add-hostel room</title>
        <link rel="stylesheet" href="css/bootstrap.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" >
      <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
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
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
            <?php include('includes/topbar.php');?>   
          <!-----End Top bar-->
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">

<!-- ========== LEFT SIDEBAR ========== -->
<?php include('includes/leftbar.php');?>                   
 <!-- /.left-sidebar -->

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Add Hostels Rooms</h2>
                                </div>
                                
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                                        <li><a href="#">Hostels</a></li>
                                        <li class="active">Add Hostel Rooms</li>
                                    </ul>
                                </div>
                               
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->

        <section class="section">
            <div class="container-fluid">

                

                

                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <?php if($msg){?>
<div class="alert alert-success left-icon-alert" role="alert">
 <strong></strong><?php echo htmlentities($msg); ?>
 </div><?php } 
else if($error){?>
    <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oops! </strong> <?php echo htmlentities($error);} ?>
                                        </div> 
                                     
                        <div class="panel">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <h5>Add Hostel Room</h5>
                                </div>
                            </div>
                                <div  id="showMessage">&nbsp;</div>

                                <div class="panel-body" >
                                    <form method="post" enctype="multipart/form-data">
                                            <div class="form-group has-success">
                                            <label for="success" class="control-label">Select Hostel</label>
                                            <div class="">
                                               <select name="hostel_id" class="form-control">
                                               <?Php
                                                try{ $hostels = $auth->displayAll('hostel_blocks');
                                                    foreach($hostels as $hostel){     
                                               ?>
                                                <option value="<?=$hostel['id']?>"><?=$hostel['hostel_name']?></option>
                                                    <?php }}catch(Exception $e){

                                                    }?>
                                               </select>
                                            </div>
                                        </div>
                                        <div class="form-group has-success">
                                            <label for="success" class="control-label">Select Room Addition Method</label>
                                            <div class="">
                                           <select onchange="checkType(this.value)" class="form-control" name="additionmethod">
                                               <option>-Select Method-</option>
                                               <option value="single">Single Input Method</option>
                                               <option value="auto">Auto Generate</option>
                                           </select>
                                           <div class="auto-gen-note text text-warning">
                                               <p class=" "> <i class=" text text-danger fa fa-warning"></i>
                                                NOTE:<br>
                                                By Selecting this method, it means you have not added no room for the selected block
                                            </p>
                                           </div>
                                               
                                            </div>
                                        </div>
                                        <div class="form-group has-success" id="single">
                                            <label for="success" class="control-label">Room Number</label>
                                            <div class="">
                                               <input type="text" name="room_number" class="form-control">
                                               
                                            </div>
                                        </div>
                                        
                                            <!--div class="form-group has-success" id="range">
                                            <label for="success" class="control-label">Room Number</label>
                                            <div class="">
                                              <span>
                                               <input type="number" name="start" placeholder="Start From">
                                               <input type="number" name="stop" placeholder="Stop At"> </span>
                                               
                                            </div>
                                        </div-->

                                           <div class="">
                                                <button name="submit"  class="btn btn-success btn-labeled" id="submit">Submit<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                        </div>
                                    </form>

                            </div>
                        </div>
                        <!-- /.col-md-8 col-md-offset-2 -->
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
<script src="js/jquery-ui/jquery-ui.min.js"></script>
<script src="js/bootstrap/bootstrap.min.js"></script>
<script src="js/pace/pace.min.js"></script>
<script src="js/lobipanel/lobipanel.min.js"></script>
<script src="js/iscroll/iscroll.js"></script>

<!-- ========== PAGE JS FILES ========== -->
<script src="js/prism/prism.js"></script>

<!-- ========== THEME JS ========== --> <div on></div>
<script src="js/main.js"></script>
<script src="js/customjs.js"></script>
<script src="js/customformjs.js"></script>
<script>
    $("#range").hide();
    $("#single").hide();
    $(".auto-gen-note").hide();
    function checkType(type){
        if(type=="single"){
            $("#range").hide();
            $("#single").show(500);
               $("#submit").html('Submit<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span>');
            $(".auto-gen-note").hide();
        }
        else if(type=="range"){
             $("#single").hide();
             $(".auto-gen-note").hide();
                $("#submit").html('Generate<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span>');
             $("#range").show(500);
        }
          else if(type=="auto"){
            $("#single").hide();
            $("#range").hide();
            $("#submit").html('Generate<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span>');
            $(".auto-gen-note").show(500);
        }

    }
</script>


<!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
</body>
</html>
<?php }?>