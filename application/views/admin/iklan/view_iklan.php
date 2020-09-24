<?php echo $iklan->iklan_title;?><br>
<?php foreach ($gambar as $gambar) {?>

  <img src="<?php echo base_url('assets/img/iklan/'.$gambar->file);?>"><br>

<?php }; ?>
