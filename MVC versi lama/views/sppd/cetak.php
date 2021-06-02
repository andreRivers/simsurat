<?php

$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'format' => [210, 330],
    'orientation' => 'P'
]);

$isi='<!DOCTYPE html>
<html>
<head>
    <title>Disposisi</title>
    <style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}

hr {
    border: 1px solid;
  }
  
</style>
    <body>
    <table style="border: 0px solid black;">
    <tr>
      <th style="border: 0px solid black;"><img src="assets/ttd/icon.png" alt="Trulli" width="115" height="110"></th>
      <th style="border: 0px solid black;"> <h4 align="center"> UNIVERSITAS MUHAMMADIYAH SUMATERA UTARA <br>Jalan Kapten Mukhtar Basri No.3 Telp 061 6619056-6622400 <br>Medan-20238 <br>
        <br><u>SURAT PERINTAH PERJALANAN DINAS</u><br>
      Nomor : ' .$data['no_surat'].' </h4></th> 
    </tr>
  
  </table>
  <hr>
    <table>
   <tr> 
     <td style="width:50%">1. Pejabat berwenang yang memberi perintah</td>
     <td style="width:50%"><b> ' .$data['nama'].'  </b></td>
   </tr>

   <tr> 
    <td>2. Nama pejabat/pegawai yang diperintahkan</td>
    <td><b>' . $data['nama_pegawai'] .'</b></td>
</tr>
    <tr> 
    <td style="padding: 5px 20px;"> a. Pangkat Dan Golongan</td>
    <td>' . $data['pangkat_pegawai'].'</td>
</tr>

 <tr> 
    <td style="padding: 5px 20px;"> b. Jabatan</td>
    <td>' . $data['jabatan_pegawai'] .'</td>
</tr>

 <tr> 
    <td style="padding: 5px 20px;"> c. Tingkat Menurut Peraturan Perjalanan Dinas</td>
    <td>' . $data['tingkat_pd'].'</td>
</tr>

    <tr> 
    <td>3. Nama pejabat/pegawai yang diperintahkan</td>
    <td>' . $data['nama_pegawai2'].'</td>
</tr>

  <tr> 
    <td style="padding: 5px 20px;"> a. Pangkat Dan Golongan</td>
    <td>' . $data['pangkat_pegawai2'].'</td>
</tr>

 <tr> 
    <td style="padding: 5px 20px;"> b. Jabatan</td>
    <td>' . $data['jabatan_pegawai2'].'</td>
</tr>

 <tr> 
    <td style="padding: 5px 20px;"> c. Tingkat Menurut Peraturan Perjalanan Dinas</td>
    <td>' . $data['tingkat_pd2'].'</td>
</tr>

 <tr> 
    <td> 4. Maksud Perjalanan Dinas</td>
    <td style="text-align: left; width=300px;"><p align="justify">' . $data['tujuan_pd'].'</p></td>
</tr>

 <tr> 
    <td> 5. Alat Angkut Yang Digunakan</td>
    <td style="text-align: left; width=300px;">' . $data['alat_angkutan'].'</td>
</tr>

 <tr> 
    <td> 6.Lama Perjalanan</td>
    <td style="text-align: left; width=300px;">' . $data['lama_perjalanan'].'</td>
</tr>

 <tr> 
    <td style="padding: 5px 16px;"> a. Tanggal Berangkat</td>
    <td>' . date('d F Y',strtotime($data['tgl_berangkat'])) .' </td>
</tr>

 <tr> 
    <td style="padding: 5px 16px;"> b. Berangkat Dari</td>
    <td>' . $data['berangkat_kota'] .' </td>
</tr>

 <tr> 
    <td style="padding: 5px 16px;"> c Tujuan Ke</td>
    <td>' . $data['tujuan_kota'] .'</td>
</tr>

 <tr> 
    <td style="padding: 5px 16px;"> d. Tanggal Harus Kembali</td>
    <td>' . date('d F Y',strtotime($data['tgl_kembali'])) .'</td>
</tr>
<tr>
    <td> 7. Keterangan Lain</td>
    <td>'.  $data['catatan'].'</td>
</tr>
</table>
<br>
<table style="border: 0px solid black;">
<tbody>
<tr>
<td style="border: 0px solid black; width:375px;"></td>
<td style="border: 0px solid black; width:250px; height:100px"><center>Medan, '.date('d F Y').'  <br> Disetujui<br>
<img src="assets/ttd/'.$data['ttd'] .'" class="center" style="width:180px;"></center> 
</tr>

<tr>
<td style="border: 0px solid black;"><img src="assets/sppd/qrcode/'.$data['qrcode'].'.png" style="width:50px;"></td>
<td style="border: 0px solid black; width:100px;"><center><b><u>' . $data['nama'] . '</u></b><br>'. $data['jabatan'] .'</center></td>
</tr>
</tbody>
</table> 

<br>
<small><b><u>Catatan :</u></b><br>
Sekembalinya Dari Tempat Tujuan,<br>
SPPD Ini Diserahkan Pada BAUM UMSU</small>

 
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
 <table class="table">
  
  <tr>
    <td style="width: 50%;">Berangkat Dari  : ...............................................
    <br><br>
    Pada Tanggal : ...............................................
       <br><br><br><br><br><br><br><br><br><br><br><br>
    </td>

       <td style="width: 46%;">Berangkat Dari  : ...............................................
    <br><br>
    Pada Tanggal : ...............................................
    <br><br><br><br><br><br><br><br><br><br><br><br>
    </td>
</tr>

  <tr>
    <td style="width: 50%;">Tiba di  : ...............................................
    <br><br>
    Pada Tanggal : ...............................................
       <br><br><br><br><br><br><br><br><br><br><br><br>
    </td>

       <td style="width: 46%;">Berangkat Dari  : ...............................................
    <br><br>
    Pada Tanggal : ...............................................
    <br><br><br><br><br><br><br><br><br><br><br><br>
    </td>
</tr>

  <tr>
    <td style="width: 50%;">Tiba di  : ...............................................
    <br><br>
    Pada Tanggal : ...............................................
       <br><br><br><br><br><br><br><br><br><br><br><br>
    </td>

       <td style="width: 46%;">Berangkat Dari  : ...............................................
    <br><br>
    Pada Tanggal : ...............................................
    <br><br><br><br><br><br><br><br><br><br><br><br>
    </td>
</tr>

  <tr>
    <td style="width: 50%;">Tiba di  : ...............................................
    <br><br>
    Pada Tanggal : ...............................................
       <br><br><br><br><br><br><br><br><br><br><br><br>
    </td>

       <td style="width: 46%;">Berangkat Dari  : ...............................................
    <br><br>
    Pada Tanggal : ...............................................
    <br><br><br><br><br><br><br><br><br><br><br><br>
    </td>
</tr>
  
</table>
  
 
    </body>
</head>

</html>';
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($isi);
$mpdf->Output();

