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
                      <img class="d-block w-100" style="height: 30vw;" src="<?= base_url('img/banner/'.$var['img']) ?>" alt="Banner <?= $key+1 ?>">
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
        <div class="section-about">
          <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
              <h1 class="font-bebas" data-aos="fade-up">Pendiri Aqua wabisabi</h1>
              <p class="lead mb-0 font-green">Rhandy Ibrahim</p>
              <b>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat n
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</b>
            </div>
            <div class="col-lg-6 col-md-6 flex-center mt-3">
              <img width="250" height="425" src="<?php echo base_url('assets/img/founder.png')?>" alt="">
            </div>
          </div>
        </div>      
        <section class="section-products sep-line ">
          <h2 class="section-title text-center mb-8" data-aos="fade-up">Produk Terbaru</h2>          
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
          <div class="text-right"><a href="<?= base_url('products/all/1'); ?>" class="btn btn-primary ">Lihat semua produk</a></div>
        </section>
        <section class="section-contactus sep-line ">
          <?php if($this->session->flashdata('error')){?>
            <div class="alert alert-danger">
              <?= $this->session->flashdata('error') ?>
            </div>
          <?php }?> 
          <?php if($this->session->flashdata('success')){?>
            <div class="alert alert-success">
              <?= $this->session->flashdata('success') ?>
            </div>
          <?php }?> 
          <h2 class="section-title text-center mb-8" data-aos="fade-up">Contact Us</h2>          
          <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-5">              
              <div id="map-container-google-2" class="z-depth-1-half map-container-2">
                <iframe class="location-maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.296750902128!2d106.83818511529519!3d-6.2245478626962685!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f7b590cefe15%3A0x23186dc3ec11369a!2sPT%20IDStar%20Cipta%20Teknologi!5e0!3m2!1sen!2sid!4v1595494297870!5m2!1sen!2sid" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
              </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-7 mt-4">
              <form method="POST" class="needs-validation" novalidate="" action="<?= base_url('home/send'); ?>">
                <div class="row">
                  <div class="form-group col-md-12 col-12">
                    <label>Nama</label>
                    <input type="text" class="form-control" required="" name="name">
                    <div class="invalid-feedback">
                      Nama dibutuhkan
                    </div>
                  </div>      
                </div>
                <div class="row">
                  <div class="form-group col-md-12 col-12">
                    <label>Email</label>
                    <input type="email" class="form-control" required="" name="email">
                    <div class="invalid-feedback">
                      Email dibutuhkan
                    </div>
                  </div>      
                </div>               
                <div class="row">
                  <div class="form-group col-md-12 col-12">
                    <label>Pesan</label>
                    <textarea name="message" class="form-control" placeholder="" data-height="150" required></textarea>
                    <div class="invalid-feedback">
                      Pesan dibutuhkan
                    </div>
                  </div>      
                </div>                 
                <div class="form-group text-right">
                  <button type="submit" class="btn btn-round btn-lg btn-primary">
                    Send Message
                  </button>
                </div>
              </form>
            </div>            
          </div>           
        </section>
      </div>
<?php $this->load->view('dist/_partials/footer-main'); ?>

