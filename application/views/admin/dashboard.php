<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('./dist/_partials/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $title; ?></h1>
            <div class="section-header-breadcrumb">              
              <div class="breadcrumb-item"><?= $date?></div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Jumlah Postingan</h4>
                  </div>
                  <div class="card-body">
                    <?= $postList ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>News</h4>
                  </div>
                  <div class="card-body">
                    42
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Reports</h4>
                  </div>
                  <div class="card-body">
                    1,201
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Online Users</h4>
                  </div>
                  <div class="card-body">
                    47
                  </div>
                </div>
              </div>
            </div>                  
          </div>
          <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Postingan</h4>
                </div>
                <div class="card-body">
                  <?php foreach($postinganList as $var){ ?>
                    <div class="mb-4">
                      <div class="text-small float-right font-weight-bold text-muted"><?= $var['likes'] ?></div>
                      <div class="font-weight-bold mb-1 postinganChartTitle"><?= $var['title'] ?></div>
                      <div class="progress" data-height="3">
                        <div class="progress-bar" role="progressbar" data-width="<?= $var['likes'] ?>" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>                          
                    </div>
                  <?php } ?>                                      
                </div>
              </div>                            
            </div>            
          </div>
        </section>
      </div>
<?php $this->load->view('./dist/_partials/footer'); ?>