<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?php echo base_url(); ?>dist/index">Aquawabisabi</a>
          </div>                            
          <ul class="sidebar-menu">                        
            <li class="<?php echo $this->uri->segment(2) == 'dashboard' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/dashboard"><i  class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            <li class="dropdown <?php echo $this->uri->segment(2) == 'post_create' || $this->uri->segment(2) == 'post_list' ? 'active' : ''; ?>">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-file"></i> <span>Post</span></a>
              <ul class="dropdown-menu">                
                <li class="<?php echo $this->uri->segment(2) == 'post_create' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/post_create">Buat Postingan</a></li>                
                <li class="<?php echo $this->uri->segment(2) == 'post_list' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/post_list">Daftar Postingan</a></li>                
              </ul>
            </li>            
            <li class="dropdown <?php echo $this->uri->segment(2) == 'utilities_jenis' ? 'active' : ''; ?>">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-ellipsis-h"></i> <span>Utilities</span></a>
              <ul class="dropdown-menu">                
                <li class="<?php echo $this->uri->segment(2) == 'utilities_jenis' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/utilities_jenis">Jenis Postingan</a></li>                
              </ul>
            </li>            
          </ul>
          
        </aside>
      </div>
