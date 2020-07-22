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
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <form class="needs-validation" novalidate="" method="POST" action="<?= $this->config->item('base_url') ?>admin/do_category_add" enctype="multipart/form-data">
                        <div class="card-header">
                            <h4>Tambah Kategori Produk</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama</label>
                                <input name="name" type="text" class="form-control" required="">
                                <div class="invalid-feedback">
                                    Nama dibutuhkan
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Gambar Kategori</label>
                                <div class="custom-file">
                                    <input type="file" name="img" class="custom-file-input" accept=".jpg,.jpeg,.png" id="customFile" onchange="loadFileSingle(event)" required/>
                                    <label class="custom-file-label" for="customFile" id="category-image">Pilih gambar</label>                                                               
                                    <div class="invalid-feedback mt-2">
                                        Gambar kategori dibutuhkan  
                                    </div> 
                                </div>
                                
                                <small class="form-text text-muted">
                                    Gambar ini akan ditampilkan di menu produk, pastikan gambar dengan resolusi 2:1. cth: 960x480
                                </small>    
                            </div>                    
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Tambah</button>
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
                                <small class="form-text text-muted">
                                    Hati-hati dalam menghapus kategori! jika kategori dihapus, produk yang berada di kategori tersebut tidak akan tampil
                                </small>  
                            </div>                
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-danger">Hapus</button>
                        </div>
                        </form>
                    </div>
                </div>                                        
            </div> 
          </div>        
        </section>
      </div>
<?php $this->load->view('./dist/_partials/footer'); ?>