
<div class="pagetitle">
  <h1>Tabel transaksi</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Tables</li>
      <li class="breadcrumb-item active">Data</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Datatables</h5>
         <!--  <?php if (session()->get('level') == 1): ?>
          <a href="<?= base_url('home/input_nota/'.$value->id_nota) ?>" class="btn btn-success">+ Tambah </a>
        <?php endif; ?> -->
       
        <table class="table datatable">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama Pasien</th>
              <th>Biaya Dokter</th>
              <th>Biaya Fasilitas</th>
              <th>Biaya Obat</th>
              <th>Total</th>
              <th>Tanggal</th>
              <th>Waktu</th>
              <th>Metode Pembayaran</th>
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
              <td><?= $value->biaya_dokter ?></td>
              <td><?= $value->biaya_fasilitas ?></td>
              <td><?= $value->biaya_obat ?></td>
              <td><?= $value->total ?></td>
              <td><?= $value->tanggal ?></td>
              <td><?= $value->waktu ?></td>
              <td><?= $value->metode_pembayaran ?></td>
              <td>
                <link rel="stylesheet" type="text/css" href="<?=base_url('fontawesome/css/fontawesome.min.css');?>">
                <link rel="stylesheet" type="text/css" href="<?=base_url('fontawesome/css/all.css');?>">
                <a href="<?= base_url('home/printhistorinota/'.$value->id_bayar) ?>"
                 button class="btn btn-primary">
                 <i class="fas fa-info-circle"></i>
                 cetak
               </button>
             </a>

   </td>
 </tr>
 <?php
}
?>
</tbody>
</table>
</div>
</div>

</div>
</div>
</section>

</main><!-- End #main -->