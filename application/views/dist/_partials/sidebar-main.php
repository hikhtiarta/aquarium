<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#">Aquawabisabi</a>
          </div>                            
          <ul class="sidebar-menu">                        
            <li class="<?php echo $this->uri->segment(1) == 'home' || $this->uri->segment(1) == '' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url('home'); ?>"> <span>Home</span></a></li>
            <li class="<?php echo $this->uri->segment(1) == 'products' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url('products'); ?>"> <span>Produk</span></a></li>            
            <li class="<?php echo $this->uri->segment(1) == 'post' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url('post'); ?>"> <span>Post</span></a></li>            
            <li class="<?php echo $this->uri->segment(1) == 'portfolio' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url('portfolio'); ?>"> <span>Portofolio</span></a></li>            
            <li class="<?php echo $this->uri->segment(1) == 'about' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url('about'); ?>"> <span>Tentang Kami</span></a></li>   
                      
          </ul>
          
        </aside>
      </div>
