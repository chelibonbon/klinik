
  <div class="pagetitle">
    <h1>Detail Pendaftaran</h1>
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
            <h5 class="card-title">Detail Pendaftaran</h5>
            <div class="table-responsive">
              <table class="table table-hover align-middle">
                <tbody>
                  <tr>
                    <th scope="row">Nama Pasien</th>
                    <td><?= $takdirestui->nama_p ?></td>
                  </tr>
                  <tr>
                    <th scope="row">No Antrean</th>
                    <td><?= $takdirestui->no_antrean ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Nama Dokter</th>
                    <td><?= $takdirestui->nama_d ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Golongan Darah</th>
                    <td><?= $takdirestui->gol_darah ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tekanan Darah</th>
                    <td><?= $takdirestui->tek_darah ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Suhu</th>
                    <td><?= $takdirestui->suhu ?> °C</td>
                  </tr>
                  <tr>
                    <th scope="row">Tinggi Badan</th>
                    <td><?= $takdirestui->tinggi_badan ?> cm</td>
                  </tr>
                  <tr>
                    <th scope="row">Berat Badan</th>
                    <td><?= $takdirestui->berat_badan ?> kg</td>
                  </tr>
                  <tr>
                    <th scope="row">Riwayat Penyakit</th>
                    <td><?= $takdirestui->riwayat_penyakit ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Alergi Obat</th>
                    <td><?= $takdirestui->alergi_obat ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Alergi Makanan</th>
                    <td><?= $takdirestui->alergi_makanan ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tanggal Berobat</th>
                    <td><?= $takdirestui->tanggal_berobat ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Keluhan Pasien</th>
                    <td><?= $takdirestui->keluhan_pasien ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Hasil Diagnosa</th>
                    <td><?= $takdirestui->hasil_diagnosa ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tindakan</th>
                    <td><?= $takdirestui->tindakan ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Obat</th>
                    <td><?= $takdirestui->nama_obat ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->
