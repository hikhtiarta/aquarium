<?php defined('BASEPATH') OR exit('No direct script access allowed'); $this->load->view('dist/_partials/header-main'); ?>
  <!-- Main Content -->
  <div class="main-content">
  <?php if(count($postList) != 0){ ?>
    <section class="post-all-container">         
      <div class="row">
        <div class="col-12 col-sm-12 col-md-8 col-lg-8">
          <?php foreach($postList as $key=>$var) {?>
            <a href="<?= base_url("post/" . $var['url']) ?>" class="post-item <?= $key != 0 ? "mt-3" : ""  ?>">
              <img width="80" height="80" src="<?= base_url('img/post/'.json_decode($var['thumbnail'])[0] ); ?>" alt="Post <?= $key ?>"/>
              <div class="ml-3">
                <div class="post-thumb-title"><b><?= $var['title'] ?></b></div>
                <p class="text-muted">
                  <?php
                    $date = new DateTime($var['created_date']);
                    if($var['updated_date'] == null){
                      $date = new DateTime($var['updated_date']);
                    }
                    echo $date->format('d-m-Y');
                  ?>                              
                </p>
              </div>                
            </a>
          <?php } ?>
          
          <nav aria-label="..." class="pagination-container">             
            <?php if($this->uri->segment(2) == 'all') {?>
              <ul class="pagination">
                <li class="page-item-post <?php if($this->uri->segment(3) == 1) echo 'disabled'; ?>">
                <a class="page-link" href="<?= base_url('post/all/' . ((int)$this->uri->segment(3)-1) ) ?>" tabindex="-1"><span aria-hidden="true">«</span></a>
                </li>
                <?php 
                  $fr = ((int)$this->uri->segment(3) % 2 == 1 ? (int)$this->uri->segment(3) : (int)$this->uri->segment(3)-1);
                  $ls = ((int)$this->uri->segment(3) % 2 == 1 ? (int)$this->uri->segment(3)+1 : (int)$this->uri->segment(3));
                  $ls =  (count($postList) != 10 && (int)$this->uri->segment(4) % 2 == 1  ? $fr : $ls);
                  for($i = $fr; $i<=$ls; $i++){ if($this->uri->segment(3) == $i) {?>
                  <li class="page-item-post active"><a class="page-link" href="<?= base_url('post/all/'. $i) ?>"><?= $i ?><span class="sr-only">(current)</span></a></li>  
                <?php }else { ?>  
                  <li class="page-item-post"><a class="page-link" href="<?= base_url('post/all/'. $i) ?>"><?= $i ?></a></li>  
                <?php }} ?>              
                <li class="page-item-post <?= (count($postList) != 10? 'disabled' : '') ?>">
                  <a class="page-link" href="<?= base_url('post/all/'. ((int)$this->uri->segment(3)+1) ) ?>"><span aria-hidden="true">»</span></a>
                </li>
              </ul>
            <?php }else{?>
              <ul class="pagination">
                <li class="page-item-post <?php if($this->uri->segment(4) == 1) echo 'disabled'; ?>">
                  <a class="page-link" href="<?= base_url('post/year/' . $year. "/" . ((int)$this->uri->segment(4)-1) ) ?>" tabindex="-1"><span aria-hidden="true">«</span></a>
                </li>
                <?php 
                  $fr = ((int)$this->uri->segment(4) % 2 == 1 ? (int)$this->uri->segment(4) : (int)$this->uri->segment(4)-1);
                  $ls = ((int)$this->uri->segment(4) % 2 == 1 ? (int)$this->uri->segment(4)+1 : (int)$this->uri->segment(4));
                  $ls =  (count($postList) != 10 && (int)$this->uri->segment(4) % 2 == 1  ? $fr : $ls);
                  for($i = $fr; $i<=$ls; $i++){ if($this->uri->segment(4) == $i) {?>
                  <li class="page-item-post active"><a class="page-link" href="<?= base_url('post/year/' . $year . "/" . $i) ?>"><?= $i ?><span class="sr-only">(current)</span></a></li>  
                <?php }else { ?>  
                  <li class="page-item-post"><a class="page-link" href="<?= base_url('post/year/' . $year . "/" . $i) ?>"><?= $i ?></a></li>  
                <?php }} ?>              
                <li class="page-item-post <?= (count($postList) != 10? 'disabled' : '') ?>">
                  <a class="page-link" href="<?= base_url('post/year/'. $year ."/" . ((int)$this->uri->segment(4)+1) ) ?>">
                    <span aria-hidden="true">»</span>
                  </a>
                </li>
              </ul>
            <?php } ?>
          </nav>   
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4">
          <h5 class="">Tahun</h5>
          <?php foreach($archive as $var) {?>
            <a href="<?= base_url('post/year/' .$var['year']. '/1' ); ?>" class="post-sideright-archive">
              <i  class="fas fa-chevron-right mr-3"></i>
              <b><?= $var['year'] . " (" . $var['count'] . ")" ?></b>
            </a>
          <?php } ?>
        </div>      
      </div>    
    </section>
    <?php } else{ ?>
      <div class="not-found">
        Produk tidak ditemukan
      </div>
    <?php } ?>
  </div>
      
<?php $this->load->view('dist/_partials/footer-main'); ?>