<?php 
			/**
			 * 
			 */
	include_once "config.php";

class Crud extends Config
{

	function __construct()
	{
		parent::__construct();
	}

	public function displayAll($table)
	{
		$query = "SELECT * FROM {$table}";
		$result =  $this->con->prepare($query);
		 $result->execute();
		if ($result->rowCount() > 0) {
			$data = $result->fetchAll();
			return $data;
		}else{
			return "No found records";
		}
	}

	public function getTotal($table)
	{
		$query = "SELECT * FROM {$table}";
		$result =  $this->con->prepare($query);
		$result->execute();
		return $result->rowCount();
	}

public function getTotalSpicific($table,$column,$item)
	{
		$query = "SELECT * FROM {$table} WHERE {$column}=?";
		$result =  $this->con->prepare($query);
		$result->execute([$item]);
		return $result->rowCount();
	}

	public function getTotalSpicific2($table,$column1,$column2,$item1,$item2)
	{
		$query = "SELECT * FROM {$table} WHERE {$column1}=?";
		$result =  $this->con->prepare($query);
		$result->execute([$item1,$item2]);
		return $result->rowCount();
	}

	public function displayAllWithOrder($table,$orderValue,$orderType)
	{
		$query = "SELECT * FROM {$table} ORDER BY {$orderValue} {$orderType}";
		$result =  $this->con->prepare($query);
		 $result->execute();
		if ($result->rowCount() > 0) {
			$data = array();
			$data = $result->fetchAll();
			return $data;
		}else{
			return 0;
		}
	}


	
	public function displayAllSpecific($table,$value,$item)
	{
		$query = "SELECT * FROM {$table} WHERE $value=? ";
		$result =  $this->con->prepare($query);
		 $result->execute([$item]);
		if ($result->rowCount() > 0) {
			$data = array();
			$data = $result->fetchAll();
			return $data;
		}else{
			throw new Exception("Record not found");
			
		}
	}

	public function displayAllSpecific2($table,$column1,$column2,$item1,$item2)
	{
		$query = "SELECT * FROM {$table} WHERE {$column1}=? AND {$column2}=? ";
		$result =  $this->con->prepare($query);
		 $result->execute([$item1,$item2]);
		if ($result->rowCount() > 0) {
			$data = $result->fetchAll();
			return $data;
		}else{
			throw new Exception("Record not found");
			
		}
	}

	public function displayAllSpecific3($table,$column1,$column2,$column3,$item1,$item2,$item3)
	{
		$query = "SELECT * FROM {$table} WHERE {$column1}=? AND {$column2}=? And {$column3}=?";
		$result =  $this->con->prepare($query);
		 $result->execute([$item1,$item2,$item3]);
		if ($result->rowCount() > 0){ 
			$data = $result->fetchAll();
			return $data;
		}else{
			throw new Exception("Record not found");
			
		}
	}

	public function displayAllSpecificWithOrder($table,$column,$item,$orderColumn,$orderType)
	{
		$query = "SELECT * FROM {$table} WHERE {$column}=? ORDER BY {$orderColumn} {$orderType}";
		$result =  $this->con->prepare($query); 
		$result->execute([$item]);
		if ($result->rowCount() > 0) {
			$data = $result->fetchAll();
			return $data;
		}
		else
		{
			throw new Exception("Record not found");
		}
	}





	public function displayAllSpecificWithOrderWithLimit($table,$column1,$item,$orderColumn,$orderType,$limit)
	{
		$query = "SELECT * FROM {$table} WHERE {$column1}=? ORDER BY {$orderColumn} {$orderType} LIMIT {$limit}";
		$result =  $this->con->prepare($query); 
		$result->execute([$item]);
		if ($result->rowCount() > 0) {
			$data = $result->fetchAll();
			return $data;
		}
		else
		{
			throw new Exception("Record not found");
		}
	}

