 <!DOCTYPE html>
 <html>
 <head>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laporan pendaftaran</title>
  <style type="text/css">
    table,
    tr,
    th,
    td{
    border-collapse: collapse;
    font-family: sans-serif;
    padding: 5px;
  }
  /*button {
    color: #
    }*/
  </style>

</head>
<body>
  <table>
    <tr>
       <td width="100px"><img src="<?= base_url('img/logo_klinik.jpg');?>" width="100px"></td>
     <td width="250%">Klinik</td>
   </tr>
 </table>

  <table border="1" id="my-table">
   <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">nama pasien</th>
      <th scope="col">no antrean</th>
      <th scope="col">nama dokter</th>
      <th scope="col">golongan darah</th>
      <th scope="col">tekanan darah</th>
      <th scope="col">riwayat penyakit</th>
      <th scope="col">alergi obat</th>
      <th scope="col">alergi makanan</th>
      <th scope="col">tanggal berobat</th>
      <th scope="col">keluhan pasien</th>
      <th scope="col">hasil diagnosa</th>
      <th scope="col">tindakan</th>
      <th scope="col">resep obat</th>
      <th scope="col">id nota</th>
      <th scope="col">status</th>
    </tr>
  </thead>
  <tbody>

  <?php
$ms = 1;
foreach ($takdirestui as $key => $value) {
?>
  <tr>
       <th scope="row"><?= $ms++ ?></th>
       <td><?= $value->nama_p ?></td>
       <td><?= $value->no_antrean ?></td>
       <td><?= $value->nama_d ?></td>
       <td><?= $value->gol_darah ?></td>
       <td><?= $value->tek_darah ?></td>
       <td><?= $value->riwayat_penyakit ?></td>
       <td><?= $value->alergi_obat ?></td>
       <td><?= $value->alergi_makanan ?></td>
       <td><?= $value->tanggal_berobat ?></td>
       <td><?= $value->keluhan_pasien ?></td>
       <td><?= $value->hasil_diagnosa ?></td>
       <td><?= $value->tindakan ?></td>
       <td><?= $value->resep_obat ?></td>
       <td><?= $value->id_nota ?></td>
       <td><?= $value->status ?></td>
  </tr>
<?php } ?>
  </tbody>
</table>
  <br>
  
</body>
</html>
