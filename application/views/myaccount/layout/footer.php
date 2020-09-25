</div>
</div>
</div>
</div>
<!--   Core JS Files   -->
<script src="<?php echo base_url('assets/myaccount/js/core/jquery.3.2.1.min.js');?>"></script>
<script src="<?php echo base_url('assets/myaccount/js/core/popper.min.js');?>"></script>
<script src="<?php echo base_url('assets/myaccount/js/core/bootstrap.min.js');?>"></script>

<!-- jQuery UI -->
<script src="<?php echo base_url('assets/myaccount/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js');?>"></script>
<script src="<?php echo base_url('assets/myaccount/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js');?>"></script>

<!-- jQuery Scrollbar -->
<script src="<?php echo base_url('assets/myaccount/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js');?>"></script>

<!-- Moment JS -->
<script src="<?php echo base_url('assets/myaccount/js/plugin/moment/moment.min.js');?>"></script>

<!-- Chart JS -->
<script src="<?php echo base_url('assets/myaccount/js/plugin/chart.js/chart.min.js');?>"></script>

<!-- jQuery Sparkline -->
<script src="<?php echo base_url('assets/myaccount/js/plugin/jquery.sparkline/jquery.sparkline.min.js');?>"></script>

<!-- Chart Circle -->
<script src="<?php echo base_url('assets/myaccount/js/plugin/chart-circle/circles.min.js');?>"></script>

<!-- Bootstrap Notify -->
<script src="<?php echo base_url('assets/myaccount/js/plugin/bootstrap-notify/bootstrap-notify.min.js');?>"></script>

<!-- Bootstrap Toggle -->
<script src="<?php echo base_url('assets/myaccount/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js');?>"></script>
<!-- Sweet Alert -->
<script src="<?php echo base_url('assets/myaccount/js/plugin/sweetalert/sweetalert.min.js');?>"></script>

<!-- Azzara JS -->
<script src="<?php echo base_url('assets/myaccount/js/ready.min.js');?>"></script>






<!-- SUMMERNOTE -->
<link href="<?php echo base_url('assets/admin/js/summernote/summernote-lite.min.css'); ?>" rel="stylesheet">
<script src="<?php echo base_url('assets/admin/js/summernote/summernote-lite.min.js'); ?>"></script>

<script>
    $('#summernote').summernote({
        placeholder: 'Deskripsi Produk ..',
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





<script>
var fnf = document.getElementById("formattedNumberField");
fnf.addEventListener('keyup', function(evt){
    var n = parseInt(this.value.replace(/\D/g,''),10);
    fnf.value = n.toLocaleString();
}, false);
</script>



</body>
</html>