	public function displayAllSpecificWithOrderWithLimit2($table,$column1,$column2,$item1,$item2,$orderColumn,$orderType,$limit)
	{
		$query = "SELECT * FROM {$table} WHERE {$column1}=? AND {$column2}=? ORDER BY {$orderColumn} {$orderType} LIMIT {$limit}";
		$result =  $this->con->prepare($query); 
		$result->execute([$item1,$item2]);
		if ($result->rowCount() > 0) {
			$data = $result->fetchAll();
			return $data;
		}
		else
		{
			throw new Exception("Record not found");
		}
	}


	public function displayWithLimit($table,$limit)
	{
		$query = "SELECT * FROM {table} limit {$limit}";
		$result =  $this->con->prepare($query);
		 $result->execute();
		if ($result->rowCount() > 0) {
			$data = $result->fetchAll();
			return $data;
		}
		else
		{
			return "No found records";
		}
	}

	public function displayAllWithStatusOk($table,$orderValue,$orderType)
	{
		$query = "SELECT * FROM {$table} Where status1='1' ORDER BY {$orderValue} {$orderType}";
		$result =  $this->con->prepare($query);
		 $result->execute();
		if ($result->rowCount() > 0) {
			$data = $result->fetchAll();
			return $data;
		}else{
			return 0;
		}
	} 

		public function displayField($column,$table,$id,$item)
	{
		$query = "SELECT {$column} FROM {$table} WHERE {$id} =? ";
		$result =  $this->con->prepare($query);
		 $result->execute([$item]);
		if ($result->rowCount() > 0) {
			$data = $result->fetch(PDO::FETCH_ASSOC);
			return $data[$column];
		}else{
			throw new Exception("Record not found");	
		}
	}
/*
	
	public function displayFullJoin($table1,$table2,$id1, $id2)
	{
		$query = "SELECT *FROM $table1 jOIN $table2 ON {$table1.$id1}={$table2.$id2};
		$result =  $this->con->prepare($query);
		 $result->execute();
		if ($result->rowCount() > 0) {
			$data = $result->fetchAll();
			return $data;
		}
		else
		{
			return "No found records";
		}
	}
 */
//Search 
	public function displaySearch($value)
	{
	//Search box value assigning to $Name variable.
		$Name = $this->cleanse($value);
		$query = "SELECT * FROM product WHERE pid LIKE '%$Name%'";
		$result =  $this->con->prepare($query); $result->execute();
		if ($result->rowCount() > 0) {
			$row = $result->fetch(PDO::FETCH_ASSOC);
			return $row;
		}else{
			return false;
		}
	}
	/* insert */

	public function insertAdmin($username,$password,$userlevel)
	{		  
	
// $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
// $username = $_POST['username'];

		$query="INSERT INTO admin  (username, password, user_level) VALUES(?,?,?)";
		$sql = $this->con->prepare($query);
	
		if ($sql->execute([$username,$password,$userlevel])) {

			return 'Admin has been created successfully';
			}
			throw new Exception("sorry, something went wrong,Try Again!");
		
	}	
	


public function insertApplicant($post,$file)
	{		  
$sex =$_POST['sex'];
$hostel_id = $_POST['hostel_id'];
$room_id = $_POST['room_id'];
$matno = $_POST['matno'];
$level = $this->cleanse($_POST['level']);
$surname = $this->cleanse(ucfirst($_POST['surname']));
$firstname = $this->cleanse(ucfirst($_POST['fname']));
$othernames = $this->cleanse(ucfirst($_POST['othernames']));
$dob = $this->cleanse($_POST['dob']);
$next_of_kin = $this->cleanse(ucfirst($_POST['next_of_kin']));
$next_of_kin_phone = $this->cleanse($_POST['next_of_kin_phone']);
$state = $this->cleanse(ucfirst($_POST['state']));
$health_status = $this->cleanse(ucfirst($_POST['health_info']));
$email = $this->isValidEmail($_POST['email']);
$phone =$this->cleanse($_POST['phone']);
$address = $this->cleanse(ucfirst($_POST['address']));
$status=0;
 if($this->exist('applicants','matno',$matno)){
 	throw new Exception("You have already applied for hostels!");
 	
 }
       	$temp = $this->validatePhoto('photo',(1024*1024*4));
        $folder = "profile_pictures/" ;  
        $imgv1 = $_FILES['photo']['name']; 
        $photo = uniqid().rand(11111111111111,22222222222222).$imgv1;  
        move_uploaded_file($temp,$folder.$photo);
 $data = array($hostel_id,$room_id,$matno,$surname,$firstname,$othernames,$level,$sex,$health_status,$dob,$state,$next_of_kin,$next_of_kin_phone,$email,$address,$phone,$photo,$status
             			
            );
		$query="INSERT INTO applicants (hostel_id, room_id, matno, surname, firstname, othernames, level, sex, health_status, dob, state, next_of_kin, next_of_kin_phone, email, address, phone, photo, status) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$sql = $this->con->prepare($query);
	
		if ($sql->execute($data)) {

			return 'Hostel application successfully';
			}
			throw new Exception("sorry, something went wrong,Try Again!");
		
	}	
	


