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
						<h5 class="card-title">Edit pembayaran</h5>
						<form action="<?= base_url('home/simpan_nota') ?>" method="POST" enctype="multipart/form-data">
							<table> 
								<tr>
									<td>jumlah bayar</td>
									<td><input type="number" class="form-control" name="bayar" value="<?= $takdirestui->jumlah_bayar ?>"></td>
								</tr>
								<tr>
									<td>metode pembayaran</td>
									<td><input type="text" class="form-control" name="pembayaran" value="<?= $takdirestui->metode_pembayaran ?>"></td>
								</tr>
								<tr>
									<td>tanggal</td>
									<td><input type="date" class="form-control" name="tanggal" value="<?= $takdirestui->tanggal ?>"></td>
								</tr>
								<tr>
									<td>waktu</td>
									<td><input type="time" class="form-control" name="waktu" value="<?= $takdirestui->waktu ?>"></td>
								</tr>
								<tr>
									<td></td>
									<td><input type="hidden" name="id" value="<?= $takdirestui->id_nota ?>">
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