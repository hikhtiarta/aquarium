<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header-main');
?>
      <!-- Main Content -->
      <div class="main-content">
 		<video class="video-portopolio" autoplay loop src="<?php echo base_url('assets/video/example.mp4')?>">
 		</video>
 		<div class="main-content custom-shadow">
         <div class="bg-white">
          <div class="container py-5 about-main2">
            <div class="row h-100 align-items-center py-5">
              <div class="col-lg-6 col-md-6">
                <h1 class="font-bebas">Hasil Aquarium 60x60Cm</h1>
                <p class="lead mb-0 font-green">Jakarta Maret 2020</p>
                <b>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat n
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</b>
              </div>
                <div class="col-lg-6 col-md-6">
                  <img class="img-fluid round-box" src="<?php echo base_url('assets/img/about1.jpg')?>" alt="">
                </div>
          </div>
        </div>
      </div>
          <div class="container about-main2">
            <div class="row h-100 align-items-center py-5">
                <div class="col-lg-6 col-md-6">
                  <img class="img-fluid round-box" src="<?php echo base_url('assets/img/about1.jpg')?>" alt="">
                </div>
                <div class="col-lg-6 col-md-6">
                <h1 class="font-bebas">Hasil Aquascape 90x90Cm</h1>
                <p class="lead mb-0 font-green">Bandung Febuary 2020</p>
                <b>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat n
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</b>
              </div>
           </div>
  	  </div>
     </div>
<?php $this->load->view('dist/_partials/footer-main'); ?>