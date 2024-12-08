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
            <h5 class="card-title">Laporan pendaftaran</h5>
            <form action="<?= base_url('home/tabelrm')?>" method="POST">
               <div class="row">
                <div class="col">
                <label for="tanggalawal" class="form-label">Tanggal Awal:</label>
                <input type="date" class="form-control" placeholder="Tanggal Awal" name="tanggalawal">
              </div>
              <div class="col">
                <label for="tanggalakhir" class="form-label">Tanggal Akhir:</label>
                <input type="date" class="form-control" placeholder="Tanggal Akhir" name="tanggalakhir">
              </div>

             
              <div class="col d-flex align-items-end" class="form-control">
                <button type="print" class="btn btn-primary" style="width: 100px;">
                  <i class="fas fa-print"></i>
                  Print
                </button>
              </div>
            </form>

          <!--   <form action="<?= base_url('home/downloadTCPDF') ?>" method="post" target="_blank">
              <div class="row">
                 <div class="col">
                <label for="tanggalawal" class="form-label">Tanggal Awal:</label>
                <input type="date" class="form-control" placeholder="Tanggal Awal" name="tanggalawal">
              </div>
              <div class="col">
                <label for="tanggalakhir" class="form-label">Tanggal Akhir:</label>
                <input type="date" class="form-control" placeholder="Tanggal Akhir" name="tanggalakhir">
              </div>


                <div class="col d-flex align-items-end">
                  <button type="submit" class="btn btn-danger" style="width: 100px;">
                    <i class="fas fa-file-pdf"></i> TCPDF
                  </button>
                </div>
              </form>
 --><!-- 
              <form action="<?= base_url('home/downloadDOMPDF') ?>" method="post" target="_blank">
                <div class="row">
                   <div class="col">
                <label for="tanggalawal" class="form-label">Tanggal Awal:</label>
                <input type="date" class="form-control" placeholder="Tanggal Awal" name="tanggalawal">
              </div>
              <div class="col">
                <label for="tanggalakhir" class="form-label">Tanggal Akhir:</label>
                <input type="date" class="form-control" placeholder="Tanggal Akhir" name="tanggalakhir">
              </div>

                  <div class="col d-flex align-items-end">
                    <button type="submit" class="btn btn-danger" style="width: 100px;">
                      <i class="fas fa-file-pdf"></i> DOMPDF
                    </button>
                  </div>
                </form>


                <form class="mt-3" action="<?= base_url('home/excel_rm')?>" method="POST">
                  <div class="row">
                      <div class="col">
                <label for="tanggalawal" class="form-label">Tanggal Awal:</label>
                <input type="date" class="form-control" placeholder="Tanggal Awal" name="tanggalawal">
              </div>
              <div class="col">
                <label for="tanggalakhir" class="form-label">Tanggal Akhir:</label>
                <input type="date" class="form-control" placeholder="Tanggal Akhir" name="tanggalakhir">
              </div>
 -->
                   <!-- <div class="col">
                <label for="tanggal" class="form-label">Tanggal Berobat:</label>
                <input type="date" class="form-control" placeholder="Tanggal Berobat" name="tanggal">
              </div> -->
<!-- 
                  <div class="col d-flex align-items-end">
                    <button class="btn btn-success" style="width: 100px;" formtarget="_blank">
                      <i class="fas fa-file-excel"></i> Excel
                    </button> -->
                  </div>
                </div>
              </form>

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->