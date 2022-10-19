<?php require("includes/autoloader.php");
$crud = new Crud();



?>
<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home  - hostel Management -Federal University of Agriculture Makurdi</title>
   <link rel="icon" type="image" href="/imgs/ico.png">
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
            <div class="col-md-3 col-lg-4">

               <h3>Hostel Application Guildlines</h3>

               <ul>
                  <li>1. After making payment proceed with your
                     <a href="applications/hostelapp.php">registration</a>
                  </li>
                  <li>2. Fill the form provided acurately </li>
                  <li>3. Note that you can't register twice </li>
                  <li>3. Select the availiable hostels and room that you like, confirm your details and press the reserve button</li>
               </ul>



               <a class="btn btn-success" href="applications/hostelapp.php"> Apply</a></p>
            </div>
            <div class="col-md-8">
               <div class="full text_align_center" style="height:500px ;">
                  <h2 style="font-size:45px; font-wieght:700;">HOSTEL GALLERY</h2>
                  <?php include("includes/slides.php") ?>

               </div>
            </div>
         </div>
      </div>
   </div>


   <?php include('footer.php'); ?>