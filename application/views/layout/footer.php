<!-- Footer -->

<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; UMSU <?= date('Y'); ?></span>
    </div>
  </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->
</div>

<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
      </div>
    </div>
  </div>
</div>



<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>select2/dist/js/select2.full.min.js"></script>
<!-- Page level custom scripts -->
<script src="<?= base_url('assets/'); ?>js/demo/saya.js"></script>
<script src="<?= base_url(); ?>assets/sweetalert/dist/sweetalert2.all.min.js"></script>
<script src="<?= base_url(); ?>assets/js/mySweetAlert.js"></script>


<!-- <script type="text/javascript" src="<?= base_url(); ?>assets/cam/js/jquery.js"></script> -->
<script type="text/javascript" src="<?= base_url(); ?>assets/cam/js/qrcodelib.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/cam/js/webcodecamjquery.js"></script>

<script src="<?= base_url('assets/'); ?>bootstrapSelect/dist/js/bootstrap-select.js"></script>



<script type="text/javascript">
  var arg = {
    resultFunction: function(result) {

      var redirect = '<?= base_url('validasi/cek'); ?>';
      $.redirectPost(redirect, {
        nomor_surat: result.code
      });
    }
  };

  var decoder = $("canvas").WebCodeCamJQuery(arg).data().plugin_WebCodeCamJQuery;
  decoder.buildSelectMenu("select");
  decoder.play();
  /*  Without visible select menu
      decoder.buildSelectMenu(document.createElement('select'), 'environment|back').init(arg).play();
  */
  $('select').on('change', function() {
    decoder.stop().play();
  });

  // jquery extend function
  $.extend({
    redirectPost: function(location, args) {
      var form = '';
      $.each(args, function(key, value) {
        form += '<input type="hidden" name="' + key + '" value="' + value + '">';
      });
      $('<form action="' + location + '" method="POST">' + form + '</form>').appendTo('body').submit();
    }
  });
</script>

<script>
  $(document).ready(function() {
    var i = 1;
    $('#add').click(function() {
      i++;
      $('#dynamic_field').append('<tr id="row' + i + '"><td><input type="text" name="nama[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><input type="text" name="jabatan[]" placeholder="Enter your Jabatan" class="form-control jabatan_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
    });

    $(document).on('click', '.btn_remove', function() {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
    });
    $('#submit').click(function() {
      $.ajax({
        url: "tugas/function/name.php",
        method: "POST",
        data: $('#add_name').serialize(),
        success: function(data) {
          alert(data);
          $('#add_name')[0].reset();
        }
      });
    });
  });
</script>

<script>
  $(document).ready(function() {
    var i = 1;
    $('#addEdit').click(function() {
      i++;
      $('#dynamic_field2').append('<tr id="row' + i + '"><td><input type="text" name="nama[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><input type="text" name="jabatan[]" placeholder="Enter your Jabatan" class="form-control jabatan_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
    });

    $(document).on('click', '.btn_remove', function() {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
    });
    $('#update').click(function() {
      $.ajax({
        url: "tugas/function/edit.php",
        method: "POST",
        data: $('#edit_name').serialize(),
        success: function(data) {
          alert(data);
          window.open('index.php?p=viewTugas', '_self')
        }
      });
    });
  });
</script>

<script>
  function createOptions(number) {
    var options = [],
      _options;

    for (var i = 0; i < number; i++) {
      var option = '<option value="' + i + '">Option ' + i + '</option>';
      options.push(option);
    }

    _options = options.join('');

    $('#number')[0].innerHTML = _options;
    $('#number-multiple')[0].innerHTML = _options;

    $('#number2')[0].innerHTML = _options;
    $('#number2-multiple')[0].innerHTML = _options;
  }

  var mySelect = $('#first-disabled2');

  createOptions(4000);

  $('#special').on('click', function() {
    mySelect.find('option:selected').prop('disabled', true);
    mySelect.selectpicker('refresh');
  });

  $('#special2').on('click', function() {
    mySelect.find('option:disabled').prop('disabled', false);
    mySelect.selectpicker('refresh');
  });

  $('#basic2').selectpicker({
    liveSearch: true,
    maxOptions: 1
  });
</script>

</body>

</html>