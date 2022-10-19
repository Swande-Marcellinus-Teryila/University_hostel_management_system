<?php require("includes/autoloader.php");
    $crud = new Crud();
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Hostel application form</title>
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
               <div class="col-md-5">

                  <h2> <u style="color:lightgreen">APPLICATION GUIDLINES</u></h2>
               
                  <h3>Hostel Application Guildlines</h3>
                  <ul>
                  <li>1. After making payment proceed with your
                     <a href="applications/hostelapp.php">registration</a>
                  </li>
                  <li>2. Fill the form provided acurately </li>
                  <li>3. Note that you can't register twice </li>
                  <li>3. Select the availiable hostels and room that you like, confirm your details and press the reserve button</li>
                  </ul>
                  
               </div>
               <div class="col-md-6 offset-md-1 ">
                  <div class="full text_align_center alert alert-success" id="showMessage">
                  
<h3  style="color:navygreen">Hostel Application Form</h3>
 <form id="regForm"  class="main_form" action="appsuccess.php" method="POST" enctype="multipart/form-data">

<?Php if (isset($_GET['error'])){?>
<div class="alert alert-danger">
<?php echo $_GET['error'] ?>
</div><?php }?>
<div class="tab"> 
 <P class="fa fa-user-o">&nbsp;&nbsp;&nbsp;Sex</P>
  <p>
<select required id="sex" name="sex"  onchange="getHostelBlocks(this.value); this.className=''"  class="form-control">
 <option value="">-select-</option>    
<option value="Male" >Male</option>
<option value="Female">Female</option>
</select></P><br/>
   
<p> <strong>Choose hostel block</strong>
<select required name="hostel_id" class="form-control" id="hostel_block" onchange="checkAvaliability(this.value); this.className=''">
    <option value="">-select-</option>     
</select><br></p>
    <p>
        <select name="room_id" class="form-control" id="room_number" onchange="">
            <option>-select-</option> 

            </select><br>
    </p>
</div>
<div class="tab">
  <p>
    <p id="info"></p> MATRIC NO
    <input id="matno" name="matno" placeholder="Matric/Reg No." oninput="this.className = ''"></p>
  <P class="fa fa-user-o">&nbsp;&nbsp;&nbsp;LEVEL</P>
  <p><select name="level" class="form-control"  onchange="this.className = ''" >
    <option oninput="this.className = ''">-select-</option>
    <option oninput="this.className = ''">100</option>
    <option oninput="this.className = ''">200</option>
     <option oninput="this.className = ''">300</option>
    <option oninput="this.className = ''">400</option>
    <option oninput="this.className = ''">500</option>
    <option oninput="this.className = ''">600</option>
     <option oninput="this.className = ''">700</option>
    <option oninput="this.className = ''">Masters Student</option>      
</select>
<br> <br>
   </p>
    </P>

   </div>

<div class="tab">PERSONAL INFO
  <p><input  id="surname" name="surname" placeholder="Surname" oninput="this.className = ''"></p>
  <p><input name="fname" placeholder="First Name." oninput="this.className = ''"></p>
  <p><input name="othernames" placeholder="Othernames.." oninput="this.className = ''"></p>
  <p>Date of birth</p>
  <p><input  name="dob" type="date" placeholder="Date of Birth" oninput="this.className = ''"></p> 
</div>

   <div class="tab">PROFILE PICTURE
    <p>
    <div class="form-group">
                              
                              <img id="list1" height="100" width="100" class="img-rounded"/>
                            
                              <input type="file" name="photo" id="upfile1" accept="image/jpeg, image/png, image/jpg, image/gif" class=" form-control input-rounded"  placeholder="upload" oninput="this.className = ''" >
                          </div> </p>

</div>

                        <div class="tab"> MORE INFO 
   <br/> 
  
        <P class="fa fa-user-o">&nbsp;&nbsp;&nbsp;Next Of Kin</P>
        <p><input type="text" name="next_of_kin" placeholder="Next of Kin"></p>
        <p><input type="number" name="next_of_kin_phone" placeholder="Next of Kin phone number"></p>

        <P class="fa fa-user-o">&nbsp;&nbsp;&nbsp;State</P>
  <p><select id="select" name="state" class="form-control"  onchange="this.className = ''"><br> <br>
  <option>-select-</option> 
<option value="outside">Outside Nigeria</option>
<option value="ABUJA FCT">ABUJA FCT</option>
<option value="ABIA">ABIA</option>
<option value="ADAMAWA">ADAMAWA</option>
<option value="AKWA IBOM">AKWA IBOM</option>
<option value="ANAMBRA">ANAMBRA</option>
<option  value="BAUCHI">BAUCHI</option>
<option value="BAYELSA">BAYELSA</option>
<option value="BENUE" >BENUE</option>
<option  value="BORNO">BORNO</option>
<option  value="CROSS RIVER">CROSS RIVER</option>
<option   value="DELTA" >DELTA</option>
<option value="EBONYI">EBONYI</option>
<option value=">EDO">EDO</option>
<option value="EKITI">EKITI</option>
<option  value="ENUGU" >ENUGU</option>
<option value="GOMBE">GOMBE</option>  
<option value="IMO">IMO</option>
<option value="JIGAWA">JIGAWA</option>
<option  value="KADUNA">KADUNA</option>
<option value="KANO">KANO</option>
<option value="KATSINA">KATSINA</option>
<option  value="KEBBI">KEBBI</option>
<option value="KOGI">KOGI</option>
<option value="KWARA">KWARA</option>
<option value="LAGOS">LAGOS</option>
<option  value="NASSARAWA">NASSARAWA</option>
<option value="NIGER">NIGER</option>
<option value="OGUN">OGUN</option>
<option value="ONDO">ONDO</option> 
<option value="OSUN">OSUN</option>
<option value="OYO" >OYO</option>
<option value="PLATEAU">PLATEAU</option>
<option value="RIVERS">RIVERS</option>
<option value="SOKOTO">SOKOTO</option>
<option value="TARABA">TARABA</option>
<option value="YOBE">YOBE</option>
<option value="ZAMFARA">ZAMFARA</option>
</select>
<br>
    </P>
</div>



                      <div class="tab"> Health Info
   <br/>

        <P class="fa fa-user-o">&nbsp;&nbsp;&nbsp;</P>
  <p><select id="health" name="health_info" class="form-control"  onchange="this.className = ''"><br> <br>
  <option>-select-</option> 
<option value="Physically impared" >Physically impared</option>
<option value="Not Physically impared">Not physically impared</option>
        
</select><br>
   
    </P>
   
</div>





   
<div class="tab">Contact Info:
  <p><input name="email" type="email" placeholder="E-mail..." oninput="this.className = ''"></p>
  <p>
    <input min="11111111111"  type="number" name="phone" placeholder="Phone..." max="99999999999" oninput="this.className = ''">
</p>
  <P><textarea  placeholder="Address" name="address"  class="form-control" oninput="this.className=''" id="address"></textarea></P>
</div>

<p>


<div style="overflow:auto;">
  <div style="float:right;">
    <button type="button" id="prevBtn" onclick="nextPrev(-1)" class="btn btn-success">Previous</button> 
    &nbsp;&nbsp;&nbsp;
    <button type="button" id="nextBtn" onclick="nextPrev(1)" class="btn btn-success">Next</button>
  </div>
</div>

<!-- Circles which indicates the steps of the form: -->
<div style="text-align:center;margin-top:40px;">
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
 
</div>

</form> 
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
    });  */
      </script>

           
        
    
     
  
      