<style>
.fab {
   width: 70px;
   height: 70px;
   background-color: red;
   border-radius: 50%;
   box-shadow: 0 6px 10px 0 #666;
   transition: all 0.1s ease-in-out;
 
   font-size: 50px;
   color: white;
   text-align: center;
   line-height: 70px;
 
   position: fixed;
   right: 50px;
   bottom: 50px;
}
 
.fab:hover {
   box-shadow: 0 6px 14px 0 #666;
   transform: scale(1.05);
}
</style>

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
			<h6 class="m-0 font-weight-bold text-primary">Tampilkan Data Berdasarkan Tahun</h6>
		</div>
		<div class="card-body">
		
		<form class="form-inline" method="post" action="<?= base_url('arsipLuar/viewBaris'); ?>">

		<label for="email" class="mr-sm-2">Tahun:</label>
		<select name="tahun" id="tahun" class="form-control mb-2 mr-sm-4" required>
    		<option selected disabled value="">Pilih tahun</option>
			<option value="2021">2021</option>
			<option value="2020">2020</option>
    		<option value="2019">2019</option>
    		<option value="2018">2018</option>
    		<option value="2017">2017</option>
			<option value="2016">2016</option>
			<option value="2015">2015</option>
  		</select>

		<label for="pwd" class="mr-sm-2">Baris:</label>
		<select name="baris" id="baris" class="form-control mb-2 mr-sm-4" required>
    		<option selected disabled value="">Pilih baris</option>
    		<option value="10">10</option>
    		<option value="30">30</option>
    		<option value="50">50</option>
			<option value="100">100</option>
			<option value="200">200</option>
  		</select>
		
		<button type="submit" class="btn btn-primary mb-2">Tampilkan</button>
</form>



		</div>
		<div class="fab"><a  data-toggle="modal" data-target="#tambahData" >+</a> </div>
	
</div>
</div>
</div>
<!-- /.container-fluid -->
