<?php include('header.php'); ?>
    <!-- Page Header Start -->
    <div
      class="container-fluid page-header py-5 mb-5 wow fadeIn"
      data-wow-delay="0.1s"
    >
      <div class="container py-5">
        <h1 class="display-1 text-white animated slideInDown">Join WPI</h1>
        <nav aria-label="breadcrumb animated slideInDown">
          <ol class="breadcrumb text-uppercase mb-0">
            <li class="breadcrumb-item">
              <a class="text-white" href="#">Home</a>
            </li>
            <!-- <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li> -->
            <li class="breadcrumb-item text-primary active" aria-current="page">
              Join WPI
            </li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- Page Header End -->

    <!-- Appointment Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <div class="row g-5">
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
            <h4 class="section-title">Join Us</h4>
            <h1 class="display-5 mb-4">We Grow Together</h1>
            <p class="mb-4">
              This will not be just another party engaged in power politics.
              This will be rather a movement for reforming the Indian Politics
              and will try to realise a welfare state based on moral values and
              governed by the principles of Justice, Freedom, Equality and
              Fraternity.
            </p>
            <div class="row g-4">
              <div class="col-12">
                <div class="d-flex">
                  <div
                    class="d-flex flex-shrink-0 align-items-center justify-content-center bg-light"
                    style="width: 65px; height: 65px"
                  >
                    <i class="fa fa-2x fa-phone-alt text-primary"></i>
                  </div>
                  <div class="ms-4">
                    <p class="mb-2">Call Us Now</p>
                    <h3 class="mb-0">+012 345 6789</h3>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="d-flex">
                  <div
                    class="d-flex flex-shrink-0 align-items-center justify-content-center bg-light"
                    style="width: 65px; height: 65px"
                  >
                    <i class="fa fa-2x fa-envelope-open text-primary"></i>
                  </div>
                  <div class="ms-4">
                    <p class="mb-2">Mail Us Now</p>
                    <h3 class="mb-0">info@example.com</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
            <div class="row g-3">
              <div class="col-12 col-sm-6">
                <input
                  type="text"
                  class="form-control"
                  placeholder="Your Name"
                  style="height: 55px"
                />
              </div>
              <div class="col-12 col-sm-6">
                <input
                  type="email"
                  class="form-control"
                  placeholder="Your Email"
                  style="height: 55px"
                />
              </div>
              <div class="col-12 col-sm-6">
                <input
                  type="text"
                  class="form-control"
                  placeholder="Your Mobile"
                  style="height: 55px"
                />
              </div>
              <div class="col-12 col-sm-6">
                <select class="form-select" style="height: 55px">
                  <option selected>Choose City</option>
                  <option value="1">Mumbai</option>
                  <option value="2">Delhi</option>
                  <option value="3">Pune</option>
                </select>
              </div>

              <div class="col-12">
                <textarea
                  class="form-control"
                  rows="5"
                  placeholder="Message"
                ></textarea>
              </div>
              <div class="col-12">
                <button class="btn btn-primary w-100 py-3" type="submit">
                  Book Appointment
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Appointment End -->

    <?php include('footer.php'); ?>