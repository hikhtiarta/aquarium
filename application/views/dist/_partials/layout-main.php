<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div id="brand-navbar"> 
    <nav class="navbar navbar-expand-lg main-navbar sticky-top" style="justify-content: center;">
      <span style="color: #fff; letter-spacing: 5px">AQUAWABISABI</span>
    </nav>
</div>

<body class="sidebar-gone">
  <div class="modal fade" id="searchpg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">       
        <div class="modal-body pd-0">
        <form name="searchform" id="" method="get" action="//www.google.co.id/search">
          <div class="form-group mgn-0">
            <div class="input-group">
              <input name="q" class="form-control" type="search" placeholder="Search" aria-label="Search" autofocus>
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>        
              </div>
            </div>
          </div>                              
          <input type="hidden" name="sitesearch" value="aquawabisabi.id"> 
          <input type="hidden" name="domains" value="aquawabisabi.id"> 
          <input type="hidden" name="ie" value="utf-8"> 
          <input type="hidden" name="oe" value="utf-8">           
        </form>
        </div>        
      </div>
    </div>
  </div>
  <div id="app">    
    <div class="main-wrapper main-wrapper-1">      
      <div class="sticky-top navbar-container">
        <nav class="navbar navbar-expand-lg main-navbar sticky-top">          
          <ul class="navbar-nav mr-3">
            <li id="toggle-sidebar"><a href="#" data-toggle="sidebar-main" class="nav-link nav-link-lg toggle-gone"><i class="fas fa-bars"></i></a></li>                          
          </ul>            
          <div id="brand-navbar-sidebar" class="flex-center">
            <span style="color: #fff; letter-spacing: 5px">AQUAWABISABI</span>
          </div>
          <ul class="navbar-nav mr-3">            
            <li><a href="#" data-toggle="modal" data-target="#searchpg" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <ul class="navbar-nav navbar-center">          
            <li class="nav-item <?php if($this->uri->segment(1) == "home" || $this->uri->segment(1) == "") echo "active"; ?>"><a href="<?= base_url() ?>" class="nav-link">Home</a></li>            
            <li class="nav-item <?php if($this->uri->segment(1) == "products") echo "active"; ?>"><a href="<?= base_url('products') ?>" class="nav-link">Produk</a></li>
            <li class="nav-item <?php if($this->uri->segment(1) == "post") echo "active"; ?>"><a href="<?= base_url('post') ?>" class="nav-link">Post</a></li>
            <li class="nav-item <?php if($this->uri->segment(1) == "portfolio") echo "active"; ?>"><a href="<?= base_url('portfolio') ?>" class="nav-link">Portofolio</a></li>
            <li class="nav-item <?php if($this->uri->segment(1) == "about") echo "active"; ?>"><a href="<?= base_url('about') ?>" class="nav-link">Tentang Kami</a></li>
            <li class="nav-item"><a href="#" class="nav-link" data-toggle="modal" data-target="#searchpg"><i class="fas fa-search"></i></a></li>            
          </ul>          
        </nav>
        <?php if($this->uri->segment(1) == "products" || $this->uri->segment(1) == "post") {?>
          <div class="navbar-2">
            <?php foreach($breadCrumbs as $key=>$var) { if($key==count($breadCrumbs)-1) {?>
              <span class="mr-2"><?= $var['title']; ?></span>
            <?php } else{ ?>
              <a href="<?= $var['url'] ?>" class="navbar-crumbs" ><?= $var['title'] ?></a> <span class="ml-2 mr-2">/</span>
            <?php }} ?>          
          </div>
        <?php } ?>
      </div>