		public function insertHostel($post, $file)
	{	
		$hostel_name = $this->cleanse(ucfirst($_POST['hostel_name']));
		$num_of_rooms = $_POST['no_of_rooms'];
		$locaton = $this->cleanse(ucfirst($_POST['location']));
		$gender = $this->cleanse(ucfirst($_POST['gender']));
		 if($this->exist2('hostel_blocks','hostel_name','location',$hostel_name,$locaton)){
			 throw new Exception("this Hostel block  is already added for ".$locaton);
			 
		 }
		    $temp = $this->validatePhoto('hostel_img',(1024*1024*1000));
			$folder = "../hostel_img/" ;  
			$imgv1 = $_FILES['hostel_img']['name'];
			  if(empty($imgv1)){
				  throw new Exception("Please Select Hostel Photo");
				  
			  }
			$hostel_img = uniqid().rand(11111111111111,22222222222222).$imgv1;  
			move_uploaded_file($temp,$folder.$hostel_img);
			
			$query="INSERT INTO hostel_blocks (hostel_name, no_of_rooms, location, photo, gender) VALUES(?,?,?,?,?)";
			$sql = $this->con->prepare($query);
			$exec = $sql->execute([$hostel_name, $num_of_rooms, $locaton, $hostel_img,$gender]);
	if($exec)
			{
				return 'Hostel  has been added successfully';
			}
				throw new Exception("sorry, something went wrong, hostel not added");		
		
	}	

	public function insertRoom($post)
	{	
		$hostel_id = $this->cleanse($_POST['hostel_id']);
		$room_number = $_POST['room_number'];
		$addition_method = $_POST['additionmethod'];
		$total_number_of_rooms = $this->displayField('no_of_rooms','hostel_blocks','id',$hostel_id);
		if($addition_method==""){
			throw new Exception("Please select room Addtion Method");
			
		}
		if($addition_method=="auto"){
			if($this->exist('hostel_rooms','hostel_id',$hostel_id)){
				throw new Exception("sorry, hostel rooms could not be generated for the selected block,rooms have been added for the block before, try other methods");	
			}
			for ($i=1; $i<=$total_number_of_rooms; $i++) { 			// code...
						$room_number =$i;
						if($room_number > $total_number_of_rooms){
							throw new Exception("sorry the number of room entered exceed total number of rooms for this block Room number must not exceed ".$total_number_of_rooms);
							
						}
						if($this->exist2('hostel_rooms','room_number','hostel_id',$room_number,$hostel_id)){
							throw new Exception("Room ".$room_number." already exist for the selected block");
							
						}
						$total_number_of_rooms = $this->displayField('no_of_rooms','hostel_blocks','id',$hostel_id);
					
							$query="INSERT INTO hostel_rooms (hostel_id, room_number, status) VALUES(?,?,?)";
							$sql = $this->con->prepare($query);
							$exec = $sql->execute([$hostel_id, $room_number,'1']);
							}
					if($exec)
							{ $rooms_gen = $i-1;
								return 'successfully generated '.$rooms_gen.' rooms';
							}
						
					}


					/* singel addition method */
					if($addition_method=="single"){
		
						if($room_number > $total_number_of_rooms){
							throw new Exception("sorry the number of room entered exceed total number of rooms for this block,  Room number must not exceed ".$total_number_of_rooms);
							
						}
						if($this->exist2('hostel_rooms','room_number','hostel_id',$room_number,$hostel_id)){
							throw new Exception("Room ".$room_number." already exist for the selected block");
							
						}
						$total_number_of_rooms = $this->displayField('no_of_rooms','hostel_blocks','id',$hostel_id);
					
							$query="INSERT INTO hostel_rooms (hostel_id, room_number, status) VALUES(?,?,?)";
							$sql = $this->con->prepare($query);
							$exec = $sql->execute([$hostel_id, $room_number,'1']);
							
					if($exec)
							{ 
								return "Room number ".$room_number. " successfully added";
							}
						
					}


			
				throw new Exception("sorry, something went wrong, hostel room not added");		
		
	}

	
	
