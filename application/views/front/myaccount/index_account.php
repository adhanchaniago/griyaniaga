<?php if ($this->session->userdata('id')) : ?>


  <div class="container">
    <div class="account-page">
      <div class="row">


        <div class="col-sm-6 col-md-4">
      <div class="card card-stats card-primary card-round">
        <div class="card-body">
          <div class="row">
            <div class="col-5">
              <div class="display-4 text-center text-primary">
                <i class="ri-honour-line"></i>
              </div>
            </div>
            <div class="col col-stats">
              <div class="numbers">
                <p class="card-category">Iklan tayang</p>
                <h4 class="card-title">1,294</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-4">
      <div class="card card-stats card-info card-round">
        <div class="card-body">
          <div class="row">
            <div class="col-5">
              <div class="display-4 text-center text-warning">
                <i class="ri-folder-warning-line"></i>
              </div>
            </div>
            <div class="col col-stats">
              <div class="numbers">
                <p class="card-category">Iklan Pending</p>
                <h4 class="card-title">1303</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-4">
      <div class="card card-stats card-success card-round">
        <div class="card-body ">
          <div class="row">
            <div class="col-5">
              <div class="display-4 text-center text-success">
                <i class="ri-price-tag-3-line"></i>
              </div>
            </div>
            <div class="col col-stats">
              <div class="numbers">
                <p class="card-category">Iklan Sold</p>
                <h4 class="card-title">$ 1,345</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


        <div class="col-md-12">
          <div class="card">
            <div class="card-header order-success">
              <i class="ri-folder-user-line"></i> Iklan Saya
              <div class="pull-right">
                  <a class="btn btn-info text-white" href="<?php echo base_url('myaccount/create');?>"><i class="ti-plus"></i> Pasang Iklan</a>
              </div>
            </div>

            <?php
            //Notifikasi
            if ($this->session->flashdata('message')) {
              echo '<div class="alert alert-success alert-dismissable fade show">';
              echo '<button class="close" data-dismiss="alert" aria-label="Close">×</button>';
              echo $this->session->flashdata('message');
              echo '</div>';
            }


            ?>

            <div class="card-body">
              <div class="row">







<?php foreach ($property as $property):?>


<div class="col-md-12">
<div class="card-line">
                    <div class="card-body">
                      <div class="row">

                  <div class="col-md-2">
                    <img src="<?php echo base_url('assets/img/property/'.$property->property_image);?>" class="card-img-top" alt="<?php echo $property->property_title; ?>">
                  </div>

                  <div class="col-md-7">
                    <h3 class="text-secondary"><a href=""> <?php echo substr($property->property_title, 0, 25); ?></a></h3>
                    <div class="text-primary display-1"><h4> Rp <?php echo number_format($property->property_price, '0', ',', '.');?></h4> </div>
                    <div class="">23/02/2021</div>
                  </div>

                  <div class="col-md-2 text-center">
                    <a href="" class="btn btn-info btn-sm text-white" type="submit"><i class="ri-eye-line"></i> </a>
                    <a href="" class="btn btn-warning btn-sm text-white" type="submit"><i class="ri-file-edit-line"></i> </a>
                    <a href="" class="btn btn-danger btn-sm text-white" type="submit"><i class="ri-delete-bin-6-line"></i> </a>
                  </div>
                </div>
              </div>
              </div>
            </div>

<?php endforeach;?>
					</div>

          <div class="pagination col-md-12 text-center">
              <?php if (isset($pagination)) {
                  echo $pagination;
              } ?>
          </div>



              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



<?php else : ?>

  <?php redirect('auth'); ?>


<?php endif; ?>
