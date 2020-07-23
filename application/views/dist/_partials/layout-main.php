<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div> 
    <nav class="navbar navbar-expand-lg main-navbar sticky-top">
      <img class="brand-img" src="<?php echo base_url('assets/img/brand6.png')?>" >
    </nav>
</div>

<body class="sidebar-gone">
  <div id="app">    
    <div class="main-wrapper main-wrapper-1">      
      <div class="sticky-top navbar-container">
        <nav class="navbar navbar-expand-lg main-navbar sticky-top">
          <form class="form-inline mr-auto">
            <ul class="navbar-nav mr-3">
              <li id="toggle-sidebar"><a href="#" data-toggle="sidebar-main" class="nav-link nav-link-lg toggle-gone"><i class="fas fa-bars"></i></a></li>                                    
            </ul>          
          </form>
          <ul class="navbar-nav navbar-center">          
            <li class="nav-item <?php if($this->uri->segment(1) == "home" || $this->uri->segment(1) == "") echo "active"; ?>"><a href="<?= base_url() ?>" class="nav-link">Home</a></li>            
            <li class="nav-item <?php if($this->uri->segment(1) == "products") echo "active"; ?>"><a href="<?= base_url('products') ?>" class="nav-link">Produk</a></li>
            <li class="nav-item <?php if($this->uri->segment(1) == "post") echo "active"; ?>"><a href="<?= base_url('post') ?>" class="nav-link">Post</a></li>
            <li class="nav-item <?php if($this->uri->segment(1) == "about") echo "active"; ?>"><a href="<?= base_url('about') ?>" class="nav-link">Tentang Kami<?=$this->uri->segment(3)?></a></li>
          </ul>
        </nav>
        <?php if($this->uri->segment(1) == "products") {?>
          <div class="navbar-2">
            <?php foreach($title as $key=>$var) { if($key==count($title)-1) {?>
              <span class="mr-2"><?= $var; ?></span>
            <?php } else{ ?>
              <a href="" class="navbar-crumbs" ><?= $var ?></a> <span class="ml-2 mr-2">/</span>
            <?php }} ?>          
          </div>
        <?php } ?>
      </div>
