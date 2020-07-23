<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header-main');
?>
      <!-- Main Content -->
      <div class="main-content">                
        <section class="section-latest">           
          <div class="products-container">
            <div class="products-grid">
              <?php foreach($productList as $var) {?>
                <div class="products-item">
                  <a href="<?= base_url('products/' . $var['url'])?>" style="text-decoration: none" >                  
                    <div class="products-thumb">
                      <img src="<?= base_url('img/product/' . json_decode($var['img'])[0]); ?>" style="width: 100%; height: 100%" />
                    </div>
                    <div class="products-thumb-title">
                      <?= $var['name'] ?>
                    </div>
                  </a>
                </div>
              <?php }?>      
            </div>
          </div>                   
        </section>        
      </div>
<?php $this->load->view('dist/_partials/footer-main'); ?>