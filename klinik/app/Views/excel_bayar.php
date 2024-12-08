 <!DOCTYPE html>
 <html>
 <head>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laporan pembayaran</title>
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
      <th scope="col">biaya dokter</th>
      <th scope="col">biaya fasilitas</th>
      <th scope="col">biaya obat</th>
      <th scope="col">total</th>
      <th scope="col">tanggal</th>
      <th scope="col">waktu</th>
      <th scope="col">metode pembayaran</th>
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
       <td><?= $value->biaya_dokter ?></td>
       <td><?= $value->biaya_fasilitas ?></td>
       <td><?= $value->biaya_obat ?></td>
       <td><?= $value->total ?></td>
       <td><?= $value->tanggal ?></td>
       <td><?= $value->waktu ?></td>
       <td><?= $value->metode_pembayaran ?></td>
  </tr>
<?php } ?>
  </tbody>
</table>
  <br>
  
  <script>
    window.onload = () => {
        const table = document.getElementById('my-table');
        exportTable(table, 'laporan_pembayaran.xls');
    };

    function exportTable(table, filename) {
        const tableHTML = encodeURIComponent(table.outerHTML);
        const downloadLink = document.createElement('a');

        downloadLink.href = `data:application/vnd.ms-excel,${tableHTML}`;
        downloadLink.download = filename;
        document.body.appendChild(downloadLink);
        downloadLink.click();
        document.body.removeChild(downloadLink);
        window.close();
    }
</script>

</body>
</html>