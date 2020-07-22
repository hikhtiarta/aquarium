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