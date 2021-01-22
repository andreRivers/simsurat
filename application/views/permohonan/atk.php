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
            <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
			<form name="form" action="<?= base_url('atk/all') ?>" method="post">  
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
						<th> <input type="checkbox" id="select_all" value=""></th>
                            <th>ID</th>
                            <th>Unit</th>
                            <th>Nama Barang</th>
                            <th> <i class="fa fa-cog"></i> </th>
                        </tr>
                    </thead>
                    <tbody>
                  
						<?php 
						foreach ($atk as $at) : ?>
                          
                            <tr>
							<td><input type="checkbox" class="checkbox"  name="checked_id[]" value="<?= $at['id_sementara']; ?>"></td>
                                <td><?= $at['id_sementara']; ?></td>
                                <td><?= $at['unit']; ?></td>
								<td><b><?= $at['nama_barang']; ?></b> 
								<br> <small> Merek : <?= $at['merek']; ?> | Type : <?= $at['type']; ?> | Jumlah Barang <?= $at['jumlah']; ?> <?= $at['satuan']; ?> </small>
								<br> Tanggal Permohonan : <?= $at['tgl_permintaan']; ?>
								</td>
								<td>
								<a href="<?= base_url('atk/setuju/'); ?><?= $at['id_sementara']; ?>"  class="btn btn-success" title="Setuju"> <span class="text text-white"> <i class="fa fa-check"></i> </span> </a>
								<a  href="<?= base_url('atk/tolak/'); ?><?= $at['id_sementara']; ?>"  class="btn btn-danger" title="Tolak"> <span class="text text-white"> <i class="fa fa-times"></i> </span> </a>
            	
								</td>
                                
                               
                            </tr>
							
                        <?php endforeach; ?>
                    </tbody>
                </table>
				<button type="submit" class="btn btn-success" name="setuju" title="Setuju"> <span class="text text-white"> <i class="fa fa-check"></i> Setujui Yang ditandai </span> </button>
				
				<br><br>
				</form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
</div>

