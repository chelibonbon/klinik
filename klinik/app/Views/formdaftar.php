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
						<h5 class="card-title">form daftar</h5>
						<form action="<?= base_url('home/simpan_formdaftar') ?>" method="POST">
							<table> 
								<tr>
									<td>tanggal pendaftaran</td>
									<td><input type="date" class="form-control" name="tanggalpendaftaran" value="<?= $takdirestui->tgl_pendaftaran ?>"></td>
								</tr>
								<!-- <tr>
									<td>id rekam medis</td>
									<td><input type="number" class="form-control" name="idrm" value="<?= $takdirestui->id_rm ?>"></td>
								</tr> -->
								<tr>
									<td>no antrean</td>
									<td><input type="number" class="form-control" name="no" value="<?= $takdirestui->no_antrean ?>"></td>
								</tr>
								<tr>
									<td>keluhan pasien</td>
									<td><input type="text" class="form-control" name="keluhan" value="<?= $takdirestui->keluhan_pasien ?>"></td>
								</tr>
								<tr>
									<td></td>
									<td><input type="hidden" name="id" value="<?= $takdirestui->id_pendaftaran ?>">
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