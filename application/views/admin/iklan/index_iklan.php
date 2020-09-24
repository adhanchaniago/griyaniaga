
<div class="row">

  <div class="col-md-4">
    <a class="btn btn-lg btn-success btn-block" href="<?php echo base_url('admin/iklan/create');?>">
      <i class="ri-building-2-line"></i> <span> Property<br><small>Buat Iklan Property</small></span></a>
    </div>



      <div class="card">
          <div class="card-header">
              <div class="card-header-left">
                  <h5><?php echo $title; ?></h5>
              </div>
              <div class="card-header-right">

              </div>

          </div>
          <div class="card-body">
              <?php
              //Notifikasi
              if ($this->session->flashdata('message')) {
                  echo '<div class="alert alert-success alert-dismissable fade show">';
                  echo '<button class="close" data-dismiss="alert" aria-label="Close">×</button>';
                  echo $this->session->flashdata('message');
                  echo '</div>';
              }
              echo validation_errors('<div class="alert alert-warning">', '</div>');

              ?>
              <hr>
              <div class="table-responsive">
                  <table class="table table-bordered">
                      <thead class="thead-light">
                          <tr>
                              <th>No</th>
                              <th>Judul Iklan</th>

                              <th width="25%">Action</th>
                          </tr>
                      </thead>
                      <?php $no = 1;
                      foreach ($iklan as $iklan) { ?>
                          <tr>
                              <td><?php echo $no; ?></td>
                              <td><?php echo $iklan->iklan_title; ?></td>

                              <td>
                                  <a href="<?php echo base_url('admin/iklan/view/'. $iklan->id); ?>" class="btn btn-success"><i class="ti-eye"></i> Lihat</a>
                                  <a href="<?php echo base_url('admin/iklan/update/' . $iklan->id); ?>" class="btn btn-info"><i class="ti-pencil-alt"></i> Edit</a>
                                  <?php include "delete_iklan.php";?>
                              </td>
                          </tr>

                      <?php $no++;
                      }; ?>
                  </table>

                  <div class="pagination col-md-12 text-center">
                      <?php if (isset($pagination)) {
                          echo $pagination;
                      } ?>
                  </div>

              </div>

          </div>
      </div>
