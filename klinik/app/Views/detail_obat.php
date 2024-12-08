
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
						<h5 class="card-title">Detail Obat</h5>
						<table class="table table-hover">
							<tbody>
								<tr>
									<th scope="row">Nama Obat</th>
									<td><?= $takdirestui->nama_obat ?></td>
								</tr>
								<tr>
									<th scope="row">Stok</th>
									<td><?= $takdirestui->stok ?></td>
								</tr>
								<tr>
									<th scope="row">Harga</th>
									<td>Rp <?= number_format($takdirestui->harga, 0, ',', '.') ?></td>
								</tr>
								<tr>
									<th scope="row">Foto</th>
									<td><img src="<?= base_url('foto/'.$takdirestui->foto);?>" width="500px"></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

			</div>
		</div>
	</section>

</main><!-- End #main -->
