<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BAUM</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <div class="container">
                    <img class="img-profile rounded-circle" src="<?= base_url('assets/'); ?>img/logo.png" style="width: 60px">
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link" href="<?= base_url('auth'); ?>" id="userDropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Login</span>

                            </a>

                        </li>
                    </ul>
                </div>
            </nav>

            <?php
            $queryProses = " SELECT * FROM app_archive WHERE  nomor_surat like '$_POST[nomor_surat]' LIMIT 2 ";
            $arsipp = $this->db->query($queryProses)->result_array();
            ?>

            <div class="container">
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data <?= $title ?></h6>
                    </div>
                    <div class="card-body">
                        <a href="javascript:window.history.go(-1);" class="btn btn-warning btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-backward"></i>
                            </span>
                            <span class="text">Back</span>
                        </a>
                        <br> <br>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Nomor Archive</th>
                                        <th>Hal</th>
                                        <th>Kepentingan</th>
                                        <th>Tujuan</th>
                                        <th>unit</th>
                                        <th>Tanggal Buat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($arsipp as $ars) : ?><tr>
                                            <td><?= $ars['id']; ?></td>
                                            <td><?= $ars['id']; ?><?= $ars['kode_surat']; ?></td>
                                            <td><?= $ars['hal']; ?></td>
                                            <td><?= $ars['jenis_archive']; ?></td>
                                            <td><?= $ars['tujuan']; ?></td>
                                            <td><?= $ars['unit_created']; ?></td>
                                            <td><?= $ars['date_created']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
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

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/'); ?>js/demo/saya.js"></script>
    <script src="<?= base_url(); ?>assets/sweetalert/dist/sweetalert2.all.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/mySweetAlert.js"></script>


    <!-- <script type="text/javascript" src="<?= base_url(); ?>assets/cam/js/jquery.js"></script> -->
    <script type="text/javascript" src="<?= base_url(); ?>assets/cam/js/qrcodelib.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/cam/js/webcodecamjquery.js"></script>
    <script type="text/javascript">
        var arg = {
            resultFunction: function(result) {

                var redirect = '<?= base_url('cek/view'); ?>';
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
</body>

</html>