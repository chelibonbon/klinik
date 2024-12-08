 <!DOCTYPE html>
 <html>
 <head>
  <title>Laporan pendaftaran</title>
  <style type="text/css">
    /* General reset for margins and padding */
    * {
      margin: 0;
      padding: 0;
    }

    /* Table Styling */
    table {
      width: 100%;  /* Make the table full width */
      border-collapse: collapse;  /* Collapse borders between table cells */
      margin-top: 20px;
    }

    th, td {
      padding: 10px;  /* Add some space within cells */
      text-align: left;  /* Left-align text in table cells */
      border: 1px solid #d3d3d3;  /* Light gray border for table cells */
    }

    th {
      background-color: #f2f2f2;  /* Light background for header */
      font-weight: bold;  /* Make header text bold */
    }

    td {
      background-color: #fff;  /* White background for table rows */
    }

    /* Header Section */
    .header-table {
      width: 100%;
      margin-bottom: 20px;
    }

    .header-table td {
      padding: 10px;
      vertical-align: middle;
    }

    .header-table img {
      width: 100px;  /* Set a fixed width for the logo */
    }

    .header-title {
      text-align: center;
      font-size: 24px;
      font-weight: bold;
    }

    /* Page Break when printing */
    @media print {
      .no-print {
        display: none;  /* Hide non-printable elements */
      }
      body {
        font-family: Arial, sans-serif;
        font-size: 12px;
      }
      table {
        border: 1px solid #000;
      }
    }

  </style>
</head>
<body>
  <!-- Header with Logo and Clinic Name -->
  <table class="header-table">
    <tr>
      <td width="10%">
        <img src="<?= base_url('img/logo_klinik.jpg'); ?>" alt="Klinik Logo">
      </td>
      <td class="header-title" align="center">Klinik</td>
    </tr>
  </table>

  <table class="table table-hover" width="40"  border="1";>
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
      <th scope="col">obat</th>
      <th scope="col">status</th>
    </tr>
  </thead>
  <tbody>

    <?php
    $ms=1;
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
       <td><?= $value->id_obat ?></td>
       <td><?= $value->status ?></td>
     <?php } ?>
   </tr>
 </tbody>
</table>
<script type="text/javascript">
  window.print();
</script>
</body>
</html>
