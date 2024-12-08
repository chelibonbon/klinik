
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
						<h5 class="card-title">Edit dokter</h5>
<!-- <!DOCTYPE html>
<html>
<head>
	<title>input karyawan</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>	
  
</head>
<body>
	<div class="container mt-3">
		<h3>Edit Karyawan</h3> -->
		<form action="<?= base_url('home/simpan_dokter') ?>" method="POST">
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
					<td><input type="text" class="form-control" name="password" value="<?= $takdirestui->password ?>"></td>
				</tr>
				<tr>
					<td>level</td>
					<td><input type="number" class="form-control" name="level" value="<?= $takdirestui->level ?>"></td>
				</tr>
				<tr>
					<td>spesialis</td>
					<td><input type="text" class="form-control" name="spesialis" value="<?= $takdirestui->spesialis ?>"></td>
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
			<!-- <input type="radio" name="jk" value="<?= $takdirestui->jeniskel ?>"> laki-laki
				<input type="radio" name="jk" value="<?= $takdirestui->jeniskel ?>"> perempuan -->
			</tr>
			<tr>
				<td>tanggal lahir</td>
				<td><input type="date" class="form-control" name="tanggallahir" value="<?= date('Y-m-d', strtotime($takdirestui->tgl_lahir)) ?>"></td>

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
				<td><input type="hidden" name="id" value="<?= $takdirestui->id_user ?>">
					<button type="submit" class="btn btn-warning">Edit</button>
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