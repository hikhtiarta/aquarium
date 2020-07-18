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
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                        <div class="col-sm-12 col-md-7">
                          <input name="title" type="text" class="form-control" required="" value="<?php if($dataPost != null) echo $dataPost['title']?>" />
                          <div class="invalid-feedback">
                              Title required
                          </div>
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                        <div class="col-sm-12 col-md-7">                        
                          <select name="category" class="form-control form-control-sm" style="text-transform: capitalize!important"  value="<?php if($dataPost != null) echo $dataPost['category']?>">
                              <?php foreach($categoryList as $var){ ?>
                                  <?php if($dataPost != null && $dataPost['category'] == $var['name']) { ?>
                                    <option style="text-transform: capitalize!important"  selected><?= $var['name'] ?></option>
                                  <?php }else { ?>
                                    <option style="text-transform: capitalize!important"  ><?= $var['name'] ?></option>
                                  <?php } ?>                                  
                              <?php } ?>                                                                        
                          </select>
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                        <div class="col-sm-12 col-md-7">
                          <textarea name="content" class="summernote-simple"><?php if($dataPost != null) echo $dataPost['content']?></textarea>
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                        <div class="col-sm-12 col-md-7">
                          <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="thumbnail" id="image-upload" />
                          </div>
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Preview Thumbnail</label>
                        <div class="col-sm-12 col-md-7">
                          <div id="image-preview" class="image-preview text-center">
                            <?php if($dataPost != null) {?>
                              <img src=" <?= base_url('assets/img/uploads/'.$dataPost['thumbnail'])?>" style="max-height: 100%; max-width: 100%;"/>
                            <?php }else {?>
                              <img src="<?php if(isset($_FILES['thumbnail'])) echo $_FILES['thumbnail']['name']?>" style="max-height: 100%; max-width: 100%;"/>
                            <?php }?>                            
                          </div>
                        </div>
                      </div>                                             
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                          <button class="btn btn-primary"><?php if($this->input->get('edit') == 'true') echo "Update Post"; else echo "Create Post"; ?></button>
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