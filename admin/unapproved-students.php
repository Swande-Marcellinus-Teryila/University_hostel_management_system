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
   ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Aprroved Apllicatns| hostel management Jostum</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/toastr/toastr.min.css" media="screen" >
        <link rel="stylesheet" href="css/icheck/skins/line/blue.css" >
        <link rel="stylesheet" href="css/icheck/skins/line/red.css" >
        <link rel="stylesheet" href="css/icheck/skins/line/green.css" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <link  rel="stylesheet" href="css/style.css">
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
                                <div class="col-md-6">
                                    <h2 class="title">manage unapproved Applicants</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                                        <li><a href="all-applicants.php"><i class="fa fa-users"></i> Applicants</a></li>
                                        <li class="active">manage unapproved students</li>
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
                                                    <h5>Manage unapproved Applicants</h5>
                                                </div>
                                            </div>
                                          

                               
                                            <div class="panel-body p-20">

              <div class="" role="alert" id="showMessage">
                <?php if($msg){?>
<div class="alert alert-success left-icon-alert" role="alert">
 <strong>Well done!</strong><?php echo htmlentities($msg); ?>
 </div><?php } 
else if($error){?>
    <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error);} ?>
                                        </div> 


 </div>                 <div class=" col-md-12 col-md-12 col-sm-12" style="overflow:scroll; " >
                       

                    
                        <br/><table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            
                                                            <th>S/N</th>
                                                            <th>Name</th>
                                                             <th>Level</th>
                                                             <th>Sex</th>
                                                              <th>Health Status</th>
                                                             <th>DOB</th>
                                                            <th>State</th>
                                                            <th>Email</th>
                                                            <th>Address</th>
                                                            <th>Phone</th>
                                                            <th> Photo</th>
                                                            <th>Status</th>
                                                            <th>Action</th>

                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>S/N</th>
                                                            <th>Name</th>
                                                             <th>Level</th>
                                                             <th>Sex</th>
                                                              <th>Health Status</th>
                                                             <th>DOB</th>
                                                            <th>State</th>
                                                            <th>Email</th>
                                                            <th>Address</th>
                                                            <th>Phone</th>
                                                            <th>Photo</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
<tr>
     <?Php 
try {
     
    $results=$auth->displayAllSpecific('applicants','status','0');
  
     $i=0;
     if(is_array($results)){

      foreach ($results as $result) {
        $i+=1;
     ?>
        
 <td><?Php echo $i?></td> 
                                                        

                                                            <td><?php echo $result['surname']." ".$result['firstname']." ".$result['othernames'];?></td>
                                                              <td><?php echo htmlentities($result['level']);?></td>
                                                             <td><?php echo htmlspecialchars($result['sex']);?></td>

                                                          
                                                              <td><?php echo $result['health_status'];?></td>
                                                                <td><?php echo $result['dob'];?></td>
                                                              <td><?php echo $result['state'];?></td>
                                                              <td><?php echo $result['email'];?></td>
                                                              <td><?php echo $result['address'];?></td>
                                                               <td><?php echo $result['phone'];?></td>
                                                       
                                                             <td><img src="../applications/profile_pictures/<?php echo $result['photo'];?>" class="img-responsive img-circle" hieght="35px" width="35px" alt="Profile Pic."></td>
                                                          <td> <?php $status=$result['status'];
                                                                           
                                                                   if($status=='0')
            { ?>
            <strong>
                <i class="fa fa-ban btn btn-danger" title="Approve Student"> Not Approved</i> </strong><?php } ?>
            </td>
                                                         <td>
                    <a href="unapproved-students.php"
                onclick="deactivate('1','<?php echo $result['matno'];?>')">
                <i class="fa fa-check btn btn-success " title="Approve Student">approve </i> </a>
                                                     
    <a href="unapproved-students.php" 
                onclick="deleteData('<?Php echo htmlentities($result['matno'])?>')">
                <i class="fa fa-trash btn btn-danger " title="Delete Record"></i> </a>
                                                     
                                                    
          
                                                    </td>
                                             
                </tr>
                <?php 
                                                          
                                 ?>
                                                       
                   <?php }}} catch(Exception $e) {

    $error=$e->getMessage();
    
 }?>                                 
                                                    </tbody>
                                                </table>

                                         </div>
                                                <!-- /.col-md-12 -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-6 -->

                                                               
                                                </div>
                                                <!-- /.col-md-12 -->
                                            </div>
                                        </div>
                                        <!-- /.panel -->
                                    </div>
                                    <!-- /.col-md-6 -->

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
        <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>

<!-- ========== PAGE JS FILES ========== -->
<script src="../js/prism/prism.js"></script>

<!-- ========== THEME JS ========== --> 
<script src="js/main.js"></script>
<script src="js/customjs.js"></script>
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

       <script>
         


            function deactivate(newData,id){
    var result=confirm("Are you sure you want to approve Applicant?");
       if(result==true){
      
            $(document).ajaxStart(function(){
        $("#showMessage").html("<i class='fa fa-spinner fa-spin'></i>");
    })
             
             $.post("request_pages/update.php",{newData:newData,tableName:'applicants', column_name:'status',column_id:'matno',id:id},function(data,status){
           $("#showMessage").html(data);

        }); 
         } 
       
     }


function deleteData(id){
    let result=confirm("Are you sure you want to delete this record?");
    if(result==true){
             $.post("request_pages/delete-request.php",{id:id,tableName:"applicants", column_id:'matno'},function(data,status){
           //$("#showMessage").html(data);

     }); 
    }else{
       
    } 
} 
        
        </script>
    </body>
</html>
<?php } ?>

