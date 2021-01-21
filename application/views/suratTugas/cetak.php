<?php

$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'format' => [210, 330]
]);


$isi='<!DOCTYPE html>
<html>
<style>
@page {
  margin-top: 5.5cm;
  margin-bottom: 0.5cm;
  margin-left: 3cm;
  margin-right: 2cm;
}
</style>
<head>
    <title>Cetak Surat Tugas</title>
    
</head>

<body>
<h4 align="center"><u>SURAT - TUGAS</u><br> Nomor : '.$data["no_surat_keluar"].'</h4>
<p align="center"><i>Bismillahirrahmannirrahim</i></p>

<p align="justify">Berdasarkan surat dari '.$data["balasan_surat"].' Nomor: '.$data["no_surat_masuk"].' tanggal '. SuratTugas::format($data["tgl_surat_masuk"]).' Perihal: '.$data["perihal"].', 
maka Pimpinan Universitas Muhammadiyah Sumatera Utara dengan ini menugaskan kepada:</p>

<table>';
foreach ($tugas as $tg) :

  $isi .='<tr>
<td style="width:100px">Nama</td>
<td>:</td>
<td><b>'.$tg["nama"].'</b></td>
</tr>

<tr>
<td>Jabatan</td>
<td>:</td>
<td>'.$tg["jabatan"].'</td>
</tr>

<tr>
<td></td>
<td></td>
</tr>
';

endforeach;

$isi .='</table>

<p align="justify">Menghadiri '.$data["menghadiri"].', yang akan dilaksanakan pada: </p>
<table>
<tr>
<td style="width:100px">Hari/Tanggal</td>
<td>:</td>
<td>'.$data["tanggal"].'</td>
</tr>

<tr>
<td>Pukul</td>
<td>:</td>
<td>'.$data["pukul"].'</td>
</tr>

<tr>
<td>Tempat</td>
<td>:</td>
<td>'.$data["tempat"].'</td>
</tr>
</table>

<p align="justify">Demikian surat ini diterbitkan untuk dilaksanakan sebagaimana mestinya, Atas perhatiannya diucapkan terima kasih. </p>
<p align="right">Medan, <u>'.go2hi::date("d F Y", 1).' H</u> <br>' .SuratTugas::format(date("Y-m-d")).' M</p>
<table>
<tr>
<td style="width:370px"><img src="assets/suratTugas/qrcode/'.$data['qrcode'].'.png" style="width:50px;"></td>
<td align="center">a.n Rektor <br> Wakil Rektor II<br>
<img src="assets/ttd/ttd_wr2.png" class="center" style="width:150px;"><br>
<b><u>Assoc. Prof. Dr. Akrim, M.Pd</u></b> <br> NIDN: 0122127902

</td>
</tr>
</table>
<small><b><u>Tembusan</u></b>
<br>
1. Bapak Rektor Sebagai Laporan; 
<br>
2. Wakil Rektor untuk diketahui;
<br>
3. Sekretaris Universitas;
<br>
4. BAK UMSU;
<br>
5. Pertinggal;

<br><br>
<b><u>Catatan</u>
<br>
Sekembalinya dari Tempat Tujuan.<br>
Laporan Surat Tugas ini diserahkan Ke Biro Adm. Umum UMSU
</b>

</small>
</body>

</html>';
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($isi);
$mpdf->Output();