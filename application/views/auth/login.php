<!DOCTYPE html>
<html>

<head>
    <title>Administrasi UMSU</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/loginNew/'); ?>css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/icon" href="<?= base_url('assets/'); ?>img/px.png">
</head>

<body>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash_login'); ?>"></div>
    <?php if ($this->session->flashdata('flash_login')) : ?>

    <?php endif; ?>
    <img class="wave" src="<?= base_url('assets/loginNew/'); ?>img/wave.png">
    <div class="container">
        <div class="img">
            <img src="<?= base_url('assets/loginNew/'); ?>img/bg.svg">
        </div>
        <div class="login-content">
            <form method="post" action="<?= base_url('auth'); ?>">
                <img src="<?= base_url('assets/loginNew/'); ?>img/avatar.png">
                <h2 class="title">ADMINISTRASI</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Email</h5>
                        <input type="email" class="input" id="email" name="email" required>
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Password</h5>
                        <input type="password" class="input" id="password" name="password" required>
                    </div>
                </div>
                <a href="<?= base_url('cek'); ?>">Scan Barcode?</a>
                <input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="<?= base_url('assets/loginNew/'); ?>js/main.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="<?= base_url(); ?>assets/sweetalert/dist/sweetalert2.all.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/myscript.js"></script>
</body>

</html>