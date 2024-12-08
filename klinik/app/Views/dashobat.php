
  <div class="pagetitle">
    <h1>Tabel Obat</h1>
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
            <h5 class="card-title">Obat</h5>
             <?php if (session()->get('level') == 1): ?>
            <a href="<?= base_url('home/input_obat/'.$value->id_obat) ?>" class="btn btn-success">+ Tambah </a>
             <?php endif; ?>
            <form class="d-flex">
            </form>
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama obat</th>
                  <th scope="col">stok</th>
                  <th scope="col">harga</th>
                  <th scope="col">foto</th>
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
                  <td><?= $value->stok ?></td>
                  <td><?= $value->harga ?></td>
                  <td><img src="<?= base_url('foto/'.$value->foto);?>" width="50px"></td>
                  <td>
                  <input type="hidden" name="id" value="<?= $value->id_obat ?>">
                  <?php if (session()->get('level') == 1): ?>
                  <a href="<?= base_url('home/edit_obat/'.$value->id_obat) ?>" class="btn btn-warning">Edit</button> </a>
                   <?php endif; ?>

                  <a href="<?= base_url('home/detail_obat/'.$value->id_obat) ?>" class="btn btn-primary">detail</button> </a>

                    <?php if (session()->get('level') == 1): ?>
                  <a href="<?= base_url('home/hapus_obat/'.$value->id_obat) ?>" class="btn btn-danger">Hapus </button> </a>
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