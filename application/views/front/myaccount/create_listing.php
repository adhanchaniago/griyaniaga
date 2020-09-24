<?php if ($this->session->userdata('id')) : ?>


  <div class="container">
    <div class="account-page">


      <?php
      //Notifikasi
      if ($this->session->flashdata('message')) {
        echo '<div class="alert alert-success alert-dismissable fade show">';
        echo '<button class="close" data-dismiss="alert" aria-label="Close">×</button>';
        echo $this->session->flashdata('message');
        echo '</div>';
      }


      ?>

      <?php
      echo form_open_multipart('myaccount/create');
      ?>


      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header order-success">
              <i class="ri-community-line"></i> Basic Information

            </div>


            <div class="card-body">
              <div class="row">

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Judul Property <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="property_title" placeholder="Judul Property" value="<?php echo set_value('property_title'); ?>"  >
                    <?php echo form_error('property_title', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Status <span class="text-danger">*</span>
                    </label>
                    <select name="property_status" class="form-control form-control-chosen select2_demo_1">
                      <option value="Dijual">Dijual</option>
                      <option value="Disewa">Disewa</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label>Tipe <span class="text-danger">*</span>
                    </label>
                    <select name="type_id" class="form-control form-control-chosen select2_demo_1">
                      <?php foreach ($type as $type):?>
                      <option value="<?php echo $type->id;?>"><?php echo $type->type_name;?></option>
                    <?php endforeach;?>

                    </select>
                  </div>
                </div>



                <div class="col-md-4">
                  <div class="form-group">
                    <label>Luas Tanah <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="property_surfacearea" placeholder="Judul Berita" value="<?php echo set_value('property_surfacearea'); ?>">
                    <?php echo form_error('property_surfacearea', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label>Luas Bangunan <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="property_buildingarea" placeholder="Judul Berita" value="<?php echo set_value('property_buildingarea'); ?>">
                    <?php echo form_error('property_buildingarea', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label>Jumlah lantai <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="property_floor" placeholder="Judul Berita" value="<?php echo set_value('property_floor'); ?>">
                    <?php echo form_error('property_floor', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label>Kamar Tidur <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="property_bed" placeholder="Judul Berita" value="<?php echo set_value('property_bed'); ?>">
                    <?php echo form_error('property_bed', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label>Kamar Mandi <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="property_bath" placeholder="Judul Berita" value="<?php echo set_value('property_bath'); ?>">
                    <?php echo form_error('property_bath', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label>Kamar Pembantu <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="property_bed_maid" placeholder="Judul Berita" value="<?php echo set_value('property_bed_maid'); ?>">
                    <?php echo form_error('property_bed_maid', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label>Kamar Mandi Pembantu <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="property_bath_maid" placeholder="Judul Berita" value="<?php echo set_value('property_bath_maid'); ?>">
                    <?php echo form_error('property_bath_maid', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label>Daya Listrik <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="property_electrical" placeholder="Judul Berita" value="<?php echo set_value('property_electrical'); ?>">
                    <?php echo form_error('property_electrical', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label>Garasi <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="property_garage" placeholder="Judul Berita" value="<?php echo set_value('property_garage'); ?>">
                    <?php echo form_error('property_garage', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label>Sertifikat <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="property_certificate" placeholder="Judul Berita" value="<?php echo set_value('property_certificate'); ?>">
                    <?php echo form_error('property_certificate', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>
              </div>

            </div>
          </div>

          <div class="card">
            <div class="card-header order-success">
              <i class="ri-image-edit-line"></i> Informasi Property
            </div>
            <div class="card-body">
              <div class="row">

                <div class="col-md-8">
                  <div class="form-group">
                    <label>Harga Property<span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="property_price" placeholder="Judul Berita" value="<?php echo set_value('property_price'); ?>">
                    <?php echo form_error('property_price', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label>Nego <span class="text-danger">*</span>
                    </label>
                    <select name="property_negotiable" class="form-control form-control-chosen select2_demo_1">
                      <option value="Nego">Nego</option>
                      <option value="Fix">Fix</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-12">
                <div class="form-group">
                  <label>Deskripsi <span class="text-danger">*</span></label>
                  <textarea id="summernote" name="property_desc"></textarea>
                </div>
              </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label>Kata Kunci<span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="property_keywords" placeholder="Judul Berita" value="<?php echo set_value('property_keywords'); ?>">
                    <?php echo form_error('property_keywords', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>


              </div>
            </div>
          </div>


        </div>


          <div class="col-md-4">
          <div class="card">
            <div class="card-header order-success">
              <i class="ri-image-edit-line"></i> Gambar
            </div>
            <div class="card-body">
              <div class="form-group">
                <input type="file" name="property_image" >
              </div>
                <?php for ($i=1; $i <=3 ; $i++) :?>

                <div class="form-group">
                <input type="file" name="images<?php echo $i;?>" >

              </div>


                <?php endfor;?>


            </div>
          </div>



          <div class="card">
            <div class="card-header order-success">
              <i class="ri-map-pin-line"></i> Lokasi
            </div>
            <div class="card-body">
              <div class="row">

                <div class="col-md-12">
                  <div class="form-group">
                    <label>Provinsi <span class="text-danger">*</span>
                    </label>
                    <select name="province" id="province" class="form-control form-control-chosen select2_demo_1">
                      <option value="">No Selected</option>
                      <?php foreach ($province as $province) :?>

                      <option value="<?php echo $province->id;?>"><?php echo $province->province_name;?></option>
                    <?php endforeach;?>

                    </select>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
				    <label>Kota</label>
				    <select class="form-control" id="city" name="city">
				    	<option value="">No Selected</option>

				    </select>
				</div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label>Alamat <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="property_address" placeholder="Judul Berita" value="<?php echo set_value('property_address'); ?>">
                    <?php echo form_error('property_address', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>
















              </div>
            </div>
          </div>

          </div>


<div class="col-md-8">

<button class="btn btn-primary btn-lg btn-block" type="submit"> Pasang Iklan </button>

        </div>










      </div>

<?php echo form_close() ?>


        </div>
      </div>






<?php else : ?>

  <?php redirect('auth'); ?>


<?php endif; ?>
