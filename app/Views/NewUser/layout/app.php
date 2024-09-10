<!DOCTYPE html>
<html lang="in">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Meta Tags -->
  <meta name="title" content="<?= $metaTitle ?? 'Jago Digital Marketing' ?>">
  <meta name="description" content="<?= $metaDesc ?? 'Default description for Jago Digital Marketing' ?>">

  <!-- Canonical Tag -->
  <link rel="canonical" href="<?= $canonicalUrl ?? base_url() ?>">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />

  <title><?= $title ?? 'Title' ?> | Jago Digital Marketing</title>

  <link rel="icon" type="image/x-icon" href="<?= base_url('assets-new/images/favicon.png') ?>">
  <link href="<?= base_url('assets-new/css/jdm.css') ?>" rel="stylesheet">

</head>


<body>
  <?php
  $session = session();
  $loggedIn = $session->get('logged_in');

  // Check if the 'view' query parameter is set in the URL
  if (isset($_GET['view'])) {
    $selectedView = $_GET['view'];

    // Validate the selected view and store it in the session
    if (in_array($selectedView, ['admin', 'member', 'nonmember'])) {
      $session->set('admin_view', $selectedView);
    }
  }

  // Get the current view from the session
  $currentView = $session->get('admin_view');

  // Admin can switch views based on their selection
  if ($session->get('role') == 'admin' && $currentView) {
    if ($currentView == 'admin') {
      // Load admin view
      echo $this->include('NewUser/layout/headerAdmin.php');
    } elseif ($currentView == 'member') {
      // Load member view
      echo $this->include('NewUser/layout/headerMember.php');
    } elseif ($currentView == 'nonmember') {
      // Load non-member view
      echo $this->include('NewUser/layout/headerNonMember.php');
    }
  } else {
    // Default behavior for normal users (non-admins)
    if ($loggedIn) {
      echo $this->include('NewUser/layout/headerMember.php');
    } else {
      echo $this->include('NewUser/layout/headerNonMember.php');
    }
  }
  ?>



  <?= $this->renderSection('content'); ?>



  <!-- Remove the container if you want to extend the Footer to full width. -->
  <div class="section mt-5">
    <!-- Footer -->
    <footer
      class="text-center text-lg-start text-white"
      style="background-color: #87D5C8">
      <!-- Grid container -->
      <div class="container p-4 footer-links">
        <!-- Section: Links -->
        <section class="">
          <!--Grid row-->
          <div class="row">
            <!-- Grid column -->
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
              <h6 class="text-uppercase mb-4 font-weight-bold">
                Jago Digital Marketing
              </h6>
              <p>
                Jago Digital Marketing adalah pelatihan untuk meningkatkan keterampilan pemasaran online, strategi konten, dan iklan digital.
              </p>
            </div>
            <!-- Grid column -->

            <hr class="w-100 clearfix d-md-none" />

            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
              <h6 class="text-uppercase mb-4 font-weight-bold">Products</h6>
              <p>
                <a class="text-white">MDBootstrap</a>
              </p>
              <p>
                <a class="text-white">MDWordPress</a>
              </p>
              <p>
                <a class="text-white">BrandFlow</a>
              </p>
              <p>
                <a class="text-white">Bootstrap Angular</a>
              </p>
            </div>
            <!-- Grid column -->

            <hr class="w-100 clearfix d-md-none" />

            <!-- Grid column -->
            <hr class="w-100 clearfix d-md-none" />

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
              <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
              <p><i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
              <p><i class="fas fa-envelope mr-3"></i> info@gmail.com</p>
              <p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
              <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
              <h6 class="text-uppercase mb-4 font-weight-bold">Follow us</h6>

              <!-- Facebook -->
              <a
                class="btn btn-primary btn-floating m-1"
                style="background-color: #3b5998"
                href="#!"
                role="button"><i class="fab fa-facebook-f"></i></a>

              <!-- Twitter -->
              <a
                class="btn btn-primary btn-floating m-1"
                style="background-color: #55acee"
                href="#!"
                role="button"><i class="fab fa-twitter"></i></a>

              <!-- Google -->
              <a
                class="btn btn-primary btn-floating m-1"
                style="background-color: #dd4b39"
                href="#!"
                role="button"><i class="fab fa-google"></i></a>

              <!-- Instagram -->
              <a
                class="btn btn-primary btn-floating m-1"
                style="background: linear-gradient(45deg, #f58529, #dd2a7b, #8134af, #515bd4); border: none;"
                href="#!"
                role="button">
                <i class="fab fa-instagram"></i>
              </a>

              <!-- Linkedin -->
              <a
                class="btn btn-primary btn-floating m-1"
                style="background-color: #0082ca"
                href="#!"
                role="button"><i class="fab fa-linkedin-in"></i></a>
              <!-- Github -->
              <a
                class="btn btn-primary btn-floating m-1"
                style="background-color: #333333"
                href="#!"
                role="button"><i class="fab fa-github"></i></a>
            </div>
          </div>
          <!--Grid row-->
        </section>
        <!-- Section: Links -->
      </div>
      <!-- Grid container -->

      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2); color: #fff;">
        &copy; <?= date('Y'); ?> <?= isset($layout['copyright']) ? $layout['copyright'] : 'All Rights Reserved'; ?>
      </div>

      <!-- Copyright -->
    </footer>
    <!-- Footer -->
  </div>
  <!-- End of .container -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>