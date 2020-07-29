<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header-main');
?>
      <!-- Main Content -->
      <div class="main-content">
        <!-- <h2 class="section-title text-center mt-8">Kategori Produk</h2>      -->
        <section class="section-category">          
          <div class="category-container">
            <?php foreach($categoryList as $var) {?>
              <div class="category-item">
                <a href="<?= base_url('products/category/' . $var['name']) . '/1'?>" >
                  <img src="<?= base_url('img/category/' . $var['img']); ?>" style="width: 100%; height: 100%" />
                </a>
              </div>
            <?php }?>            
          </div>
        </section>
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
          <div class="products-view-all-btn">
            <a href="<?= base_url("products/all/1") ?>" >Lihat semua produk</a>
          </div>          
        </section>        
      </div>
<?php $this->load->view('dist/_partials/footer-main'); ?>