<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
      <footer class="main-footer">
        <div class="row">
          <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <p class="footer-title mb-2" style="font-size:20px"><strong>AQUAWABISABI</strong></p>
            <p class="text-muted">When nature become our passion</p>            
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <p class="footer-title mb-2"><strong>Explore</strong></p>
            <a class="footer-link" href="<?= base_url() ?>">Home</a>
            <a class="footer-link" href="<?= base_url('products') ?>">Produk</a>
            <a class="footer-link" href="<?= base_url('post') ?>">Post</a>            
          </div>         
          <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <p class="footer-title mb-2"><strong>Follow</strong></p>
            <a class="footer-link" href="">Instagram</a>
            <a class="footer-link" href="">Facebook</a>            
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <p class="footer-title mb-2"><strong>Alamat</strong></p>
            <p class="text-muted"><?= $address ?></p>    
            <p class="footer-title mb-2"><strong>Kontak</strong></p>
            <p class="text-muted mb-0"><?= $email ?></p>   
            <p class="text-muted"><?= $phone ?></p>    
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="footer-left">
              Copyright &copy; 2020 <div class="bullet"></div> Design By <a href="#">Aquawabisabi.id</a>
            </div>
          </div>
        </div>                        
      </footer>
    </div>
  </div>

<?php $this->load->view('dist/_partials/js-main'); ?>