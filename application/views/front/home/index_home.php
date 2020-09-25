<section class="boot-elemant-bg py-md-5 py-4" style="height: 500px; background-image: linear-gradient(rgba(0,0,0,.0), rgba(0,0,0,.5)), url('assets/img/galery/bg.jpg');">
    <div class="container position-relative py-md-5 py-0">
        <div class="row">
            <div class="container" style="position: absolute;">
                <div class="row">
                    <div class="col-md-6">
                    <img class="img-fluid" src="<?php echo base_url('assets/img/galery/home.png');?>">
                    </div>
                    <div class="col-md-6">
                        <div class="text-center text-white my-auto">
                          <div class="col-sm-12">
                  <form action="" method="get">
                    <div class="row">
                    <div class="col-sm-9">
                      <input type="text" class="form-control input-search form-control-lg" placeholder="Cari Properti.." name="result">
                    </div>
                        <div class="col-sm-3">
                        <input type="submit" name="submit" class="btn btn-outline-success" value="Cari Properti" >
                      </div>
                    </div>

                  </form>
              </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="elemant-bg-overlay black"></div>
</section>

<div class="container">
<div class="row">

  <?php foreach ($property as $property) :?>


    <div class="col-md-4">
    		    <div class="card profile-card-2">
                    <div class="card-img-block">
                        <img src="<?php echo base_url('assets/img/property/'.$property->property_image);?>" alt="Card image cap" />
                    </div>
                    <div class="card-body pt-3">
                      <div class="profile-canvas">
                        <img src="<?php echo base_url('assets/img/avatars/'.$property->user_image);?>" alt="profile-image" class="profile"/>
                      </div>
                        <a href="<?php echo base_url('property/detail/'.$property->property_slug);?>"><h5 class="card-title"><?php echo $property->property_title;?></h5></a>
                        <p class="card-text"><?php echo $property->property_address;?></p>
                        <h3>Rp. <?php echo number_format($property->property_price,'0',',','.');?></h3>
                    </div>
                    <div class="card-footer py-4">
                      <i class="fas fa-bed"></i> <?php echo $property->property_bed;?> Km Tidur  <i class="fas fa-bath"></i> <?php echo $property->property_bath;?> Km Mandi
                    </div>
                </div>
    		</div>

          <?php endforeach;?>



</div>

<div class="pagination col-md-12">
    <?php if (isset($pagination)) {
        echo $pagination;
    } ?>
</div>

</div>
