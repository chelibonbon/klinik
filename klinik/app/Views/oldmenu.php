 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">
    <?php
        if (session()->get('level')==1 || session()->get('level')==2 || session()->get('level')==3) {
        ?>
    <li class="nav-item">
      <a class="nav-link collapsed" href="<?= base_url('home/dashboard')?>">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <?php }
        if (session()->get('level')==1 || session()->get('level')==3){
        ?>


    <li class="nav-item">
      <a class="nav-link collapsed" href="<?= base_url('home/input_rm')?>">
        <i class="bi bi-grid"></i>
        <span>Pendaftaran</span>
      </a>
    </li>
        <?php }
        if (session()->get('level') == 1) {
        ?>


    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-collection"></i><span>Data Master</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
           <a href="<?= base_url('home/dashobat')?>">
            <i class="ri-archive-fill"></i><span>Obat</span>
          </a>
        </li>
        <li>
           <a href="<?= base_url('home/dashdokter')?>">
            <i class="ri-bear-smile-fill"></i><span>Dokter</span>
          </a>
        </li>
        <li>
           <a href="<?= base_url('home/dashpasien')?>">
            <i class="ri-bear-smile-fill"></i><span>Pasien</span>
          </a>
        </li>
        <li>
           <a href="<?= base_url('home/dashrm')?>">
            <i class="ri-bear-smile-fill"></i><span>Pendaftaran</span>
          </a>
        </li>
        <li>
           <a href="<?= base_url('home/dashuser')?>">
            <i class="ri-account-pin-circle-fill"></i><span>User</span>
          </a>
        </li>
        <li>
      </ul>
    </li><!-- End Components Nav -->
      <?php }
        if (session()->get('level')==1 || session()->get('level')==3){
        ?>


     <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-collection"></i><span>Pasien</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
           <a href="<?= base_url('home/dashrm')?>">
            <i class="ri-bear-smile-fill"></i><span>Pendaftaran</span>
          </a>
        </li>
        <li>
      </ul>
    </li><!-- End Components Nav -->
<?php }
        if (session()->get('level')==1 || session()->get('level')==2) {
        ?>


    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-credit-card-fill"></i><span>Transaksi</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
           <a href="<?= base_url('home/dashnota')?>">
            <i class="ri-account-pin-circle-fill"></i><span>pembayaran</span>
          </a>
      </ul>
    </li><!-- End Forms Nav -->


<?php }
        if (session()->get('level')==1 || session()->get('level')==2) {
        ?>
    <li class="nav-item">
      <a class="nav-link " data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-file-text"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="tables-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
       <!--  <li>
           <a href="<?= base_url('home/lro')?>">
            <i class="ri-anticlockwise-fill"></i><span>resep obat</span>
          </a>
        </li> -->
        <li>
           <a href="<?= base_url('home/lap_rm')?>">
            <i class="ri-account-pin-circle-fill"></i><span>pendaftaran</span>
          </a>
      </ul>
    </li><!-- End Tables Nav -->
  <?php } ?>

    <li class="nav-heading">Pages</li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="users-profile.html">
        <i class="bi bi-person"></i>
        <span>Profile</span>
      </a>
    </li><!-- End Profile Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="<?= base_url('home/logout')?>">
        <i class="bi bi-cup-straw"></i>
        <span>Logout</span>
      </a>
    </li><!-- End F.A.Q Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="<?= base_url('home/register')?>">
        <i class="bi bi-card-list"></i>
        <span>Register</span>
      </a>
    </li><!-- End Register Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="<?= base_url('home/login')?>">
        <i class="bi bi-box-arrow-in-right"></i>
        <span>Login</span>
      </a>
    </li><!-- End Login Page Nav -->

  </ul>

  </aside><!-- End Sidebar-->