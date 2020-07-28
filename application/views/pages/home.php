<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header-main');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section-home">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12" style="padding-right: 0px; padding-left: 0px;">
              <div id="carouselExampleIndicators3" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <?php foreach($bannerList as $key=>$var) {?>                    
                    <li data-target="#carouselExampleIndicators3" data-slide-to="<?= $key ?>" class="<?php if($key == 0) echo "active"?>"></li>
                  <?php } ?>                                    
                </ol>
                <div class="carousel-inner">                  
                  <?php foreach($bannerList as $key=>$var) {?>
                    <a href="<?= $var['url'] ?>" class="carousel-item <?php if($key == 0) echo "active"?>">
                      <img class="d-block w-100" src="<?= base_url('img/banner/'.$var['img']) ?>" alt="Banner <?= $key+1 ?>">
                    </a>
                  <?php } ?>                  
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators3" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators3" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>                                      
          </div>                
        </section> 
        <!-- End Of Slider -->

        <div class="bg-white">
          <div class="container py-5 about-main2">
            <div class="row h-100 align-items-center py-5">
              <div class="col-lg-6 col-md-6">
                <h1 class="font-bebas">Tentang Kita</h1>
                <p class="lead mb-0 font-green">AQUA WABISABI</p>
                <b>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat n
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</b>
              </div>
                <div class="col-lg-6 col-md-6">
                  <img class="img-fluid" src="<?php echo base_url('assets/img/about1.jpg')?>" alt="">
                </div>
          </div>
        </div>
        <div class="bg-white">
          <div class="container about-main py-5">
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <h2 class="mb-0 font-green font-bebas">Visi</h2>
                <b>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat n
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</b>                
              </div>
              <div class="col-lg-6 col-md-6">
                <h2 class="mb-0 font-green font-bebas">Misi</h2>
                <b>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat n
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</b>              
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <h2 class="mb-0 font-green font-bebas">Nilai Perusahaan</h2>
                <b>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat n
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</b>                
              </div>
              <div class="col-lg-6 col-md-6">
                <img  src="<?php echo base_url('assets/img/about2.jpg')?>" alt="" class="width-img">
              </div>  
            </div>
          </div>
        </div>

      <!-- End of About Us -->

      <div class="bg-white">
        <div class="row">
          <div class="container py-5 about-main2">
            <div class="row h-100 align-items-center py-5">
              <div class="col-lg-6 col-md-6">
                <h1 class="font-bebas"><u>Pendiri Aqua wabisabi</u></h1>
                <p class="lead mb-0 font-green">Rhandy Ibrahim</p>
                <b>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat n
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</b>
              </div>
                <div class="col-lg-6 col-md-6">
                  <img class="founder-img" src="<?php echo base_url('assets/img/founder.png')?>" alt="">
              </div>
              </div>
          </div>        
        <section class="section-products">
          <h2 class="section-title text-center mb-8">Produk Terbaru</h2>          
          <div class="row">
            <?php foreach($productList as $key=>$var) {?>      
              <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <article class="article article-style-c">
                  <div class="article-header">
                    <a href="<?= base_url('products/'.$var['url']) ?>">
                      <div class="article-image" data-background="<?php echo base_url('img/product/'.json_decode($var['img'])[0]); ?>"></div>
                    </a>
                  </div>

                  <!-- End Of Products -->
                  <div class="article-details">
                    <div class="article-category">
                      <?php
                        $date = new DateTime($var['created_date']);
                        echo $date->format('d-m-Y');                                         
                      ?>
                    </div>
                    <div class="article-title">
                      <h2 class="products-title"><a href="<?= base_url('products/'.$var['url']) ?>"><?= $var['name'] ?></a></h2>
                    </div>
                    <div class="products-desc"><?= $var['description'] ?></div>                  
                  </div>
                </article>
              </div>      
            <?php } ?>
          </div> 
          <div class="text-right"><a href="" class="btn btn-primary ">Lihat semua produk</a></div>
        </section>
      </div>
<?php $this->load->view('dist/_partials/footer-main'); ?>

