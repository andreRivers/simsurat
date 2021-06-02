<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
  <div class="row">
    <div class="col-lg-12">

      <!-- Default Card Example -->
      <div class="card mb-4">
      <div class="card-header">
          Arsip Fakultas/Unit/lembaga
        </div>
        <div class="card-body">
      <form id="form_validation" action="<?= base_url('master/view'); ?>" method="post">
				<!-- /.box-header -->
				<div class="box-body">
                    <div class="row">
					<div class="col-sm-4">
						<div class="form-line">

                <select class="custom-select" id="email" name="email">
								<option selected disabled value="">Arsip Fakultas/Unit/Lembaga</option>
								<?php foreach ($unit as $pr) : ?>
									<option value="<?= $pr['email']; ?>"><?= $pr['nama']; ?></option>
								<?php endforeach; ?>
							</select>
							<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
					</div>
					<div class="col-sm-4">
						<button class="btn btn-primary" type="submit"> <i class="fa fa-search"></i> Lihat Data</button>
                    </div>
				</div>
			</form>

      </div>

    </div>
  </div>

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
</div>
                                </div>
