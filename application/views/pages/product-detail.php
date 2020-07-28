<?php
defined('BASEPATH') OR exit('No direct script access allowed'); $this->load->view('dist/_partials/header-main'); ?>
      <!-- Main Content -->
      <div class="main-content">        
        <?php if(count($product) != 0){ ?>
        <div class="product-detail-container mt-8">
          <div id="slide-product" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <?php foreach(json_decode($product['img']) as $key=>$var) {?>                    
                <li data-target="#slide-product" data-slide-to="<?= $key ?>" class="<?php if($key == 0) echo "active"?>"></li>
              <?php } ?>                                    
            </ol>
            <div class="carousel-inner">                  
              <?php foreach(json_decode($product['img']) as $key=>$var) {?>
                <div class="carousel-item <?php if($key == 0) echo "active"?>">
                  <img class="d-block  product-detail-thumb" src="<?= base_url('img/product/'.$var) ?>" alt="Foto Produk <?= $key+1 ?>">
                </div>
              <?php } ?>                  
            </div>
            <a class="carousel-control-prev" href="#slide-product" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#slide-product" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
          <div class="row mt-8">          
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
              <h5 class="product-detail-title"><?= $product['name'] ?></h5>
              <h5 class="product-detail-price">Rp <?= rupiah($product['price']) ?></h5>
              <div class="product-detail-desc mt-4"><?= $product['description'] ?></div>
              <hr>
              <div class="product-detail-share">
                <b class="mr-2">Share :</b>
                <a href="" class="share-icon mr-2"><i class="fab fa-facebook-f"></i></a>
                <a href="" class="share-icon"><i class="fab fa-twitter"></i></a>                  
              </div>
            </div>
          </div>
        </div>
        <?php } else{ ?>
          <div class="not-found">
            Produk tidak ditemukan
          </div>
        <?php } ?>
      </div>
<?php $this->load->view('dist/_partials/footer-main'); ?>