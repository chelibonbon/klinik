<main id="main" class="main">

  <div class="pagetitle">
    <h1>Form Elements</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Forms</li>
        <li class="breadcrumb-item active">Elements</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Tambah resep obat</h5>
            <form action="<?= base_url('home/simpan_ro1') ?>" method="POST">
             <table> 
                <tr>
                  <td>Nama obat</td>
                  <td>
                    <select class="form-control" name="idobat">

                      <option> Pilih obat</option>
                      <?php
                      foreach ($takdirestui as $key => $value) {
                        ?>
                        <option value="<?=$value->id_obat?>"><?= $value->nama_obat?> - <?= $value->stok?></option>
                        <?php
                      }
                      ?>

                    </select>
                  </td>
                </tr>
                <tr>
                  <td>aturan pakai</td>
                  <td><input type="text" class="form-control" name="pakai" value="<?= $takdirestui->aturan_pakai ?>"></td>
                </tr>
                <tr>
                  <td>jumlah</td>
                  <td><input type="number" class="form-control" name="jumlah" value="<?= $takdirestui->jumlah ?>"></td>
                </tr>
                <tr>
                  <td>total harga</td>
                  <td><input type="number" class="form-control" name="total" value="<?= $takdirestui->total_harga ?>"></td>
                </tr>
                <tr>
                  <td>status bayar</td>
                  <td><input type="text" class="form-control" name="status" value="<?= $takdirestui->status_bayar ?>"></td>
                </tr>
                <tr>
                  <td></td>
                  <td><input type="hidden" value="<?= $takdirestui->id_ro ?>">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <input type="reset" value="reset" class="form-control">
                    <input type="button" value="kembali" class="form-control">
                  </td>
                </tr>
              </table>
            </form>
          </div>
        </div>

      </div>
    </div>
  </section>

  </main><!-- End #main -->