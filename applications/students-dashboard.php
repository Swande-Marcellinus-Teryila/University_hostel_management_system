
<?php session_start();?>
<?php

if(!isset($_GET['matno'])){
}else{
require('includes/autoloader.php'); 
$crud= new Crud();
$matno=$_GET['matno'];
$results = $crud->displayAllSpecific("applicants",'matno',$matno);
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
     <?php include('header.php'); ?>
      <div id="about" class="about_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-10">
        			<table  class="display table table-striped table-bordered" cellspacing="0" width="100%" >
                                                
                                                            <?Php 
try {
     
   
  
     $i=0;
     if(is_array($results)){

      foreach ($results as $result) {
       
     ?>
<tr> 
    <td>

  <p>Status:</p><?php $status=$result['status'];
                   
           if($status=='1'){
           	?>
           	 
                <P><div class="alert alert-success">APPROVED
                </div>
            <?php }else{ ?>
            <div class="alert alert-danger"> PENDING</div>
             <?php } ?> </p>
              </td>

               <td>
<p><img class="img-responsive img_circle" src="profile_pictures/<?php echo htmlspecialchars($result['photo']);?>" style="height: 135px; width:135px; border-radius: 150px;" alt="Profile Picture."></p>
</td>

           </tr>

<tr>


<tr> 
    <td> <p>NAME <b><?php echo $result['surname']." ".$result['firstname']." ".$result['othernames'];?></b> </p>
    <p> <b>Level: 
      <?php echo htmlentities($result['level']);?> </b></p>
      <p><a>Sex:  <?php echo htmlspecialchars($result['sex']);?> </a></p>

     
   
      <p>Health Status:     <?php echo $result['health_status'];?></p>
        <p>Date of Birth:   <?php echo $result['dob'];?></p>
      <p>STATE:   <?php echo $result['state'];?></p>
       <P>BLOCK:  <b style="font-size:20px;">
        <?php  echo($crud->displayField('hostel_name','hostel_blocks','id',$result['hostel_id']));?>
        </b></P>
        <p><b>ROOM: <?php 
        echo($crud->displayField('room_number','hostel_rooms','id',$result['room_id']));?>  
        </b></p>
      </td>

      <td>

      <p>Email:    <?php echo $result['email'];?></p>
      <p>Address:   <?php echo $result['address'];?></p>
       <p>Phone No:   <?php echo $result['phone'];?></p>
		</td>
		 </tr>

                                                       
                   <?php }}} catch(Exception $e) {

    $error=$e->getMessage();
    
 }?>                                 
                                                    </tbody>
                                                </table>
                                               <P> <button class="btn btn-primary" onclick="window.print()">Print</button></P>

                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php include("footer.php");?>
     
<?php  }?>

           
        
    
     
  
      