	/* end of insertion*/

	/* update*/

		public function update($query,$data){
 		
 		$stmt = $this->con->prepare($query);
 		$stmt->execute($data);
		}

		public function updateSpecific($table,$updatecolumn,$column_id,$id,$item){
 			$query = "UPDATE  hostel_blocks SET hostel_name=?, no_of_rooms=?, location=?, photo=?, gender WHERE {$column_id}=?";
 		$stmt = $this->con->prepare($query);
 		if($stmt->execute([$item,$id])){
 			return true;
 		}
 		throw new Exception("sorry,Something went wrong, Try again!");
 		
		}

		public function updateAdmin1($post){
			$username =$this->cleanse($_POST['username']);
			$password = password_hash(strip_tags($_POST['password']), PASSWORD_DEFAULT);
			$time = time();
 			$query = "UPDATE  admin SET username=?, password=?,date_updated=? WHERE User_level=1";
 		$stmt = $this->con->prepare($query);
 		if($stmt->execute([$username,])){
 			return true;
 		}
 		throw new Exception("sorry,Something went wrong, Try again!");
 		
		}


		public function updateHostel($post,$files){
 			$query = "UPDATE hostel_blocks SET hostel_name = ?, no_of_rooms = ?, location=?, photo=?, gender=? WHERE id=?";
 		$hostel_name = $this->cleanse(ucfirst($_POST['hostel_name']));
		$num_of_rooms = $_POST['no_of_rooms'];
		$locaton = $this->cleanse(ucfirst($_POST['location']));
		$gender = $this->cleanse(ucfirst($_POST['gender']));
		$img =$_POST['img'];
		$id = $_POST['id'];
		$hostel_img="";
		/*checking wether the imagte is changed*/ 
			if($this->exist2('hostel_blocks ','photo','id',$img,$id) && empty($_FILES['hostel_img']['name'])){
				$hostel_img=$img; 
			
			}
			else{ 
		 $temp = $this->validatePhoto('hostel_img',(1024*1024*1000));
			$folder = "../hostel_img/" ;  
			$imgv1 = $_FILES['hostel_img']['name'];
			  if(empty($imgv1)){
				  throw new Exception("Please Select Hostel Photo");
			  }
			$hostel_img = uniqid().rand(11111111111111,22222222222222).$imgv1; 

			move_uploaded_file($temp,$folder.$hostel_img);
		}
 		$stmt = $this->con->prepare($query);
 		if($stmt->execute([$hostel_name,$num_of_rooms,$locaton,$hostel_img,$gender,$id])){
 			return 'Hostel edited successfully';
 		}
 		throw new Exception("sorry,Something went wrong, Try again!");
 	}
 		

	
	/*end of update */

	/*  beginning delete*/

	public function deleteSpecific($table,$column,$item){
		$query = "DELETE FROM {$table} Where {$column}=?";
		$sql = $this->con->prepare($query);
	
		if ($sql->execute([$item])) {
			return true;			
		}
			throw new Exception("sorry, something went wrong, Try again!");

	}
	/* end of deletion*/
	
	

