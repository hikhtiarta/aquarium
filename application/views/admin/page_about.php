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
            <div class="row mt-sm-4">             
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <form method="post" class="needs-validation" novalidate="" action="<?= base_url('admin/do_set_user') ?>">                    
                    <div class="card-body">
                        <div class="row">                               
                          <div class="form-group col-md-6 col-12">
                            <label>Nama Toko/Perusahaan</label>
                            <input type="text" class="form-control" value="<?= $user['toko_name'] ?>" required="" name="toko_name">
                            <div class="invalid-feedback">
                              Nama Toko required
                            </div>
                          </div>                          
                          <div class="form-group col-md-6 col-12">
                            <label>Nama Pemilik</label>
                            <input type="text" class="form-control" value="<?= $user['name'] ?>" required="" name="name">
                            <div class="invalid-feedback">
                              Nama Pemilik required
                            </div>
                          </div>                          
                        </div>
                        <div class="row">
                          <div class="form-group col-md-7 col-12">
                            <label>Email</label>
                            <input type="email" class="form-control" value="<?= $user['email'] ?>" name="email"/>
                          </div>
                          <div class="form-group col-md-5 col-12">
                            <label>No. HP</label>
                            <input type="tel" class="form-control" value="<?= $user['phone'] ?>" name="phone">
                          </div>
                        </div>
                        <div class="row">                               
                          <div class="form-group col-md-12 col-12">
                            <label>Alamat Toko/Perusahaan</label>
                            <input type="text" class="form-control" value="<?= $user['address'] ?>" required="" name="address">
                            <div class="invalid-feedback">
                              Alamat Toko/Perusahaan Required
                            </div>
                          </div>                                                    
                        </div>
                        <div class="row">
                          <div class="form-group col-12">
                            <label>Bio</label>
                            <textarea class="form-control summernote-simple" name="bio"><?= $user['bio'] ?></textarea>
                          </div>
                        </div>                                                   
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary">Save Changes</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
<?php $this->load->view('dist/_partials/footer'); ?>