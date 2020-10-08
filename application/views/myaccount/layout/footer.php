</div>
<!---Container Fluid-->
</div>
<!-- Footer -->
<footer class="sticky-footer bg-white mt-3">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Application Version 1.0
            </span>
        </div>
    </div>
</footer>
<!-- Footer -->
</div>
</div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<script src="<?php echo base_url('assets/admin/vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/js/myscript.min.js') ?>"></script>


<script src="<?php echo base_url('assets/template/js/chosen.jquery.min.js'); ?>"></script>

<!-- AUTOCOMPLETE -->
<script src="<?php echo base_url('assets/admin/js/autocomplete/jquery-3.3.1.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/js/autocomplete/jquery-ui.js'); ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $('#donatur_name').autocomplete({
            source: "<?php echo base_url('admin/home/get_autocomplete'); ?>",

            select: function(event, ui) {
                $('[name="donatur_name"]').val(ui.item.label);
                $('[name="donatur_phone"]').val(ui.item.donatur_phone);
            }
        });

    });
</script>

<!-- SUMMERNOTE -->
<link href="<?php echo base_url('assets/admin/js/summernote/summernote-lite.min.css'); ?>" rel="stylesheet">
<script src="<?php echo base_url('assets/admin/js/summernote/summernote-lite.min.js'); ?>"></script>

<script type="text/javascript">
        $(document).ready(function(){
            $('#summernote').summernote({
                height: "300px",

            });
        });

    </script>

<!-- END SUMMERNOTE -->



<!-- Image Upload preview -->
<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script> -->
<script>
$('input[type="file"]').each(function(){

	  var $file = $(this),
	      $label = $file.next('label'),
	      $labelText = $label.find('span'),
	      labelDefault = $labelText.text();

	  $file.on('change', function(event){
	    var fileName = $file.val().split( '\\' ).pop(),
	        tmppath = URL.createObjectURL(event.target.files[0]);
	    if( fileName ){
	      $label
	        .addClass('file-ok')
	        .css('background-image', 'url(' + tmppath + ')');
	      $labelText.text(fileName);
	    }else{
	      $label.removeClass('file-ok');
	      $labelText.text(labelDefault);
	    }
	  });

	});

</script>



<!-- Format Number -->
<script>
var fnf = document.getElementById("formattedNumberField");
fnf.addEventListener('keyup', function(evt){
    var n = parseInt(this.value.replace(/\D/g,''),10);
    fnf.value = n.toLocaleString();
}, false);
</script>



</body>
</html>
