<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header-main');
?>
      <!-- Main Content -->
      <div class="main-content">         
        <section class="section-about">          
          <div class="row h-100 pb-5 align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
              <h1 class="font-bebas">Tentang Kami</h1>
              <p class="lead mb-0 font-green">AQUA WABISABI</p>
              <p class="text-justify">
                <b>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat n
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</b>
              </p>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
              <img class="img-fluid mt-3" src="<?php echo base_url('assets/img/about1.jpg')?>" alt="">
            </div>
          </div>
          <div class="row py-5 sep-line">
            <div class="col-lg-6 col-md-6">
              <h2 class="mb-0 font-green">Visi</h2>
                <p  class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat n
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>                
            </div>
            <div class="col-lg-6 col-md-6">
              <h2 class="mb-0 font-green">Misi</h2>
              <p  class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat n
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>              
            </div>
          </div>
          <div class="row py-5 sep-line">
            <div class="col-lg-6 col-md-6">
              <h2 class="mb-0 font-green">Nilai Perusahaan</h2>
              <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat n
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>                
            </div>
            <div class="col-lg-6 col-md-6">
              <img  src="<?php echo base_url('assets/img/about2.jpg')?>" alt="" class="img-fluid mt-3">
            </div>  
          </div>                              
        </section>
      </div>
<?php $this->load->view('dist/_partials/footer-main'); ?>