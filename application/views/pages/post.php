<?php defined('BASEPATH') OR exit('No direct script access allowed'); $this->load->view('dist/_partials/header-main'); ?>
  <!-- Main Content -->
  <div class="main-content">
    <section class="post-all-container">
      <div class="post-grid">
        <?php foreach($postList as $var) {?>
          <div class="post-item">
            <a href="<?= base_url('post/' . $var['url'])?>" style="text-decoration: none" >                  
              <div class="post-thumb">
                <img src="<?= base_url('img/post/' . json_decode($var['thumbnail'])[0]); ?>" style="width: 100%; height: 100%" />
              </div>
              <div class="post-date text-muted">              
                <?php
                  $date = new DateTime($var['created_date']);
                  if($var['updated_date'] == null){
                    $date = new DateTime($var['updated_date']);
                  }
                  echo $date->format('d-m-Y');
                ?>                                            
              </div>
              <div class="post-thumb-title"><?= $var['title'] ?></div>
              <div class="post-content"><?= $var['content'] ?></div>
            </a>
          </div>
        <?php }?>      
      </div>
    </section>
  </div>
      
<?php $this->load->view('dist/_partials/footer-main'); ?>