
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
						<h5 class="card-title">detail user</h5>
						<form action="<?= base_url('home/simpan_user') ?>" method="POST">
							<table>
								<tr>
									<td>nama</td>
									<td><input type="text" class="form-control" name="nama" value="<?= $takdirestui->nama ?>"></td>
								</tr>
								<tr>
									<td>username</td>
									<td><input type="text" class="form-control" name="username" value="<?= $takdirestui->username ?>"></td>
								</tr>
								<tr>
									<td>password</td>
									<td><input type="password" class="form-control" name="password" value="<?= $takdirestui->password ?>"></td>
								</tr>
								<tr>
									<td>level</td>
									<td><input type="number" class="form-control" name="level" value="<?= $takdirestui->level ?>"></td>
								</tr>
								<tr>
									<td></td>
									<td><input type="hidden" name="id" value="<?= $takdirestui->id_user ?>">
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