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
						<h5 class="card-title"> Obat</h5>
						<form action="<?= base_url('home/simpan_obat1') ?>" method="POST" enctype="multipart/form-data">
							<table> 
								<tr>
									<td>nama obat</td>
									<td><input type="text" class="form-control" name="namaobat" value="<?= $takdirestui->nama_obat ?>"></td>
								</tr>
								<tr>
									<td>stok</td>
									<td><input type="number" class="form-control" name="stok" value="<?= $takdirestui->stok ?>"></td>
								</tr>
								<tr>
									<td>harga</td>
									<td><input type="number" class="form-control" name="harga" value="<?= $takdirestui->harga ?>"></td>
								</tr>
								<tr>
									<td>Foto</td>
									<td><input type="file" class="form-control" name="file" accept="foto/" required></td>
								</tr>
								<tr>
									<td></td>
									<td><input type="hidden" name="id" value="<?= $takdirestui->id_obat ?>">
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