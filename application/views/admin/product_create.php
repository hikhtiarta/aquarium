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
                  <form class="needs-validation" novalidate="" method="POST" action="<?php if($this->input->get('edit') == 'true') echo base_url('admin/do_update_product'); else echo base_url('admin/do_create_product'); ?>" enctype="multipart/form-data">
                    <input type="text" name="product" hidden value="<?php if($dataProduct != null) echo $dataProduct['id']?>" />
                    <div class="card-body mt-5">
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Produk</label>
                        <div class="col-sm-12 col-md-7">
                          <input name="name" type="text" class="form-control" required="" value="<?php if($dataProduct != null) echo $dataProduct['name']?>" autofocus/>
                          <div class="invalid-feedback">
                              Nama Produk Dibutuhkan
                          </div>
                        </div>
                      </div>                      
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori Produk</label>
                        <div class="col-sm-12 col-md-7">
                          <select class="form-control select2" multiple="" name="category[]" required="">
                            <?php foreach($categoryList as $var){ 
                              if(in_array($var['name'], json_decode($dataProduct['category']))) { ?>                              
                                <option  selected><?= $var['name'] ?></option>
                              <?php }else { ?>  
                                <option ><?= $var['name'] ?></option>
                            <?php } } ?>  
                          </select>
                          <small class="form-text text-muted">
                            Tidak boleh mengisi nama kategori yang tidak terdaftar didalam daftar kategori
                          </small>                          
                        </div>
                      </div>                        
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga Produk (Rp)</label>
                        <div class="col-sm-12 col-md-7">
                          <input name="price" type="number" min="0" class="form-control" required="" value="<?php if($dataProduct != null) echo $dataProduct['price']?>" />
                          <div class="invalid-feedback">
                              Harga Produk Dibutuhkan
                          </div>
                        </div>
                      </div>                        
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
                        <div class="col-sm-12 col-md-7">
                          <textarea name="description" class="summernote-simple"><?php if($dataProduct != null) echo $dataProduct['description']?></textarea>
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                        <div class="col-sm-12 col-md-7">
                          <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="img[]" id="image-upload" multiple accept=".jpg,.jpeg,.png" onchange="loadFile(event)"/>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Preview Thumbnail</label>
                        <div class="col-sm-12 col-md-7" >
                          <div class="gallery" id="image-output">
                            <?php if($dataProduct != null){ ?>                            
                                <?php foreach(json_decode($dataProduct['img']) as $var) { ?>                              
                                  <div class="gallery-item" data-image="<?php echo base_url('img/product/'.$var); ?>" data-title="<?= $var ?>"></div>
                              <?php } } else{ ?>                         
                              <img width="50" height="50" class="mr-2 mb-2" src="<?php echo base_url(); ?>assets/img/news/img01.jpg" />
                              <img width="50" height="50" class="mr-2 mb-2" src="<?php echo base_url(); ?>assets/img/news/img02.jpg" />
                            <?php } ?>    
                          </div>
                        </div>
                      </div>                                       
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                          <button class="btn btn-primary"><?php if($this->input->get('edit') == 'true') echo "Update Produk"; else echo "Buat Produk"; ?></button>
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