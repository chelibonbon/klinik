
  <div class="pagetitle">
    <h1>Tabel pembayaran</h1>
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


            <!-- Filter Form -->
           <!--  <form class="d-flex" method="GET" action="<?= base_url('home/dashrm') ?>">
              <div class="input-group">
                <select class="form-select" name="status" aria-label="Filter by status">
                  <option value="">-- Filter by Status --</option>
                  <option value="1" <?= (isset($_GET['status']) && $_GET['status'] == '1') ? 'selected' : '' ?>>1</option>
                  <option value="2" <?= (isset($_GET['status']) && $_GET['status'] == '2') ? 'selected' : '' ?>>2</option>
                </select>
                <button class="btn btn-primary" type="submit">Filter</button>
              </div>
            </form> -->

            <a href="<?= base_url('home/input_rm/'.$value->id_rm) ?>" class="btn btn-success">+ Tambah </a>
   
            <form class="d-flex">
            </form>
            <div class="table-responsive">
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">nama pasien</th>
                  <th scope="col">nama dokter</th>
                  <th scope="col">tanggal berobat</th>
                  <th scope="col">aksi</th>
                </tr>
              </thead>
              <tbody>

                <?php
                $ms=1;
           
                // $status_filter = isset($_GET['status']) ? $_GET['status'] : null;
                
           
                foreach ($takdirestui as $key => $value) {
                
                //   if ($status_filter === null || $value->status == $status_filter)
                  ?>

                  <tr>
                    <th scope="row"><?= $ms++ ?></th>
                    <td><?= $value->nama_p ?></td>
                    <td><?= $value->nama_d ?></td>
                    <td><?= $value->tanggal_berobat ?></td>
                    <td>
                      <link rel="stylesheet" type="text/css" href="<?=base_url('fontawesome/css/fontawesome.min.css');?>">
                      <link rel="stylesheet" type="text/css" href="<?=base_url('fontawesome/css/all.css');?>">
                      <?php if (session()->get('level') == 1 || session()->get('level')==3): ?>
                      <?php if ($value->status == 1): ?>
                      <button button class="btn btn-secondary" disabled>Proses</button>
                      <?php else: ?>
                     <a href="<?= base_url('home/pembayaran/'.$value->id_rm) ?>" class="btn btn-danger">Bayar</a>
                      <?php endif; ?>
                      <?php endif; ?>

                   <a href="<?= base_url('home/detail_rm/'.$value->id_rm) ?>"
                       button class="btn btn-primary">
                       <i class="fas fa-info-circle"></i>
                       detail
                     </button>
                   </a>
                   
                   <?php if (session()->get('level') == 1): ?>
                    <a href="<?= base_url('home/hapus_rm/'.$value->id_rm) ?>"
                       button class="btn btn-danger">
                       <i class="fas fa-info-circle"></i>
                       Hapus
                     </button>
                   </a>
                    <?php endif; ?>

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
 </div>
</section>

</main><!-- End #main -->