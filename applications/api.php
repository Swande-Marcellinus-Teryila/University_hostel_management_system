<?php  require("includes/autoloader.php");

		$crud= new Crud();?> <?php

  if(isset($_POST['hostel_block_check']) && isset($_POST['sex']) && !empty($_POST['sex'])){
  	$sex =$_POST['sex'];
    try{ $results = $crud->displayAllSpecific("hostel_blocks","gender",$sex);
    		echo(' <option>-select-</option> ');
        foreach($results as $result){
    echo'<option value="'.$result['id'].'">'.$result['hostel_name'].'</option>';
  				
  					}
  				}catch(Exception $e){
  					echo 'sorry, something went wrong try again!';
  				}
			  	}
  	

/* checking whether  the applicant has registered befor */
  if(isset($_POST['matno']) && !empty($_POST['matno'])){

  /*this is to check whether a student has registered before*/
if($crud->exist('applicants','matno',$_POST["matno"])){
	echo '<script> alert("Sorry! You have applied for hostels already!");
  	location.assign("hostelapp.php");
  	 </script>';
} 
                                                                                               
}

  if(isset($_POST['checkavaliability']) && !empty($_POST['id'])){
  	try{
  	$id = $_POST['id'];
if($crud->exist('hostel_rooms','hostel_id',$id)){
	$results = $crud->displayAllSpecific('hostel_rooms','hostel_id',$id);
	echo 'Available Rooms
	<select name="room_id" class="form-control" id="room_number" onchange="">
	<option>-select-</option>';
	foreach ($results as $result) {
		if(!$crud->exist('applicants','room_id',$result['id'])){
		echo '<option value="'.$result['id'].'">Room  '.$result['room_number'].'</option>';
	}
}
echo '</select>';
}else{
	echo '<p class="text text-danger">No Rooms availible</p>';
}
}catch(Exception $e){
	echo '<p class="text text-danger">No Rooms availible</p>';
}
                                                                                               
}


   ?>
