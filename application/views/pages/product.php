<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header-main');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section-latest">          
          <div class="products-container">
            <?php foreach($productList as $var) {?>
              <div class="products-item">
                <a href="<?= base_url('products/?category=' . $var['name'])?>" >
                  <img src="<?= base_url('img/product/' . json_decode($var['img'])[0]); ?>" style="width: 100%; height: 100%" />
                </a>
              </div>
            <?php }?>            
          </div>
        </section>
        <section class="section-category">          
          <div class="category-container">
            <?php foreach($categoryList as $var) {?>
              <div class="category-item">
                <a href="<?= base_url('products/?category=' . $var['name'])?>" >
                  <img src="<?= base_url('img/category/' . $var['img']); ?>" style="width: 100%; height: 100%" />
                </a>
              </div>
            <?php }?>            
          </div>
        </section>
      </div>
<?php $this->load->view('dist/_partials/footer-main'); ?>