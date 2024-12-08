<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">
    
    <?php if (session()->get('level') == 1 || session()->get('level') == 2 || session()->get('level') == 3): ?>
    <li class="nav-item">
      <a class="nav-link collapsed" href="<?= base_url('home/dashboard')?>">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <?php endif; ?>
    
    <?php if (session()->get('level') == 1 || session()->get('level') == 3): ?>
    <li class="nav-item">
      <a class="nav-link collapsed" href="<?= base_url('home/dashrm')?>">
        <i class="bi bi-grid"></i>
        <span>Pendaftaran</span>
      </a>
    </li><!-- End Pendaftaran Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="<?= base_url('home/dashrm2')?>">
        <i class="bi bi-grid"></i>
        <span>Histori Pendaftaran</span>
      </a>
    </li><!-- End Pendaftaran Nav -->
    <?php endif; ?>
    
    <?php if (session()->get('level') == 1): ?>
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-collection"></i><span>Data Master</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
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
      </ul>
    </li><!-- End Data Master Nav -->
    <?php endif; ?>

    <?php if (session()->get('level') == 2): ?>
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-collection"></i><span>Dokter</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
       <!--  <li>
          <a href="<?= base_url('home/dashdokter1')?>">
            <i class="ri-bear-smile-fill"></i><span>Dokter</span>
          </a>
        </li> -->
        <li>
          <a href="<?= base_url('home/halamandokter')?>">
            <i class="ri-bear-smile-fill"></i><span>Pendaftaran</span>
          </a>
        </li>
      </ul>
    </li><!-- End Data Master Nav -->
    <?php endif; ?>
    
    <?php if (session()->get('level') == 3): ?>
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#pasien-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-collection"></i><span>Pasien</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="pasien-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a href="<?= base_url('home/dashpasien')?>">
            <i class="ri-bear-smile-fill"></i><span>Daftar Pasien</span>
          </a>
        </li>
      </ul>
    </li><!-- End Pasien Nav -->
    <?php endif; ?>
    
     <?php if (session()->get('level') == 1 || session()->get('level') == 3): ?>
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#pembayaran-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-credit-card-fill"></i><span>Pembayaran</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="pembayaran-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a href="<?= base_url('home/dashbayar')?>">
            <i class="ri-account-pin-circle-fill"></i><span>Pembayaran</span>
          </a>
        </li>
         <li>
          <a href="<?= base_url('home/dashbayar2')?>">
            <i class="ri-account-pin-circle-fill"></i><span>Histori Pembayaran</span>
          </a>
        </li>
      </ul>
    </li><!-- End Transaksi Nav -->
    <?php endif; ?> 

    <?php if (session()->get('level') == 1 || session()->get('level') == 3): ?>
     <li class="nav-item">
      <a class="nav-link collapsed" href="<?= base_url('home/dashnota')?>">
        <i class="bi bi-grid"></i>
        <span>Transaksi</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <?php endif; ?>
    
    <?php if (session()->get('level') == 1 || session()->get('level') == 3): ?>
    <li class="nav-item">
      <a class="nav-link" data-bs-target="#laporan-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-file-text"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="laporan-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
        <li>
          <a href="<?= base_url('home/lap_rm')?>">
            <i class="ri-account-pin-circle-fill"></i><span>Pendaftaran</span>
          </a>
        </li>
        <li>
          <a href="<?= base_url('home/lap_bayar')?>">
            <i class="ri-account-pin-circle-fill"></i><span>Pembayaran</span>
          </a>
        </li>
      </ul>
    </li><!-- End Laporan Nav -->
    <?php endif; ?>

    <li class="nav-heading">Pages</li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="users-profile.html">
        <i class="bi bi-person"></i>
        <span>Profile</span>
      </a>
    </li><!-- End Profile Page Nav -->

  

  </ul>
</aside><!-- End Sidebar -->
