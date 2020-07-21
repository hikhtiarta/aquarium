<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('./dist/_partials/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">            
            <h1><?= $title ?></h1>            
          </div>

          <div class="section-body">            
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <form class="needs-validation" novalidate="" method="POST" action="<?php if($this->input->get('edit') == 'true') echo base_url('admin/do_update_post'); else echo base_url('admin/do_create_post'); ?>" enctype="multipart/form-data">
                    <input type="text" name="post" hidden value="<?php if($dataPost != null) echo $dataPost['id']?>" />
                    <div class="card-body mt-5">
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
                        <div class="col-sm-12 col-md-7">
                          <input name="title" type="text" class="form-control" required="" value="<?php if($dataPost != null) echo $dataPost['title']?>"  autofocus/>
                          <div class="invalid-feedback">
                              Judul dibutuhkan
                          </div>
                        </div>
                      </div>                      
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Konten</label>
                        <div class="col-sm-12 col-md-7">
                          <textarea name="content" class="summernote-simple"><?php if($dataPost != null) echo $dataPost['content']?></textarea>
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                        <div class="col-sm-12 col-md-7">                          
                          <div id="image-preview" class="image-preview">                            
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="thumbnail[]" id="image-upload" multiple accept=".jpg,.jpeg,.png" onchange="loadFile(event)"/>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Preview Thumbnail</label>
                        <div class="col-sm-12 col-md-7" id="image-output"> 
                          <?php if($dataPost != null){ ?>
                            <div class="gallery">
                              <?php foreach(json_decode($dataPost['thumbnail']) as $var) { ?>                              
                                <div class="gallery-item" data-image="<?php echo base_url('img/post/'.$var); ?>" data-title="<?= $var ?>"></div>
                            <?php } ?> </div> <?php  } else{ ?>                         
                            <img width="50" height="50" class="mr-2 mb-2" src="<?php echo base_url(); ?>assets/img/news/img01.jpg" />
                            <img width="50" height="50" class="mr-2 mb-2" src="<?php echo base_url(); ?>assets/img/news/img02.jpg" />
                          <?php } ?>                         
                        </div>
                      </div>                                             
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                          <button class="btn btn-primary"><?php if($this->input->get('edit') == 'true') echo "Update Post"; else echo "Buat Post"; ?></button>
                        </div>
                      </div>
                    </div>
                  </form>                  
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
<?php $this->load->view('./dist/_partials/footer'); ?>