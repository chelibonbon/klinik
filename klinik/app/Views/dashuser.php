
    <div class="pagetitle">
      <h1>Tabel User</h1>
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
             <!--  <a href="<?= base_url('home/input_user/'.$value->id_user) ?>" class="btn btn-success">+ Tambah </a> -->
              <form class="d-flex">
              </form>
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">nama</th>
                    <th scope="col">email</th>
                    <th scope="col">password</th>
                    <th scope="col">level</th>
                    <th scope="col">aksi</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  $ms=1;
                  foreach ($takdirestui as $key => $value) {
                    ?>
                    <tr>
                      <th scope="col"><?= $ms++ ?></th>
                      <td><?= $value->nama ?></td>
                      <td><?= $value->username ?></td>
                      <td><?= $value->password ?></td>
                      <td><?= $value->level ?></td>
                      <td>
                  <input type="hidden" name="id" value="<?= $value->id_user ?>">
                  <a href="<?= base_url('home/edit_user/'.$value->id_user) ?>" class="btn btn-warning">Edit</button>
                  <a href="<?= base_url('home/detail_user/'.$value->id_user) ?>" class="btn btn-primary">detail</button>
                  <a href="<?= base_url('home/hapus_user/'.$value->id_user) ?>" class="btn btn-danger">Hapus </a>
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