<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html> 
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?php echo $title; ?> &mdash; Aquawabisabi</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
<?php
if ($this->uri->segment(2) == "" || $this->uri->segment(2) == "home") { ?>
  
<?php
}elseif ($this->uri->segment(2) == "about") { ?>
  
<?php
}elseif ($this->uri->segment(2) == "product") { ?>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/chocolat/dist/css/chocolat.css">
<?php
} ?>

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style-main.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/components.css">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<?php
if ($this->uri->segment(2) == "" ||  
    $this->uri->segment(2) == "home" ||    
    $this->uri->segment(2) == "about" || 
    $this->uri->segment(2) == "product" ||  
    $this->uri->segment(2) == "post" ) {
  $this->load->view('dist/_partials/layout-main');
  $this->load->view('dist/_partials/sidebar-main');
}
?>
