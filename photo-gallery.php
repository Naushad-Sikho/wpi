<?php include('header.php'); ?>


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-1 text-white animated slideInDown">Photo Gallery</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Media Resorces</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Photo Gallery</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Project Start -->
    <div class="container-xxl project py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <!-- <h4 class="section-title">Our Projects</h4> -->
                <h1 class="display-5 mb-4">Photo Gallery</h1>
            </div>
           

            <!-- previes events  -->
            <div class="row g-4 wow fadeInUp mt-4" data-wow-delay="0.3s">
                <div class="col-md-4  mt-4">
                    <div class="pre-event">
                      <a href="photo-gallery-details.php">
                      <div class="">
                        <img class="img-fluid" src="img/project-1.jpg" alt="" />
                      </div>
                      <div class="p-4">
                        <P class="d-block h5" href=""> Photo Gallery Name</P>                       
                      </div>
                    </a>
                    </div>
                </div>

                <div class="col-md-4  mt-4">
                  <div class="pre-event">
                    <a href="photo-gallery-details.html">
                    <div class="">
                      <img class="img-fluid" src="img/project-2.jpg" alt="" />
                    </div>
                    <div class="p-4">
                      <P class="d-block h5" href=""> Photo Gallery Name</P>                       
                    </div>
                  </a>
                  </div>
              </div>

              <div class="col-md-4  mt-4">
                <div class="pre-event">
                  <a href="photo-gallery-details.html">
                  <div class="">
                    <img class="img-fluid" src="img/project-3.jpg" alt="" />
                  </div>
                  <div class="p-4">
                    <P class="d-block h5" href=""> Photo Gallery Name</P>                       
                  </div>
                </a>
                </div>
            </div>


                
            </div>
        </div>
    </div>
    <!-- Project End -->
        
    <?php include('footer.php'); ?>