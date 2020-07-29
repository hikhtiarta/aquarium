<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header-main');
?>
      <!-- Main Content -->
      <div class="main-content">
        <?php if(count($productList) != 0){ ?>
          <section class="section-all-products">           
            <div class="products-container">
              <div class="products-all-grid">
                <?php foreach($productList as $var) {?>
                  <div class="products-item">
                    <a href="<?= base_url('products/' . $var['url'])?>" style="text-decoration: none" >                  
                      <div class="products-all-thumb">
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
            <nav aria-label="..." class="pagination-container <?= $this->uri->segment(3) ?>">
              <?php if($this->uri->segment(2) == 'category'){ ?>
                <ul class="pagination">
                  <li class="page-item <?= ((int)$this->uri->segment(4) == 1 ? 'disabled' : '') ?>">
                    <a class="page-link" href="<?= base_url('products/category/'. $category . "/" . ((int)$this->uri->segment(4)-1) ) ?>" tabindex="-1"><span aria-hidden="true">«</span></a>
                  </li>
                  <?php 
                    $fr = ((int)$this->uri->segment(4) % 2 == 1 ? (int)$this->uri->segment(4) : (int)$this->uri->segment(4)-1);
                    $ls = ((int)$this->uri->segment(4) % 2 == 1 ? (int)$this->uri->segment(4)+1 : (int)$this->uri->segment(4));
                    $ls =  (count($productList) != 15 && (int)$this->uri->segment(4) % 2 == 1  ? $fr : $ls);
                    for($i = $fr; $i<=$ls; $i++){ if($this->uri->segment(4) == $i) { ?>
                    <li class="page-item active"><a class="page-link" href="<?= base_url('products/category/'. $category . "/" . $i) ?>"><?= $i ?><span class="sr-only">(current)</span></a></li>  
                  <?php }else { ?>  
                    <li class="page-item"><a class="page-link" href="<?= base_url('products/category/'. $category . "/" . $i) ?>"><?= $i ?></a></li>  
                  <?php }} ?>              
                  <li class="page-item <?= (count($productList) != 15? 'disabled' : '') ?>">
                    <a class="page-link" href="<?= base_url('products/category/'. $category . "/" . ((int)$this->uri->segment(4)+1) ) ?>"><span aria-hidden="true">»</span></a>
                  </li>
                </ul>
              <?php }else{ ?>
                <ul class="pagination">
                  <li class="page-item <?php if($this->uri->segment(3) == 1) echo 'disabled'; ?>">
                  <a class="page-link" href="<?= base_url('products/all/'. ((int)$this->uri->segment(3)-1) ) ?>" tabindex="-1"><span aria-hidden="true">«</span></a>
                  </li>
                  <?php 
                    $fr = ((int)$this->uri->segment(3) % 2 == 1 ? (int)$this->uri->segment(3) : (int)$this->uri->segment(3)-1);
                    $ls = ((int)$this->uri->segment(3) % 2 == 1 ? (int)$this->uri->segment(3)+1 : (int)$this->uri->segment(3));
                    $ls =  (count($productList) != 15 && (int)$this->uri->segment(4) % 2 == 1  ? $fr : $ls);
                    for($i = $fr; $i<=$ls; $i++){ if($this->uri->segment(3) == $i) {?>
                    <li class="page-item active"><a class="page-link" href="<?= base_url('products/all/'. $i) ?>"><?= $i ?><span class="sr-only">(current)</span></a></li>  
                  <?php }else { ?>  
                    <li class="page-item"><a class="page-link" href="<?= base_url('products/all/'. $i) ?>"><?= $i ?></a></li>  
                  <?php }} ?>              
                  <li class="page-item <?= (count($productList) != 15? 'disabled' : '') ?>">
                    <a class="page-link" href="#"><span aria-hidden="true">»</span></a>
                  </li>
                </ul>
              <?php } ?>
            </nav>                   
          </section>
        <?php } else{ ?>
          <div class="not-found">
            Produk tidak ditemukan
          </div>
        <?php } ?>
      </div>
<?php $this->load->view('dist/_partials/footer-main'); ?>