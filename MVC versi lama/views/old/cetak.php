<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>

    <body>
        <table border="6" cellpadding="80" cellspacing="0" width="100%">
            <tr>
                <td>
                    <table width="100%">

                        <tr>
                            <td colspan="3">
                                <center>
                                    <img src="<?= base_url('assets/img/qrcode/'); ?><?= $arsip['qrcode']; ?>.png" style="width:90px">
                                    <p>Copy dengan cara klik kanan pilih copy image kemudian pindahkan ke lembar kerja anda</p>
                                    <h3>NOMOR SURAT : <?= $arsip['nomor_surat']; ?></h3>

                                </center>
                            </td>
                        </tr>

                    </table>
            </tr>
        </table>
    </body>

</html>