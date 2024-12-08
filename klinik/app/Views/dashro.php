
  <div class="pagetitle">
    <h1>Tabel resep obat</h1>
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
            <a href="<?= base_url('home/input_ro/'.$value->id_ro) ?>" class="btn btn-success">+ Tambah </a>
            <form class="d-flex">
            </form>
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">nama obat</th>
                  <th scope="col">aturan pakai</th>
                  <th scope="col">jumlah</th>
                  <th scope="col">total harga</th>
                  <th scope="col">status bayar</th>
                  <th scope="col">aksi</th>
                </tr>
              </thead>
              <tbody>

                <?php
                $ms=1;
                foreach ($takdirestui as $key => $value) {
                  ?>
                  <tr>
                    <th scope="row"><?= $ms++ ?></th>
                    <td><?= $value->nama_obat ?></td>
                    <td><?= $value->aturan_pakai ?></td>
                    <td><?= $value->jumlah ?></td>
                    <td><?= $value->total_harga ?></td>
                    <td><?= $value->status_bayar ?></td>
                     <td>
                      <link rel="stylesheet" type="text/css" href="<?=base_url('fontawesome/css/fontawesome.min.css');?>">
                      <link rel="stylesheet" type="text/css" href="<?=base_url('fontawesome/css/all.css');?>">
                      <a href="<?= base_url('home/edit_ro/'.$value->id_ro) ?>"
                       button class="btn btn-warning">
                       <i class="fas fa-info-circle"></i>
                       Edit
                     </button>
                   </a>
                   <a href="<?= base_url('home/detail_ro/'.$value->id_ro) ?>"
                       button class="btn btn-primary">
                       <i class="fas fa-info-circle"></i>
                       detail
                     </button>
                   </a>
                    <a href="<?= base_url('home/hapus_ro/'.$value->id_ro) ?>"
                       button class="btn btn-danger">
                       <i class="fas fa-info-circle"></i>
                       Hapus
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