
  <div class="pagetitle">
    <h1>Tabel Pasien</h1>
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
            <h5 class="card-title">Pasien</h5>
             <?php if (session()->get('level') == 1||session()->get('level') == 3): ?>
            <a href="<?= base_url('home/input_pasien') ?>" class="btn btn-success">+ Tambah </a>
             <?php endif; ?>
            <form class="d-flex">
            </form>
            <table class="table datatable">
              <thead>
               <tr>
                <th scope="col">#</th>
                <th scope="col">nama pasien</th>
                <th scope="col">jenis kelamin</th>
                <th scope="col">tanggal lahir</th>
                <th scope="col">alamat</th>
                <th scope="col">no hp</th>
                <th scope="col">pekerjaan</th>
                <th scope="col">agama</th>
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
                <td><?= $value->nama_p ?></td>
                <td><?= $value->jenis_kelamin ?></td>
                <td><?= $value->tgl_lahir ?></td>
                <td><?= $value->alamat ?></td>
                <td><?= $value->no_hp ?></td>
                <td><?= $value->pekerjaan ?></td>
                <td><?= $value->agama ?></td>
                <td>
  
                   <?php if (session()->get('level') == 1||session()->get('level') == 3): ?>
                     <a href="<?= base_url('home/edit_pasien/'.$value->id_pasien) ?>"
                       button class="btn btn-warning">
                       <i class="fas fa-info-circle"></i>
                       Edit
                     </button>
                   </a>
                    <?php endif; ?>

                   <?php if (session()->get('level') == 1||session()->get('level') == 3): ?>
                    <a href="<?= base_url('home/hapus_pasien/'.$value->id_pasien) ?>"
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
</section>
</main><!-- End #main -->