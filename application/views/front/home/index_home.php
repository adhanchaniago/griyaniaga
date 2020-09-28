<section class="boot-elemant-bg py-md-5 py-4" style="height: 500px; background-image: linear-gradient(rgba(0,0,0,.3), rgba(0,0,0,.5)), url('assets/img/galery/bg.jpg');">
  <div class="container position-relative py-md-5 py-0">
    <div class="row">
      <div class="container" style="position: absolute;">
        <div class="search_home">
          <form>
            <div class="inner-form">
              <div class="input-field first-wrap">
                <div class="svg-wrapper">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
                  </svg>
                </div>
                <input id="search" type="text" placeholder="Apa yang anda Cari?" />
              </div>
              <div class="input-field second-wrap">
                <button class="btn-search" type="button">SEARCH</button>
              </div>
            </div>
            <span class="info">Rumah dijual, Sewa, Ruko, Apartemen</span>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="elemant-bg-overlay black"></div>
</section>

<!-- End Header -->

<section>
<div class="box">
  <div class="container">


             <div class="col-xl-12">
                <div class="section-title text-center mb-60">
                   <p>Tempat Terbaik untuk mencari dan menjual property</p>
                   <h2>Layanan</h2>
                </div>
             </div>


    <div class="row">



      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="card box-part text-center">
          <div class="card-body">
            <i class="ri-building-2-line fa-3x text-info" aria-hidden="true"></i>
            <div class="title">
              <h4>Cari Properti</h4>
            </div>
            <div class="text">
              <span>Cari Property sesuai dengan bdget dan wilayah.</span>
            </div>

          </div>
        </div>
      </div>


      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="card box-part text-center">
          <div class="card-body">
            <i class="ri-vip-crown-line fa-3x text-success" aria-hidden="true"></i>
            <div class="title">
              <h4>Agen Profesional</h4>
            </div>
            <div class="text">
              <span>Agent Property Profesional dan berpengalaman di bidangnya.</span>
            </div>

          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="card box-part text-center">
          <div class="card-body">
            <i class="ri-service-line fa-3x text-primary" aria-hidden="true"></i>
            <div class="title">
              <h4>Beli dan Jual Properti</h4>
            </div>
            <div class="text">
              <span>Tempat yang pas untuk mencari atau menjual property anda.</span>
            </div>

          </div>
        </div>
      </div>











    </div>
  </div>
</div>
</section>


<section class="bg-white">
<div class="container">

  <div class="col-xl-12">
     <div class="section-title text-center mb-60">
        <p>Property Paling Banyak di lihat</p>
        <h2>Property Populer</h2>
     </div>
  </div>

  <div class="row">

    <?php foreach ($popular_property as $popular_property) :?>


      <div class="col-md-4">
        <div class="card profile-card-2">
          <div class="card-img-block">
            <img src="<?php echo base_url('assets/img/property/'.$popular_property->property_image);?>" alt="Card image cap" />
          </div>
          <div class="card-body pt-3">
            <div class="profile-canvas">
              <img src="<?php echo base_url('assets/img/avatars/'.$popular_property->user_image);?>" alt="profile-image" class="profile"/>
            </div>
            <a href="<?php echo base_url('property/detail/'.$popular_property->property_slug);?>"><h5 class="card-title"><?php echo $popular_property->property_title;?></h5></a>
            <p class="card-text"><?php echo $popular_property->property_address;?></p>
            <h3>Rp. <?php echo number_format($popular_property->property_price,'0',',','.');?></h3>
          </div>
          <div class="card-footer py-4">
            <i class="fas fa-bed"></i> <?php echo $popular_property->property_bed;?> Km Tidur  <i class="fas fa-bath"></i> <?php echo $popular_property->property_bath;?> Km Mandi
          </div>
        </div>
      </div>

    <?php endforeach;?>



  </div>


</div>
</section>
