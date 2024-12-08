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
						<h5 class="card-title">Tambah pasien</h5>
						<form action="<?= base_url('home/simpan_pasien1') ?>" method="POST">
							<table>
								<tr>
									<td>nama pasien</td>
									<td><input type="text" class="form-control" name="namap" ></td>
								</tr>
								<tr>
									<td>jenis kelamin</td>
									<td>
										<select name="jk" class="form-control">
											<option value="">Pilih jenis kelamin</option>
											<option value="laki-laki" <?= ($takdirestui->jk == 'laki-laki') ? 'selected' : '' ?>>Laki-laki</option>
											<option value="perempuan" <?= ($takdirestui->jk == 'perempuan') ? 'selected' : '' ?>>Perempuan</option>
										</select>

									</td>
								</tr>
								<tr>
									<td>tanggal lahir</td>
									<td><input type="date" class="form-control" name="tanggallahir"></td>
								</tr>
								<tr>
									<td>alamat</td>
									<td><input type="text" class="form-control" name="alamat" ></td>
								</tr>
								<tr>
									<td>no hp</td>
									<td><input type="number" class="form-control" name="no_hp"></td>
								</tr>
								<tr>
									<td>pekerjaan</td>
									<td><input type="text" class="form-control" name="pekerjaan" ></td>
								</tr>
								<tr>
									<td>agama</td>
									<td><input type="text" class="form-control" name="agama" ></td>
								</tr>
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