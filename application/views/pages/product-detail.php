<?php
defined('BASEPATH') OR exit('No direct script access allowed'); $this->load->view('dist/_partials/header-main'); ?>
      <!-- Main Content -->
      <div class="main-content">        
        <div class="product-detail-container mt-8">
            <div class="row">
              <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <!-- <div class="gallery">
                  <?php foreach(json_decode($product['img']) as $var) { ?>                              
                    <div class="gallery-item" data-image="<?php echo base_url('img/product/'.$var); ?>" data-title="<?= $var ?>"></div>
                  <?php } ?> 
                </div>     -->                
              </div>
              <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <h5 class="product-detail-title"><?= $product['name'] ?></h5>
                <h5 class="product-detail-price">Rp <?= rupiah($product['price']) ?></h5>
                <hr>
                <div class="product-detail-share">
                  <b class="mr-2">Share :</b>
                  <a href="" class="share-icon mr-2"><i class="fab fa-facebook-f"></i></a>
                  <a href="" class="share-icon"><i class="fab fa-twitter"></i></a>                  
                </div>
              </div>
            </div>
        </div>
      </div>
<?php $this->load->view('dist/_partials/footer-main'); ?>