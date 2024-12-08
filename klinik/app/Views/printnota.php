<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nota</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
      padding: 20px;
      background-color: #f9f9f9;
    }
    .receipt {
      width: 400px; 
      margin: 0 auto; 
      padding: 20px;
      background: white;
      border: 1px solid #ccc;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .receipt h2 {
      text-align: center;
      margin: 0;
      font-size: 1.5em;
    }
    .receipt .header, .receipt .footer {
      text-align: center;
      margin-bottom: 15px;
      font-size: 0.9em;
    }
    .receipt table {
      width: 100%;
      margin-top: 10px;
    }
    .receipt table th, .receipt table td {
      text-align: left;
      font-size: 0.85em;
      padding: 5px 0;
    }
    .receipt .total-row td {
      font-weight: bold;
    }
    .receipt .right {
      text-align: right;
    }
    .receipt .center {
      text-align: center;
    }

    @media print {
      body {
        margin: 0;
        padding: 0;
      }
      .receipt {
        width: 500px; 
        margin: 0 auto; 
        box-shadow: none;
        border: none;
      }
      .receipt h2 {
        font-size: 1.4em;
      }
    }
  </style>
</head>
<body>
  <div class="receipt">
    <h2>NOTA KLINIK</h2>
    <div class="header">
      Jl. SNDKANOIEF<br>
      Telp: +62-837-8477-3874
    </div>
    
    <!-- Transaction Details Table -->
    <table>
        <tr>
          <th>No</th>
          <th>Nama Pasien</th>
          <th>Tanggal</th>
          <th>Waktu</th>
          <th>Metode Pembayaran</th>
        </tr>
        <tr>
          <td>1</td>
          <td><?= $takdirestui[0]->nama_p ?></td>
          <td><?= $takdirestui[0]->tanggal ?></td>
          <td><?= $takdirestui[0]->waktu ?></td>
          <td><?= $takdirestui[0]->metode_pembayaran ?></td>
        </tr>
      </table>
    <hr>
    <table>
      <tr>
        <td>Biaya Dokter</td>
        <td class="right">Rp <?= number_format($takdirestui[0]->biaya_dokter, 0, ',', '.') ?></td>
      </tr>
      <tr>
        <td>Biaya Fasilitas</td>
        <td class="right"><?= number_format($takdirestui[0]->biaya_fasilitas, 0, ',', '.') ?></td>
      </tr>
      <tr>
        <td>Biaya Obat</td>
        <td class="right">Rp <?= number_format($takdirestui[0]->biaya_obat, 0, ',', '.') ?></td>
      </tr>
      <tr>
        <td>Total</td>
        <td class="right">Rp <?= number_format($takdirestui[0]->total, 0, ',', '.') ?></td>
      </tr>
    </table>

    <hr>
    <div class="footer">
      Terima Kasih atas kunjungan Anda!<br>
      <i>Have a nice day!</i>
    </div>
  </div>

  <script>
    window.print();
  </script>
</body>
</html>
