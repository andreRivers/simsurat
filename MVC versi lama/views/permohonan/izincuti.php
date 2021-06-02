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
						<th>ID </th>
                  <th>Permohonan Cuti</th>
                  <th>Tanggal Permohonan</th>
                  <th> <i class="fa fa-cog"></i> </th>
                        </tr>
                    </thead>
                    <tbody>
                  
						<?php 
						foreach ($cuti as $cut) : ?>
                          
                            <tr>
							<th> <?= $cut['id_cuti']; ?></th>
                                <td><a href="<?= base_url('profil/viewUser/'); ?><?= $cut['email']; ?>"> <?= $cut['nama']; ?> </a> - <?= $cut['unitKerja']; ?><br>
				 				 <b>Lamanya Cuti : <?= $cut['cutiDiambil']; ?> Hari | Tanggal Mulai Cuti : <?= date("d F Y", strtotime($cut['tglCuti'])); ?> 
				 				 <br>Tanggal Selesai Cuti :<?= date("d F Y", strtotime($cut['tglSelesaiCuti'])); ?> | Tanggal Masuk Kerja :<?= date("d F Y", strtotime($cut['tglMasuk'])); ?> </b>
				 				 <br><small> Alasan :  <?= $cut['alasan']; ?> 	</small>
				 				 <br> Status :
				 			 <?php
                    			if ( $cut['sts'] == 1) {
                        				echo '<span class="badge badge-pill badge-info">Permohonan Terkirim</span>';
                   				 } elseif ( $cut['sts'] == 2) {
                       				 echo '<span class="badge badge-pill badge-primary">Permohonan Sedang Diproses</span>';
                   				 } elseif ( $cut['sts'] == 3) {
                        				echo '<span class="badge badge-pill badge-success">Permohonan Disetujui</span>';
                   				 } elseif ( $cut['sts'] == 4) {
										echo '<span class="badge badge-pill badge-danger">Permohonan Ditolak</span>';
								 } elseif ( $cut['sts'] == 5) {
                       				 echo '<span class="badge badge-pill badge-danger">Membatalkan Permohonan</span>';
                  				 }
							?>  
							<br>
							<a href="<?= base_url('assets/scan/'); ?><?=  $cut['scan'];  ?>" target="_blank"><span class="label label-danger">*Lampiran</span></a>
							</td>
							<td> <?= date("d F Y", strtotime($cut['tglPengajuan'])); ?></td>
							<td>
								<a href="<?= base_url('izincuti/setuju/'); ?><?= $cut['id_cuti']; ?>"  class="btn btn-success" title="Setuju"> <span class="text text-white"> <i class="fa fa-check"></i> </span> </a>
								<a  href="<?= base_url('izincuti/tolak/'); ?><?= $cut['id_cuti']; ?>"  class="btn btn-danger" title="Tolak"> <span class="text text-white"> <i class="fa fa-times"></i> </span> </a>
            	
								</td>
                                
                               
                            </tr>
							
                        <?php endforeach; ?>
                    </tbody>
                </table>
				
				
				<br><br>
				</form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
</div>
