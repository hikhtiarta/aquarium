<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
      <footer class="main-footer">
        <div class="row">
          <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <p class="footer-title mb-2" style="font-size:20px"><strong class="font-futura-medium">AQUAWABISABI</strong></p>
            <p class="text-muted">When nature become our passion</p>   
            <p> <div id="map-container-google-2" class="z-depth-1-half map-container">
                <iframe class="location-maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.296750902128!2d106.83818511529519!3d-6.2245478626962685!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f7b590cefe15%3A0x23186dc3ec11369a!2sPT%20IDStar%20Cipta%20Teknologi!5e0!3m2!1sen!2sid!4v1595494297870!5m2!1sen!2sid" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </p>         
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <p class="footer-title mb-2"><strong class="font-futura-medium">Explore</strong></p>
            <a class="footer-link" href="<?= base_url() ?>">Home</a>
            <a class="footer-link" href="<?= base_url('products') ?>">Produk</a>
            <a class="footer-link" href="<?= base_url('post') ?>">Post</a>            
          </div>         
          <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <p class="footer-title mb-2"><b class="font-futura-medium">Follow</b>
            <a class="footer-link" href="">Instagram</a>
            <a class="footer-link" href="">Facebook</a>
            <a class="footer-link" href="">Tokopedia</a>
            <a class="footer-link" href="//api.whatsapp.com/send?phone==+62 81297991631&text=">Whatapps</a>               
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <p class="footer-title mb-2"><strong class="font-futura-medium">Alamat</strong></p>
            <p class="text-muted"><?= $address ?></p>    
            <p class="footer-title mb-2"><strong class="font-futura-medium">Kontak</strong></p>
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
  <div class="float-whatapps">
  <a href="//api.whatsapp.com/send?phone==+62 81297991631&text=">
<img class="icon-wa" src="<?php echo base_url('assets/img/walogo.png')?>"> </a>
<span class="tooltiptext">Contact Us</span>
</div>

<?php $this->load->view('dist/_partials/js-main'); ?>