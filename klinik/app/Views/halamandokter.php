
    <div class="pagetitle">
      <h1>Dokter</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Dokter</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="<?= base_url('img/' . ($foto ?: 'default-profile.png')) ?>"   width="100px" height="100px" style="object-fit: cover; border-radius: 50%;">
              <h2><?= session()->get('u')?></h2>
              <h3><?php 
            $level = session()->get('level'); 
            if ($level == 1) {
                echo 'Admin';
            } elseif ($level == 2) {
                echo 'Dokter';
            } elseif ($level == 3) {
                echo 'Perawat';
            } else {
                echo 'Tidak Diketahui';
            }
        ?></h3>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Queue Pasien</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Pasien Selesai</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                   <h5 class="card-title">List Pasien</h5>

            <form class="d-flex">
            </form>
            <div class="table-responsive">
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">nomor antrian</th>
                  <th scope="col">nama pasien</th>
                  <th scope="col">nama dokter</th>
                  <th scope="col">tanggal berobat</th>
                  <th scope="col">keluhan pasien</th>
                  <th scope="col">hasil diagnosa</th>
                  <th scope="col">tindakan</th>
                  <th scope="col">resep obat</th>
                  <th scope="col">aksi</th>
                </tr>
              </thead>
              <tbody>

                <?php
                foreach ($takdirestui as $key => $value) {
                  ?>

                  <tr>
                    <th scope="row"><?= $value->no_antrean ?></th>
                    <td><?= $value->nama_p ?></td>
                    <td><?= $value->nama_d ?></td>
                    <td><?= $value->tanggal_berobat ?></td>
                    <td><?= $value->keluhan_pasien ?></td>
                    <td><?= $value->hasil_diagnosa ?></td>
                    <td><?= $value->tindakan ?></td>
                    <td><?= $value->nama_obat ?></td>
                    <td>
                      <link rel="stylesheet" type="text/css" href="<?=base_url('fontawesome/css/fontawesome.min.css');?>">
                      <link rel="stylesheet" type="text/css" href="<?=base_url('fontawesome/css/all.css');?>">
                      <?php if (session()->get('level') == 1 || session()->get('level')==2): ?>
                      <?php if ($value->status == 1): ?>
                      <a href="<?= base_url('home/edit_rm/'.$value->id_rm) ?>" button class="btn btn-info">Periksa</a>
                      <?php else: ?>
                      <button class="btn btn-secondary" disabled>Sudah Selesai</button>
                      <?php endif; ?>
                      <?php endif; ?>

                   <a href="<?= base_url('home/detail_rm/'.$value->id_rm) ?>"
                       button class="btn btn-primary">
                       <i class="fas fa-info-circle"></i>
                       detail
                     
                   </a>
                   
                   <?php if (session()->get('level') == 1): ?>
                    <a href="<?= base_url('home/hapus_rm/'.$value->id_rm) ?>"
                       button class="btn btn-danger">
                       <i class="fas fa-info-circle"></i>
                       Hapus
                     
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

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <h5 class="card-title">List Pasien</h5>

            <form class="d-flex">
            </form>
            <div class="table-responsive">
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">nomor antrian</th>
                  <th scope="col">nama pasien</th>
                  <th scope="col">nama dokter</th>
                  <th scope="col">tanggal berobat</th>
                  <th scope="col">keluhan pasien</th>
                  <th scope="col">hasil diagnosa</th>
                  <th scope="col">tindakan</th>
                  <th scope="col">resep obat</th>
                  <th scope="col">aksi</th>
                </tr>
              </thead>
              <tbody>

                <?php
                foreach ($direstui as $key => $value) {
                  ?>

                  <tr>
                    <th scope="row"><?= $value->no_antrean ?></th>
                    <td><?= $value->nama_p ?></td>
                    <td><?= $value->nama_d ?></td>
                    <td><?= $value->tanggal_berobat ?></td>
                    <td><?= $value->keluhan_pasien ?></td>
                    <td><?= $value->hasil_diagnosa ?></td>
                    <td><?= $value->tindakan ?></td>
                    <td><?= $value->nama_obat ?></td>
                    <td>
                      <link rel="stylesheet" type="text/css" href="<?=base_url('fontawesome/css/fontawesome.min.css');?>">
                      <link rel="stylesheet" type="text/css" href="<?=base_url('fontawesome/css/all.css');?>">
                      <?php if (session()->get('level') == 1 || session()->get('level')==2): ?>
                      <?php if ($value->status == 1): ?>
                      <a href="<?= base_url('home/edit_rm/'.$value->id_rm) ?>" button class="btn btn-info">Periksa</a>
                      <?php else: ?>
                      <button class="btn btn-secondary" disabled>Sudah Selesai</button>
                      <?php endif; ?>
                      <?php endif; ?>

                   <a href="<?= base_url('home/detail_rm/'.$value->id_rm) ?>"
                       button class="btn btn-primary">
                       <i class="fas fa-info-circle"></i>
                       detail
                     
                   </a>
                   
                   <?php if (session()->get('level') == 1): ?>
                    <a href="<?= base_url('home/hapus_rm/'.$value->id_rm) ?>"
                       button class="btn btn-danger">
                       <i class="fas fa-info-circle"></i>
                       Hapus
                     
                   </a>
                    <?php endif; ?>

                 </td>
               </tr>
               <?php
             }
             ?>
           </tbody>
         </table>
       </div><!-- End Profile Edit Form -->

                

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->