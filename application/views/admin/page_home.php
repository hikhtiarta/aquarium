<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $title ?></h1>            
          </div>
          <div class="section-body">
            <h2 class="section-title">Banner</h2>
            <p class="section-lead">
              Untuk menampilkan gambar banner pada halaman home
            </p>           
            <div class="row mt-sm-4">             
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <form method="post" class="needs-validation" novalidate="" action="<?= base_url('admin/do_create_banner') ?>"  enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">                               
                          <div class="form-group col-md-6 col-12">
                            <label>Gambar Banner</label>
                            <div class="custom-file">
                                <input type="file" name="banner" class="custom-file-input" id="customFile" />                                
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                          </div>                          
                          <div class="form-group col-md-6 col-12">
                            <label>Url</label>
                            <input type="text" class="form-control" value="" name="url" />
                          </div>                          
                        </div>                                                                        
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary">Add banner</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <h2 class="section-title">Preview Banner</h2>
            <p class="section-lead">
              Preview banner pada halaman home
            </p>
            <div class="row mt-sm-4">             
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">                  
                  <div class="card-body">
                    <div class="owl-carousel owl-theme slider" id="slider1">
                        <?php foreach($bannerList as $var){ ?>
                            <div style="display:block; height:300px !important; margin:0 auto 30px;">
                                <img alt="image" style="object-fit: cover;" src="<?php echo base_url('assets/img/banner/'.$var['img']); ?>">                            
                            </div>
                        <?php } ?>                      
                    </div>                        
                  </div>
                </div>
              </div>
            </div>  
          </div>
        </section>
      </div>
<?php $this->load->view('dist/_partials/footer'); ?>