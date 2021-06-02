<style>
.blinking{
    animation:blinkingText 1.2s infinite;
}
@keyframes blinkingText{
    0%{     color: #000;    }
    49%{    color: #000; }
    60%{    color: transparent; }
    99%{    color:transparent;  }
    100%{   color: #000;    }
}
</style>
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
  <div class="row">
    <div class="col-lg-12">

      <!-- Default Card Example -->
			<?php if ($user['role_id'] == '1') { ?>
      <div class="card mb-4">
        <div class="card-header">
          Visi Dan Misi BAUM
        </div>
        <div class="card-body">
          <p style="text-align: justify;">VISI :</p>
          <p style="text-align: justify;">Biro Administrasi Umum Universitas Muhammadiyah Sumatera Utara memiliki visi mewujudkan biro pelayanan Administrasi Umum yang unggul dalam mendukung kelancaran penyelenggaraan dan pengembangan Universitas Muhammadiyah Sumatera Utara berdasarkan Al-Islam dan Kemuhammadiyahan.</p>
          <p style="text-align: justify;">MISI:</p>
          <p style="text-align: justify;">Menyelenggarakan pelayanan administrasi yang cepat, berkualitas, dan ramah untuk menghasilkan daya saing, membangun perguruan yang sehat dan tata kelola yang baik.</p>
        </div>
      </div>
			<?php } ?>

			<?php if ($user['role_id'] == '2') { ?>
      <div class="card mb-4">
        <div class="card-header">
          Visi Dan Misi BAUM
        </div>
        <div class="card-body">
          <p style="text-align: justify;">VISI :</p>
          <p style="text-align: justify;">Biro Administrasi Umum Universitas Muhammadiyah Sumatera Utara memiliki visi mewujudkan biro pelayanan Administrasi Umum yang unggul dalam mendukung kelancaran penyelenggaraan dan pengembangan Universitas Muhammadiyah Sumatera Utara berdasarkan Al-Islam dan Kemuhammadiyahan.</p>
          <p style="text-align: justify;">MISI:</p>
          <p style="text-align: justify;">Menyelenggarakan pelayanan administrasi yang cepat, berkualitas, dan ramah untuk menghasilkan daya saing, membangun perguruan yang sehat dan tata kelola yang baik.</p>
        </div>
      </div>
			<?php } ?>

			<?php if ($user['role_id'] == '5') { ?>
      <div class="card mb-4">
        <div class="card-header">
          Visi Dan Misi BAUM
        </div>
        <div class="card-body">
          <p style="text-align: justify;">VISI :</p>
          <p style="text-align: justify;">Biro Administrasi Umum Universitas Muhammadiyah Sumatera Utara memiliki visi mewujudkan biro pelayanan Administrasi Umum yang unggul dalam mendukung kelancaran penyelenggaraan dan pengembangan Universitas Muhammadiyah Sumatera Utara berdasarkan Al-Islam dan Kemuhammadiyahan.</p>
          <p style="text-align: justify;">MISI:</p>
          <p style="text-align: justify;">Menyelenggarakan pelayanan administrasi yang cepat, berkualitas, dan ramah untuk menghasilkan daya saing, membangun perguruan yang sehat dan tata kelola yang baik.</p>
        </div>
      </div>
			<?php } ?>


			<?php if ($user['role_id'] == '3') { ?>
			   <!-- Default Card Example -->
				 <div class="card mb-4">
        <div class="card-header bg-success text-white">
				<span class="blinking"><b>Informasi Fitur !!!</b></span>
        </div>
        <div class="card-body">
				<ul style="list-style-type: square;">
				<li><strong>Fitur Upload;&nbsp;</strong><br>Fitur ini sudah dapat digunakan, untuk cara penggunaanya hanya mengetikan nomor surat saja.</li>
				<br>
				<li><strong>Fitur Keyword;&nbsp;</strong><br>
				Fitur ini Juga sudah dapat digunakan, fitur keyword berfungsi untuk mencari arsip arsip anda. Cara penggunaanya anda dapat mengetikan nomor Surat Atau Hal Surat</li>
				</ul>

        </div>
      </div>
			<?php } ?>

    </div>
  </div>

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
