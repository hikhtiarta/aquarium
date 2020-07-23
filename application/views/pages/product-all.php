<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header-main');
?>
      <!-- Main Content -->
      <div class="main-content">                
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
          <nav aria-label="..." class="pagination-container">
            <ul class="pagination">
              <li class="page-item <?php if($this->input->get('page') == 1 || $this->input->get('page') == 2 || $this->input->get('page') == 3) echo 'disabled'; ?>">
                <a class="page-link" href="#" tabindex="-1"><span aria-hidden="true">«</span></a>
              </li>

              <?php for($i = 1; $i<=3; $i++){ if($this->input->get('page') == $i) {?>
                <li class="page-item active"><a class="page-link" href="<?= base_url('products/?view=all&page='. $i) ?>"><?= $i ?><span class="sr-only">(current)</span></a></li>  
              <?php }else { ?>  
                <li class="page-item"><a class="page-link" href="<?= base_url('products/?view=all&page='. $i) ?>"><?= $i ?></a></li>  
              <?php }} ?>              
              <li class="page-item">
                <a class="page-link" href="#"><span aria-hidden="true">»</span></a>
              </li>
            </ul>
          </nav>                   
        </section>        
      </div>
<?php $this->load->view('dist/_partials/footer-main'); ?>