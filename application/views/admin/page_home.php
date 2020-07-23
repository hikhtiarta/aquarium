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
          <?php if($this->session->flashdata('error')){?>
            <div class="alert alert-danger">
              <?= $this->session->flashdata('error') ?>
            </div>
          <?php }?> 
          <?php if($this->session->flashdata('success')){?>
            <div class="alert alert-success">
              <?= $this->session->flashdata('success') ?>
            </div>
          <?php }?>           
          <div class="section-body">
            <h2 class="section-title">Banner</h2>
            <p class="section-lead">
              Untuk menampilkan gambar banner pada halaman home
            </p>           
            <div class="row mt-sm-4">             
              <div class="col-12 col-md-12 col-lg-6">
                <div class="card">
                  <form method="post" class="needs-validation" novalidate="" action="<?= base_url('admin/do_create_banner') ?>"  enctype="multipart/form-data">
                    <div class="card-header">
                        <h4>Tambah Banner</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">                               
                          <div class="form-group col-md-12 col-12">
                            <label>Gambar Banner</label>
                            <div class="custom-file">
                                <input type="file" name="banner" class="custom-file-input" accept=".jpg,.jpeg,.png" id="customFile" onchange="loadFileBanner(event)" required/>
                                <label class="custom-file-label" for="customFile" id="banner-name">Pilih gambar</label>
                                <div class="invalid-feedback mt-2">
                                    Gambar banner dibutuhkan  
                                </div> 
                            </div>
                            
                            <small class="form-text text-muted">
                                Banner akan ditampilkan di halaman home, pastikan gambar dengan resolusi 2:1. cth: 960x480
                            </small> 
                          </div>                          
                          <div class="form-group col-md-12 col-12">
                            <label>Url</label>
                            <input type="text" class="form-control" value="" name="url" />
                            <small  class="form-text text-muted">
                              Url harus diawali dengan http/https. cth : https://facebook.com
                            </small>
                          </div>                          
                        </div>                                                                        
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary">Tambah</button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-12 col-md-12 col-lg-6">
                <div class="card">
                  <form method="post" class="needs-validation" novalidate="" action="<?= base_url('admin/do_delete_banner') ?>"  enctype="multipart/form-data">
                    <div class="card-header">
                        <h4>Hapus Banner</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">                               
                          <div class="form-group col-md-12 col-12">
                            <label>Banner</label>
                            <select name="bannerdel" class="form-control form-control-sm" required>
                                <?php foreach($bannerList as $key=>$var){ ?>
                                    <option value="<?= $var['id'] ?>">Banner <?= $key+1 ?></option>
                                <?php } ?>                                                                        
                            </select>
                          </div>                                                                           
                        </div>                                                                        
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-danger">Hapus</button>
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
                    <div class="gallery gallery-fw" data-item-height="200">
                      <?php foreach($bannerList as $key=>$var){ $i = $key+1; ?>
                        <div class="gallery-item <?php if($i>2) echo "gallery-hide"; elseif($i==2) echo "gallery-more"; ?>" data-image="<?php echo base_url('img/banner/'.$var['img']); ?>"  data-title="Banner <?= $i ?>"  hyperlink="<?= $var['url'] ?>">
                          <?php if($i==2){ ?> <div>+<?php echo count($bannerList)-1; ?> </div> <?php } ?>
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