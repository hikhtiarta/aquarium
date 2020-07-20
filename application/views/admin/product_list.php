<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
$this->load->helper('Currency_helper');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $title; ?></h1>            
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
              <div class="col-12">
                <div class="card">                  
                  <div class="card-body">                    
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-3">
                        <thead>
                          <tr>                            
                            <th style="width: 200px;">Nama Produk</th>                            
                            <th>Kategori</th>
                            <th style="width: 70px;">Harga (Rp)</th>
                            <th>Tanggal dibuat</th>
                            <th style="width: 120px;">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php foreach($productList as $var){ ?>
                                <tr>                                                                
                                    <td><?= $var['name'] ?></td>                                    
                                    <td>
                                      <?php foreach(json_decode($var['category']) as $varx) {?>
                                      <span class="badge badge-secondary mr-1"><?= $varx; ?></span>
                                      <?php } ?>
                                    </td>
                                    <td><?= rupiah($var['price']) ?></td>
                                    <td>
                                      <?php
                                        $date = new DateTime($var['created_date']);
                                        echo $date->format('d-m-Y');                                         
                                      ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('admin/product_create?edit=true&product='.$var['id'])?>" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                        <button productUrl="<?= base_url('admin/do_delete_product?product='.$var['id']) ?>" onclick="delProduct(this, <?= $var['id'] ?>)" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                        <a href="#" class="btn btn-info"><i class="fas fa-expand"></i></a>                                        
                                    </td>
                                </tr>                         
                            <?php } ?>                           
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
<?php $this->load->view('dist/_partials/footer'); ?>