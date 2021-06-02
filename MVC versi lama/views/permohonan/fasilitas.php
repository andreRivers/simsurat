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
			<form name="form" action="<?= base_url('fasilitas/all') ?>" method="post">  
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
						<th> <input type="checkbox" id="select_all" value=""></th>
                            <th>ID</th>
                            <th>Unit</th>
                            <th>Permohonan Fasilitas</th>
                            <th> <i class="fa fa-cog"></i> </th>
                        </tr>
                    </thead>
                    <tbody>
                  
						<?php 
						foreach ($fasilitas as $fas) : ?>
                          
                            <tr>
							<td><input type="checkbox" class="checkbox"  name="checked_id[]" value="<?= $fas['id_booking']; ?>"></td>
                                <td><?= $fas['id_booking']; ?></td>
                                <td><?= $fas['username']; ?></td>
								<td><b><?= $fas['title']; ?> <br>
								Fasilitas : <?= $fas['fasilitas']; ?>
								 </b> 
								<br> <small> Tingkat Kegiatan : <?= $fas['tingkat_kegiatan']; ?> | Mulai Acara : <?= $fas['start_event']; ?> | Selesai Acara <?= $fas['end_event']; ?> 
								<br> Penanggung Jawab : <?= $fas['penanggung_jawab']; ?> </small>
								<br> Tanggal Permohonan : <?= $fas['tgl_permohonan']; ?>
								</td>
								<td>
								<a href="<?= base_url('fasilitas/setuju/'); ?><?= $fas['id_booking']; ?>"  class="btn btn-success" title="Setuju"> <span class="text text-white"> <i class="fa fa-check"></i> </span> </a>
								<a  href="<?= base_url('fasilitas/tolak/'); ?><?= $fas['id_booking']; ?>"  class="btn btn-danger" title="Tolak"> <span class="text text-white"> <i class="fa fa-times"></i> </span> </a>
            	
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

