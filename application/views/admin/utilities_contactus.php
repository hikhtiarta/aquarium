<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">  
          <div class="section-header">
            <h1><?= $title; ?></h1>            
          </div>     
          <div class="section-body">                        
            <div class="row">
              <div class="col-12">
                <div class="card">                  
                  <div class="card-body">                  
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-4">
                        <thead>
                          <tr>                            
                            <th style="width: 300px;">Nama</th>                            
                            <th>Email</th>
                            <th>Pesan</th>
                            <th>Tanggal dibuat</th>                            
                          </tr>
                        </thead>
                        <tbody>
                            <?php foreach($contactUsList as $var){ ?>
                                <tr>                                                                
                                    <td><?= $var['name'] ?></td>                                    
                                    <td><?= $var['email'] ?></td>
                                    <td><?= $var['message'] ?></td>
                                    <td>
                                      <?php
                                        $date = new DateTime($var['created_date']);
                                        echo $date->format('d-m-Y');                                         
                                      ?>
                                    </td>                                    
                                </tr>                         
                            <?php } ?>                           
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
<?php $this->load->view('dist/_partials/footer'); ?>