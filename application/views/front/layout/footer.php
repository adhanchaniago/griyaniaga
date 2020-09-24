<?php
$meta      = $this->meta_model->get_meta();

?>

<section class="bantuan py-md-3 mt-md-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8 text-light"><span style="font-size:35px;font-weight:700;">Jual, beli, Sewa Property disini</span></div>
            <div class="col-md-4 text-light"><span style="font-size:30px;font-weight:700;"></span></div>
        </div>
    </div>
</section>
<footer class="pt-4 pt-md-5 pb-md-5 border-top bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md">
                <a href="<?php echo base_url(); ?>"><img class="mb-2" src="<?php echo base_url('assets/img/logo/' . $meta->logo) ?>" alt="" width="250"></a>
                <span style="font-size:18px;"><br>
                    <i class="ri-mail-send-line"></i> <?php echo $meta->email ?>
                </span>
            </div>
            <div class="col-6 col-md ml-md-5">
                <h5>Halaman</h5>
                <ul class="list-unstyled text-small">

                    <li><i class="ri-arrow-right-s-line"></i> <a class="text-muted" href="#">Berita Property</a></li>
                    <li><i class="ri-arrow-right-s-line"></i> <a class="text-muted" href="#">Cari Agen Property</a></li>
                    <li><i class="ri-arrow-right-s-line"></i> <a class="text-muted" href="#">Pasang Iklan Gratis</a></li>

                </ul>
            </div>
            <div class="col-5 col-md">
                <h5>Griya Niaga</h5>
                <ul class="list-unstyled text-small">
                    <li><i class="ri-arrow-right-s-line"></i> <a class="text-muted" href="<?php echo base_url('contact') ?>">Tentang Kami</a></li>
                    <li><i class="ri-arrow-right-s-line"></i> <a class="text-muted" href="<?php echo base_url('contact') ?>">Hubungi Kami</a></li>
                    <li><i class="ri-arrow-right-s-line"></i> <a class="text-muted" href="<?php echo base_url('contact') ?>">Kebijakan Privasi</a></li>
                    <li><i class="ri-arrow-right-s-line"></i> <a class="text-muted" href="<?php echo base_url('contact') ?>">Syarat Penggunaan</a></li>
                </ul>
            </div>

        </div>
    </div>
</footer>
<div class="credit text-center text-light py-md-3">Copyright &copy; <?php echo date('Y') ?> - <?php echo $meta->title ?> - <?php echo $meta->tagline ?></div>
<!-- Load javascript Jquery -->
<script src="<?php echo base_url() ?>assets/template/js/jquery.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/template/js/bootstrap.min.js" type="text/javascript"></script>
<!-- <script src="<?php echo base_url() ?>assets/template/js/jquery-1.11.3.min.js"></script> -->
<script src="<?php echo base_url() ?>assets/template/js/chosen.jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/template/assets/js/vendor/popper.min.js"></script>
<script src="<?php echo base_url() ?>assets/template/js/moment-with-locales.js"></script>
<script src="<?php echo base_url() ?>assets/template/js/bootstrap-datetimepicker.js"></script>
<!-- <script src="<?php echo base_url() ?>assets/template/js/timepicker.js"></script> -->




<script>
    $(function() {
        $('#id_tanggal').datetimepicker({
            locale: 'id',
            format: 'D MMMM YYYY',
            minDate: new Date(),
        });
    });
    $('.form-control-chosen').chosen({});
    $('#timepicker').timepicker();
</script>

<script>
$(function() {
  $('#id_tanggal_bayar').datetimepicker({locale:'id', format:'D MMMM YYYY'});
});
</script>



<!-- <script type="text/javascript">
    $('#menu-utama').affix({
        offset: {
            top: 500
        }
    })
</script> -->

<!-- Google Analitycs -->
<?php echo $meta->google_analytics; ?>
<!-- End Google Analitycs -->


<!-- SUMMERNOTE -->
<link href="<?php echo base_url('assets/admin/js/summernote/summernote-lite.min.css'); ?>" rel="stylesheet">
<script src="<?php echo base_url('assets/admin/js/summernote/summernote-lite.min.js'); ?>"></script>

<script>
    $('#summernote').summernote({
        placeholder: 'Deskripsi',
        tabsize: 2,
        height: 130,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
</script>



    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>


    <script type="text/javascript">
/// some script
$(function () {
	  'use strict'

	$("[data-trigger]").on("click", function(){
        var trigger_id =  $(this).attr('data-trigger');
        $(trigger_id).toggleClass("show");
        $('body').toggleClass("offcanvas-active");
    });

    // close if press ESC button
    $(document).on('keydown', function(event) {
        if(event.keyCode === 27) {
           $(".navbar-collapse").removeClass("show");
           $("body").removeClass("overlay-active");
        }
    });

    // close button
    $(".btn-close").click(function(e){
        $(".navbar-collapse").removeClass("show");
        $("body").removeClass("offcanvas-active");
    });


})



</script>

<script>

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById("navbar").style.padding = "5px 4px";
    document.getElementById("logo").style.fontSize = "20px";
  } else {
    document.getElementById("navbar").style.padding = "10px 4px";
    document.getElementById("logo").style.fontSize = "20px";
  }
}
</script>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f02dc8624cb9814"></script>


</body>

</html>
