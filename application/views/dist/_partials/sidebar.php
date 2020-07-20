<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#">Aquawabisabi</a>
          </div>                            
          <ul class="sidebar-menu">                        
            <li class="<?php echo $this->uri->segment(2) == 'dashboard' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/dashboard"><i  class="fas fa-fire"></i> <span>Dashboard</span></a></li>            
            <li class="dropdown <?php echo $this->uri->segment(2) == 'page_about' || $this->uri->segment(2) == 'page_home' ? 'active' : ''; ?>">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-file"></i> <span>Page</span></a>
              <ul class="dropdown-menu">                
                <li class="<?php echo $this->uri->segment(2) == 'page_home' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/page_home">Home</a></li>                
                <li class="<?php echo $this->uri->segment(2) == 'page_about' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/page_about">About</a></li>                
              </ul>
            </li>  
            <li class="dropdown <?php echo $this->uri->segment(2) == 'post_create' || $this->uri->segment(2) == 'post_list' ? 'active' : ''; ?>">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-newspaper"></i> <span>Post</span></a>
              <ul class="dropdown-menu">                
                <li class="<?php echo $this->uri->segment(2) == 'post_create' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/post_create">Buat Postingan</a></li>                
                <li class="<?php echo $this->uri->segment(2) == 'post_list' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/post_list">Daftar Postingan</a></li>                
              </ul>
            </li>
            <li class="dropdown <?php echo $this->uri->segment(2) == 'product_create' || $this->uri->segment(2) == 'product_list' ? 'active' : ''; ?>">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-store"></i> <span>Produk</span></a>
              <ul class="dropdown-menu">                
                <li class="<?php echo $this->uri->segment(2) == 'product_create' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/product_create">Buat Produk</a></li>                
                <li class="<?php echo $this->uri->segment(2) == 'product_list' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/product_list">Daftar Produk</a></li>                
              </ul>
            </li>             
            <li class="dropdown <?php echo $this->uri->segment(2) == 'utilities_category' ? 'active' : ''; ?>">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-ellipsis-h"></i> <span>Utilities</span></a>
              <ul class="dropdown-menu">                
                <li class="<?php echo $this->uri->segment(2) == 'utilities_category' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/utilities_category">Jenis Produk</a></li>                
              </ul>
            </li>            
          </ul>
          
        </aside>
      </div>
