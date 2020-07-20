<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">            

            <div class="card card-primary">
              <div class="card-header"><h4>Ganti Password</h4></div>
              <div class="card-body">                
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
                <form method="POST" action="<?= base_url('admin/do_change_password'); ?>">                 
                  <div class="form-group">
                    <label for="password">Password Baru</label>
                    <input id="password" type="password" class="form-control pwstrength" name="newps" required autofocus>                    
                  </div>
                  <div class="form-group">
                    <label for="password-confirm">Konfirmasi Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="confps" required>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Reset Password
                    </button>
                  </div>
                </form>
              </div>
            </div>            
          </div>
        </div>
      </div>
    </section>
  </div>

<?php $this->load->view('dist/_partials/js'); ?>