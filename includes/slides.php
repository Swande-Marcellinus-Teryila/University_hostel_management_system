 <div id="home" class="slider">
    <div id="main_slider" class="carousel slide" data-ride="carousel">
       <ol class="carousel-indicators">
          <li data-target="#main_slider" data-slide-to="0" class="active"></li>
          <li data-target="#main_slider" data-slide-to="1"></li>
          <li data-target="#main_slider" data-slide-to="2"></li>
       </ol>
       <div class="carousel-inner">
          <div class="carousel-item active">
             <img class="d-block w-100" src="imgs/slide1.jpg" alt="slider_img">
             <div class="ovarlay_slide_cont">
                <h2>BLOCK B HOSTELS SOUTHCORE</h2>
                <p>Our school has offers the best hostel services to students, we have about
                   <?php echo  number_format($crud->getTotal('hostel_blocks')); ?> hostel blocks &nbsp;&nbsp;&nbsp;<a class="btn btn-success" href="applications/hostelapp.php">Apply Now</a></p>

             </div>
          </div>
          <div class="carousel-item">
             <img class="d-block w-100" src="imgs/slide2.jpg" alt="slider_img">
             <div class="ovarlay_slide_cont">
                <h2>BLOCK-C Girls HOSTELS SOUTHCORE</h2>
                about <?php echo  number_format($crud->getTotal('hostel_blocks')); ?> hostel blocks &nbsp;&nbsp;&nbsp;<a class="btn btn-success" href="applications/hostelapp.php">Apply Now</a></p>

             </div>
          </div>
       </div>
       <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
          <img src="imgs/left.png" alt="#" />
       </a>
       <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
          <img src="imgs/right.png" alt="#" />
       </a>
    </div>
 </div>