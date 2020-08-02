<?php defined('BASEPATH') OR exit('No direct script access allowed'); $this->load->view('dist/_partials/header-main'); ?>
  <!-- Main Content -->
  <div class="main-content" >
    <?php if(count($post) != 0){ ?>
      <section class="post-container">
        <div class="row mgn-0">
          <div class="col-12 col-sm-12 col-md-8 col-lg-8 bg-white box-shadow pd-0">
            <div class="post-image-container">
              <img src="<?= base_url("img/post/" . json_decode($post['thumbnail'])[0]) ?>" />
            </div>
            <div class="post-detail-container">
              <h5><?= $post['title'] ?></h5>
              <p>
                <?php
                  $date = new DateTime($post['created_date']);
                  if($post['updated_date'] == null){
                    $date = new DateTime($post['updated_date']);
                  }
                  echo $date->format('d-m-Y');
                ?>                              
              </p>
              <div class="post-detail-content">
                <?= $post['content'] ?>
              </div>
              <div class="gallery mt-3">
                <?php foreach(json_decode($post['thumbnail']) as $key=>$var){ $i = $key+1; ?>
                  <div class="gallery-item <?php if($i>2) echo "gallery-hide"; elseif($i==2) echo "gallery-more"; ?>" data-image="<?php echo base_url('img/post/'.$var); ?>"  data-title="Post image <?= $i ?>">
                    <?php if($i==2){ ?> <div>+<?php echo count(json_decode($post['thumbnail']))-1; ?> </div> <?php } ?>
                  </div>
                <?php } ?>                                            
              </div>  
            </div>
          </div>
          <div class="col-12 col-sm-12 col-md-4 col-lg-4">
            <div class="post-sideright">
              <h5>POSTINGAN TERAKHIR</h5>
              <?php foreach($latestPost as $key=>$var) {?>
                <a href="<?= base_url("post/" . $var['url']) ?>" class="post-sideright-latest">
                  <img width="80" height="80" src="<?= base_url('img/post/'.json_decode($var['thumbnail'])[0] ); ?>" alt="Post <?= $key ?>"/>
                  <div class="ml-3">
                    <div class="sideright-title"><b><?= $var['title'] ?></b></div>
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
              <h5 class="mt-5">Tahun</h5>
              <?php foreach($archive as $var) {?>
                <a href="<?= base_url('post/year/' .$var['year']. '/1' ); ?>" class="post-sideright-archive">
                  <i  class="fas fa-chevron-right mr-3"></i>
                  <b><?= $var['year'] . " (" . $var['count'] . ")" ?></b>
                </a>
              <?php } ?>
            </div>
          </div>
        </div>
      </section>
    <?php } else{ ?>
      <div class="not-found">
        Postingan tidak ditemukan
      </div>
    <?php } ?>
  </div>
      
<?php $this->load->view('dist/_partials/footer-main'); ?>