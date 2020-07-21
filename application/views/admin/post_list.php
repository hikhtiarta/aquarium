<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
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
                      <table class="table table-striped" id="table-2">
                        <thead>
                          <tr>                            
                            <th style="width: 300px;">Judul</th>                            
                            <th>Likes</th>
                            <th>Share</th>
                            <th>Tanggal dibuat</th>
                            <th style="width: 120px;">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php foreach($postList as $var){ ?>
                                <tr>                                                                
                                    <td><?= $var['title'] ?></td>                                    
                                    <td><?= $var['likes'] ?></td>
                                    <td><?= $var['share'] ?></td>
                                    <td>
                                      <?php
                                        $date = new DateTime($var['created_date']);
                                        echo $date->format('d-m-Y');                                         
                                      ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('admin/post_create?edit=true&post='.$var['id']) ?>" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                        <button postUrl="<?= base_url('admin/do_delete_post?post='.$var['id']) ?>" onclick="delPost(this, <?= $var['id'] ?>)" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                        <a href="<?= base_url('post/'.$var['url']) ?>" class="btn btn-info"><i class="fas fa-expand"></i></a>
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