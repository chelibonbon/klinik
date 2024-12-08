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
						<h5 class="card-title">Tambah dokter</h5>
						<form action="<?= base_url('home/simpan_dokter1') ?>" method="POST">
							<table>
								<tr>
									<td>nama dokter</td>
									<td><input type="text" class="form-control" name="namad" value="<?= $takdirestui->nama_d ?>"></td>
								</tr>

								<tr>
									<td>email</td>
									<td><input type="text" class="form-control" name="email" value="<?= $takdirestui->username ?>"></td>
								</tr>
								<tr>
									<td>password</td>
									<td><input type="password" class="form-control" name="password" value="<?= $takdirestui->password ?>"></td>
								</tr>
								<!-- <tr>
									<td>level</td>
									<td><input type="number" class="form-control" name="level" value="<?= $takdirestui->level ?>"></td>
								</tr> -->
								<tr>
									<td>spesialis</td>
									<td>
										<select name="spesialis" class="form-control">
											<option>pilih spesialis</option>
											<option value="umum" <?= ($takdirestui->spesialis == 'umum') ? 'selected' : '' ?>>umum</option>
											<option value="gigi" <?= ($takdirestui->spesialis == 'gigi') ? 'selected' : '' ?>>gigi</option>
											<option value="bedah" <?= ($takdirestui->spesialis == 'bedah') ? 'selected' : '' ?>>bedah</option>
											<option value="bedah anak" <?= ($takdirestui->spesialis == 'bedah anak') ? 'selected' : '' ?>>bedah anak</option>
											<option value="bedah saraf" <?= ($takdirestui->spesialis == 'bedah saraf') ? 'selected' : '' ?>>bedah saraf</option>
											<option value="penyakit dalam" <?= ($takdirestui->spesialis == 'penyakit dalam') ? 'selected' : '' ?>>penyakit dalam</option>
											<option value="alergi-imunologi" <?= ($takdirestui->spesialis == 'alergi-imunologi') ? 'selected' : '' ?>>alergi-imunologi</option>
											<option value="paru" <?= ($takdirestui->spesialis == 'paru') ? 'selected' : '' ?>>paru</option>
											<option value="jantung dan pembuluh darah" <?= ($takdirestui->spesialis == 'jantung dan pembuluh darah') ? 'selected' : '' ?>>jantung dan pembuluh darah</option>
											<option value="ginjal dan hipertensi" <?= ($takdirestui->spesialis == 'ginjal dan hipertensi') ? 'selected' : '' ?>>ginjal dan hipertensi</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>jenis kelamin</td>
									<td>
										<select name="jk" class="form-control">
											<option>pilih jenis kelamin</option>
											<option value="laki-laki" <?= ($takdirestui->jenis_kelamin == 'laki-laki') ? 'selected' : '' ?>>Laki-laki</option>
											<option value="perempuan" <?= ($takdirestui->jenis_kelamin == 'perempuan') ? 'selected' : '' ?>>Perempuan</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>tanggal lahir</td>
									<td><input type="date" class="form-control" name="tanggallahir" value="<?= $takdirestui->tgl_lahir ?>"></td>
								</tr>
								<tr>
									<td>alamat</td>
									<td><input type="text" class="form-control" name="alamat" value="<?= $takdirestui->alamat ?>"></td>
								</tr>


								<tr>
									<td>no hp</td>
									<td><input type="number" class="form-control" name="no_hp" value="<?= $takdirestui->no_hp ?>"></td>
								</tr>
								<tr>
									<td>kode dokter</td>
									<td><input type="number" class="form-control" name="kode_dokter" value="<?= $takdirestui->kode_dokter ?>"></td>
								</tr>
								<tr>
									<td></td>
									<td><input type="hidden" value="<?= $takdirestui->id_dokter ?>">
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