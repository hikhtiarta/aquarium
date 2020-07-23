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
                    <li data-target="#carouselExampleIndicators3" data-slide-to="<?= $key ?>" class="<?php if($key) echo "active"?>"></li>
                  <?php } ?>                                    
                </ol>
                <div class="carousel-inner">                  
                  <?php foreach($bannerList as $key=>$var) {?>
                    <a href="<?= $var['url'] ?>" class="carousel-item <?php if($key) echo "active"?>">
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
          <div class="container py-5">
            <div class="row h-100 align-items-center py-5">
              <div class="col-lg-6">
                <h1 class="display-5">Tentang Kita</h1>
                <p class="lead mb-0 font-green">AQUA WABISABI</p>
                <b>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</b>
                </p>
              </div>
              <div class="col-lg-6 d-none d-lg-block"><img  src="<?php echo base_url('assets/img/about1.jpg')?>" alt="" class="img-fluid"></div>
            </div>
          </div>
        </div>

        <div class="bg-white py-5">
          <div class="container py-5">
            <div class="row align-items-center mb-5">
              <div class="col-lg-6 order-2 order-lg-1"><i class="fa fa-bar-chart fa-2x mb-3 text-primary"></i>
                <h2 class="font-weight-light font-green">Visi</h2>
                <p class="font-italic text-muted mb-4"><b>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</b></p>
              </div>
              <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img class="rounded-circle about-img" src="<?php echo base_url('assets/img/about2.jpg')?>" alt="" class="img-fluid mb-4 mb-lg-0"></div>
            </div>
            <div class="row align-items-center">
              <div class="col-lg-5 px-5 mx-auto font-green"><img class="rounded-circle about-img" src="<?php echo base_url('assets/img/about3.jpg')?>" alt="" class="img-fluid mb-4 mb-lg-0"></div>
              <div class="col-lg-6">
                <h2 class="font-weight-light font-green">Misi</h2>
                <p class="font-italic text-muted mb-4"> <b>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </b></p>
              </div>
               <div class="bg-white py-5">
                <div class="container py-5">
                  <div class="row align-items-center mb-5">
                    <div class="col-lg-6 order-2 order-lg-1"><i class="fa fa-bar-chart fa-2x mb-3 text-primary"></i>
                      <h2 class="font-weight-light font-green">Nilai Perusahaan</h2>
                      <p class="font-italic text-muted mb-4"> <b>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </b></p> 
                    </div>
                    <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img class="rounded-circle about-img" src="<?php echo base_url('assets/img/about4.jpg')?>"  alt="" class="img-fluid mb-4 mb-lg-0"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <!-- End of About Us -->

        <div class="separator" style="margin-right: 15px; margin-left: 15px">
          <div class="row">
            <?php foreach($productListLikes as $key=>$var) {?>      
              <div class="col-12 col-sm-6 col-md-6 col-lg-3 pr-0 pl-0">
                <img class="product-top" src="<?php echo base_url('img/product/'.json_decode($var['img'])[0]); ?>" />
              </div>      
            <?php } ?>            
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

