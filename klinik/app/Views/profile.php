
    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="<?= base_url('img/' . ($foto ?: 'default-profile.png')) ?>"   width="100px" height="100px" style="object-fit: cover; border-radius: 50%;">
              <h2><?= session()->get('u')?></h2>
              <h3><?php 
            $level = session()->get('level'); 
            if ($level == 1) {
                echo 'Admin';
            } elseif ($level == 2) {
                echo 'Dokter';
            } elseif ($level == 3) {
                echo 'Perawat';
            } else {
                echo 'Tidak Diketahui';
            }
        ?></h3>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"><?= $name?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?= $chelsica->username?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Status</div>
                    <div class="col-lg-9 col-md-8"><?php 
                    $level = session()->get('level'); 
                    if ($level == 1) {
                      echo 'Admin';
                    } elseif ($level == 2) {
                      echo 'Dokter';
                    } elseif ($level == 3) {
                      echo 'Perawat';
                    } else {
                      echo 'Tidak Diketahui';
                    }
                  ?></div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">password</div>
                    <div class="col-lg-9 col-md-8"><?=$chelsica->password?></div>
                  </div>

                  <?php if (session()->get('level') == 2): ?>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">spesialis</div>
                    <div class="col-lg-9 col-md-8"><?=$chelsica->spesialis?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">jenis kelamin</div>
                    <div class="col-lg-9 col-md-8"><?=$chelsica->jenis_kelamin?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">tanggal lahir</div>
                    <div class="col-lg-9 col-md-8"><?=$chelsica->tgl_lahir?></div>
                  </div>

                    <div class="row">
                    <div class="col-lg-3 col-md-4 label">alamat </div>
                    <div class="col-lg-9 col-md-8"><?=$chelsica->alamat?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">no hp</div>
                    <div class="col-lg-9 col-md-8"><?=$chelsica->no_hp?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">kode dokter</div>
                    <div class="col-lg-9 col-md-8"><?=$chelsica->kode_dokter?></div>
                  </div>

                  <?php endif; ?>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form action="<?= base_url('home/update_profile') ?>" method="post" enctype="multipart/form-data">
                    <?php if (session()->getFlashdata('successprofil')): ?>
                <div class="alert alert-success">
                  <?= session()->getFlashdata('successprofil') ?>
                </div>
              <?php endif; ?>
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="profile-picture-wrapper">
                          <img src="<?= base_url('img/' . $foto) ?>" alt="Profile" width="100px" height="100px" style="object-fit: cover; border-radius: 50%;" id="profilePreview">
                        </div>
                        <div class="pt-2">
                          <input type="file" name="profile_image" id="profileImage"  accept="img/" class="form-control-file">
                          <a href="<?= base_url('home/delete_profile_picture') ?>" class="btn btn-danger btn-sm" title="Remove my profile image">
                            <i class="bi bi-trash"></i>
                          </a>
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fullName" type="text" class="form-control" id="fullName" value="<?= $name ?>">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">

                  <!-- Settings Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="changesMade" checked>
                          <label class="form-check-label" for="changesMade">
                            Changes made to your account
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="newProducts" checked>
                          <label class="form-check-label" for="newProducts">
                            Information on new products and services
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="proOffers">
                          <label class="form-check-label" for="proOffers">
                            Marketing and promo offers
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                          <label class="form-check-label" for="securityNotify">
                            Security alerts
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End settings Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form action="<?= base_url('home/change_pass') ?>" method="post">

                <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                  <?= session()->getFlashdata('success') ?>
                </div>
              <?php endif; ?>


                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newpassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                      <a href="<?= base_url('home/reset_pass/'.$chelsica->id_user)?>" class="btn btn-danger"></i>Reset Password</a>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main>