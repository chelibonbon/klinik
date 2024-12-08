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
            <h5 class="card-title">Tambah pendaftaran</h5>
            <form action="<?= base_url('home/simpan_rm1') ?>" method="POST">
             <table> 
              <tr>
                <td>nama pasien</td>
                <td>
                  <select class="form-control" name="idpasien">

                    <option> Pilih pasien</option>
                    <?php
                    foreach ($takdirestui as $key => $value) {
                      ?>
                      <option value="<?=$value->id_pasien?>"><?= $value->no_hp?> - <?= $value->nama_p?></option>
                      <?php
                    }
                    ?>

                  </select>
                </td>
              </tr>
              <tr>
                <td>nama dokter</td>
                <td>
                  <select class="form-control" name="iddokter">

                    <option> Pilih dokter</option>
                    <?php
                    foreach ($dokter as $key => $value) {
                      ?>
                      <option value="<?=$value->id_dokter?>"><?= $value->kode_dokter?> - <?= $value->nama_d?> - <?= $value->spesialis?></option>
                      <?php
                    }
                    ?>

                  </select>
                </td>
              </tr>
              <tr>
                <td>golongan darah</td>
                <td><input type="text" class="form-control" name="golongan"></td>
              </tr>
              <tr>
                <td>tekanan darah</td>
                <td><input type="text" class="form-control" name="tekanan" ></td>
              </tr>
              <tr>
                <td>suhu</td>
                <td><input type="text" class="form-control" name="suhu" ></td>
              </tr>
              <tr>
                <td>tinggi badan</td>
                <td><input type="text" class="form-control" name="tinggi" ></td>
              </tr>
              <tr>
                <td>berat badan</td>
                <td><input type="text" class="form-control" name="berat" ></td>
              </tr>
              <tr>
                <td>riwayat penyakit</td>
                <td><input type="text" class="form-control" name="penyakit" ></td>
              </tr>
              <tr>
                <td>alergi obat</td>
                <td><input type="text" class="form-control" name="alergi_obat" ></td>
              </tr>
              <tr>
                <td>alergi makanan</td>
                <td><input type="text" class="form-control" name="alergi_makanan"></td>
              </tr>

                <td><input type="hidden" class="form-control" name="berobat" ></td>
                <td><input type="hidden" class="form-control" name="keluhan" ></td>
                <td><input type="hidden" class="form-control" name="diagnosa"></td>
                <td><input type="hidden" class="form-control" name="tindakan" ></td>
                <td><input type="hidden" class="form-control" name="resep" ></td>
              <tr>
                <td>
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