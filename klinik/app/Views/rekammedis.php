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
            <h5 class="card-title">Edit pendaftaran</h5>
            <form action="<?= base_url('home/simpan_rm') ?>" method="POST">
             <table> 
                <tr><!-- 
                  <td>nama pasien</td>
                  <td><input type="text" class="form-control" name="idpasien" value="<?= $takdirestui->id_pasien ?>"></td>
                </tr>
                <tr>
                  <td>no antrean</td>
                  <td><input type="number" class="form-control" name="antrean" value="<?= $takdirestui->no_antrean ?>"></td>
                </tr>
                <tr>
                  <td>nama dokter</td>
                  <td><input type="text" class="form-control" name="iddokter" value="<?= $takdirestui->id_dokter ?>"></td>
                </tr>
                <tr>
                  <td>golongan darah</td>
                  <td><input type="text" class="form-control" name="golongan" value="<?= $takdirestui->gol_darah ?>"></td>
                </tr>
                <tr>
                  <td>tekanan darah</td>
                  <td><input type="text" class="form-control" name="tekanan" value="<?= $takdirestui->tek_darah ?>"></td>
                </tr>
                <tr>
                  <td>riwayat penyakit</td>
                  <td><input type="text" class="form-control" name="penyakit" value="<?= $takdirestui->riwayat_penyakit ?>"></td>
                </tr>
                <tr>
                  <td>alergi obat</td>
                  <td><input type="text" class="form-control" name="alergi_obat" value="<?= $takdirestui->alergi_obat ?>"></td>
                </tr>
                <tr>
                  <td>alergi makanan</td>
                  <td><input type="text" class="form-control" name="alergi_makanan" value="<?= $takdirestui->alergi_makanan ?>"></td>
                </tr>
                <tr>
                  <td>tanggal berobat</td>
                  <td><input type="date" class="form-control" name="berobat" value="<?= $takdirestui->tanggal_berobat ?>"></td>
                </tr -->
                 <tr>
                  <td>keluhan pasien</td>
                  <td><input type="text" class="form-control" name="keluhan" value="<?= $takdirestui->keluhan_pasien ?>"></td>
                </tr>
                <tr>
                  <td>hasil diagnosa</td>
                  <td><input type="text" class="form-control" name="diagnosa" value="<?= $takdirestui->hasil_diagnosa ?>"></td>
                </tr>
                <tr>
                  <td>tindakan</td>
                  <td><input type="text" class="form-control" name="tindakan" value="<?= $takdirestui->tindakan ?>"></td>
                </tr>
                <tr>
                <td>resep obat</td>
                <td>
                  <select class="form-control" name="resep">

                    <option> Pilih Obat</option>
                    <?php
                    foreach ($direstui as $key => $value) {
                      ?>
                      <option value="<?=$value->id_obat?>"><?= $value->nama_obat?> - <?= $value->harga?></option>
                      <?php
                    }
                    ?>

                  </select>
                </td>
              </tr>
               <!--  <tr>
                  <td>id nota</td>
                  <td><input type="number" class="form-control" name="nota" value="<?= $takdirestui->id_nota ?>"></td>
                </tr>
                <tr>
                  <td>status</td>
                  <td><input type="number" class="form-control" name="status" value="<?= $takdirestui->status ?>"></td>
                </tr> -->
                <tr>
                  <td></td>
                  <td><input type="hidden" name="id" value="<?= $takdirestui->id_rm ?>">
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