	public function cleanse($str)
	{
   #$Data = preg_replace('/[^A-Za-z0-9_-]/', '', $Data); /** Allow Letters/Numbers and _ and - Only */
		$str = htmlentities($str, ENT_QUOTES, 'UTF-8'); /** Add Html Protection */
		$str = stripslashes($str); /** Add Strip Slashes Protection */
		if($str!=''){
			$str=trim($str);
			return $str;
		}
	}




	

	public function greeting()
	{
      //Here we define out main variables 
		$welcome_string="Welcome!"; 
		$numeric_date=date("G"); 

 //Start conditionals based on military time 
		if($numeric_date>=0&&$numeric_date<=11) 
			$welcome_string="Good Morning!,"; 
		else if($numeric_date>=12&&$numeric_date<=17) 
			$welcome_string="Good Afternoon!,"; 
		else if($numeric_date>=18&&$numeric_date<=23) 
			$welcome_string="Good Evening!,"; 

		return $welcome_string;

	}

	 public function exist($table, $column,$item):bool{
	 	$query = "SELECT * FROM {$table} WHERE {$column}=?";
		$result =  $this->con->prepare($query);
		$result->execute([$item]);
		if ($result->rowCount() > 0) {
			return true;
		}else{
			return false;
		}

	 }


	 public function exist2($table, $column1,$column2,$item1,$item2):bool{
	 	$query = "SELECT * FROM {$table} WHERE {$column1}=? AND {$column2}=?";
		$result =  $this->con->prepare($query);
		$result->execute([$item1,$item2]);
		if ($result->rowCount() > 0) {
			return true;
		}else{
			return false;
		}

	 }




	 public function validatePhoto($file,$maxsize=(1024*1024*5))
	 {
		$mb=$maxsize/1024;
		$fname=$_FILES[$file]['name'];
		$size=$_FILES[$file]['size'];
		$temp=$_FILES[$file]['tmp_name'];
			$fileXtension=pathinfo($fname,PATHINFO_EXTENSION);
			if( $fileXtension!='jpg' && $fileXtension!='png')
			{
			throw new Exception("Invalid file format, png or jpg file type expected!");
			}
			elseif($size>$maxsize){
	throw new Exception(floor($size/1024)." File size too large, file size must be less or equal to ".floor($mb). " MB");


			}else
			{

			return $temp;
			
			}
}

						 public function validateFile($file,$maxsize=(1024*1024*5)){
							$mb=$maxsize/1024;
							$fname=$_FILES[$file]['name'];
							$size=$_FILES[$file]['size'];
							$temp=$_FILES[$file]['tmp_name'];
							  $fileXtension=pathinfo($fname,PATHINFO_EXTENSION);
							 if( $fileXtension!='mp3' && $fileXtension!='wav') {
								 throw new Exception("Invalid file format, mp3 or wav file type expected!");
							 }
							 elseif($size>$maxsize){
						throw new Exception(floor($size/1024)." File size too large, file size must be less or equal to ".floor($mb). " MB");
				
	
							 }else{
	
							  return $temp;
							 
							 }					 

										 }
        public function get_time_ago( $time )
{
    $time_difference = time() - $time;

    if( $time_difference < 1 ) { return 'less than 1 second ago'; }
    $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
                30 * 24 * 60 * 60       =>  'month',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hour',
                60                      =>  'minute',
                1                       =>  'second'
    );

    foreach( $condition as $secs => $str )
    {
        $d = $time_difference / $secs;

        if( $d >= 1 )
        {
            $t = round( $d );
            return 'about ' . $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
        }
    }
}




	public function encrypt($password){
		$hash = password_hash($password, PASSWORD_DEFAULT);
		return $hash;
	}
	public function decrypt($password,$hashed_pswd){
		$raw_pswd = password_verify($password, $hashed_pswd);
		return $raw_pswd;	
	}
	public function isValidEmail($email){
		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			throw new Exception("Invalid Email,please check and try again!");
		}else{
			return $email;
		}
	}
}


?>