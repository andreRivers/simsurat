<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash_a'); ?>"></div>
	<?php if ($this->session->flashdata('flash_a')) : ?>

	<?php endif; ?>

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">UPLOAD</h6>
		</div>

		<div class="card-body">
			<div class="form-group">
				<h4 for="usr">
					<center> Telusuri Surat Administrtasi UMSU</center>
				</h4>
				<form method="POST" action="<?= base_url('archive/keywordView'); ?>">
					<input type="text" class="form-control" id="keyword" name="keyword" required>
			</div>
			<center>
				<button type="submit" class="btn btn-success btn-icon-split">
					<span class="icon text-white-50">
						<i class="fas fa-search"></i>
					</span>
					<span class="text">Search</span>
				</button>
			</center>
			</form>
		</div>
	</div>
</div>

</div>

<!-- /.container-fluid -->
