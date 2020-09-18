<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header-main');
?>
  <!-- Main Content -->
  <div class="main-content">                        
            <video class="video-portofolio" autoplay loop src="<?php echo base_url('assets/video/test.mp4')?>">
            </video>
     </div>      
      </div>      
      <section class="section-portfolio">        
        <div class="row pb-5 align-items-center">
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
            <img class="img-fluid round-box mt-3" src="<?php echo base_url('assets/img/about1.jpg')?>" alt="">
          </div>
        </div>        
        <div class="row py-5 align-items-center sep-line">
            <div class="col-lg-6 col-md-6">
              <img class="img-fluid round-box mb-3" src="<?php echo base_url('assets/img/aquascape.jpg')?>" alt="">
            </div>
            <div class="col-lg-6 col-md-6">
              <h1 class="font-bebas">Hasil Aquascape 90x90Cm</h1>
              <p class="lead mb-0 font-green">Bandung Febuary 2020</p>
              <b>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat n
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              </b>
            </div>     
          </div>
        </div>
      </section>
  </div>  
  
<?php $this->load->view('dist/_partials/footer-main'); ?>