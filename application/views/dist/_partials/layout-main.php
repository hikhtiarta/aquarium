<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body class="sidebar-gone">
  <div id="app">    
    <div class="main-wrapper main-wrapper-1">      
      <div class="sticky-top">
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
        <div class="">
          dasdasdas
        </div>
      </div>
