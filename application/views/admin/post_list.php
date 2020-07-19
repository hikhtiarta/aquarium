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

          <div class="section-body">                        
            <div class="row">
              <div class="col-12">
                <div class="card">                  
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-2">
                        <thead>
                          <tr>                            
                            <th style="width: 300px;">Title</th>
                            <th>Category</th>
                            <th>Likes</th>
                            <th>Share</th>
                            <th>Created Date</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php foreach($postList as $var){ ?>
                                <tr>                                                                
                                    <td><?= $var['title'] ?></td>
                                    <td style="text-transform: capitalize"><?= $var['category'] ?></td>
                                    <td><?= $var['likes'] ?></td>
                                    <td><?= $var['share'] ?></td>
                                    <td><?= $var['created_date'] ?></td>
                                    <td>
                                        <a href="<?= base_url('admin/post_create?edit=true&post='.$var['id']) ?>" class="btn btn-primary">Edit</a>
                                        <button postUrl="<?= base_url('admin/do_delete_post?post='.$var['id']) ?>" id="swal-delete_post_<?= $var['id'] ?>" class="btn btn-danger">Delete</button>
                                        <a href="#" class="btn btn-info">View</a>                                        
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