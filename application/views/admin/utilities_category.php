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
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <form class="needs-validation" novalidate="" method="POST" action="<?= $this->config->item('base_url') ?>admin/do_category_add">
                        <div class="card-header">
                            <h4>Tambah Kategori Produk</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama</label>
                                <input name="name" type="text" class="form-control" required="">
                                <div class="invalid-feedback">
                                    Nama required
                                </div>
                            </div>                    
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Add</button>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <form class="needs-validation" novalidate="" method="POST" action="<?= $this->config->item('base_url') ?>admin/do_category_del">
                        <div class="card-header">
                            <h4>Hapus Kategori Produk</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama</label>
                                <select name="namedel" class="form-control form-control-sm">
                                    <?php foreach($categoryList as $var){ ?>
                                        <option ><?= $var['name'] ?></option>
                                    <?php } ?>                                                                        
                                </select>
                            </div>                
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-danger">Delete</button>
                        </div>
                        </form>
                    </div>
                </div>                                        
            </div> 
          </div>        
        </section>
      </div>
<?php $this->load->view('./dist/_partials/footer'); ?>