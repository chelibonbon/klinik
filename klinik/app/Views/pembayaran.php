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
                        <h5 class="card-title">Pembayaran</h5>
                        <form action="<?= base_url('home/submit_pembayaran') ?>" method="POST" enctype="multipart/form-data">
                            <table>
                                <tr>
                                    <td>Biaya Dokter</td>
                                    <td><input type="number" class="form-control" id="biaya_dokter" name="biaya_dokter" value="<?= $takdirestui->biaya_dokter ?>" oninput="calculateTotal()"></td>
                                </tr>
                                <tr>
                                    <td>Biaya Fasilitas</td>
                                    <td><input type="number" class="form-control" id="biaya_fasilitas" name="biaya_fasilitas" value="<?= $takdirestui->biaya_fasilitas ?>" oninput="calculateTotal()"></td>
                                </tr>
                                <tr>
                                    <td>Biaya Obat</td>
                                    <td><input type="number" class="form-control" id="biaya_obat" name="biaya_obat" value="<?= $takdirestui->harga ?>" oninput="calculateTotal()"></td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td><input type="number" class="form-control" id="total" name="total" value="<?= $takdirestui->harga + $takdirestui->biaya_fasilitas + $takdirestui->biaya_dokter ?>" readonly></td>
                                </tr>
                                <tr>
                                    <td>Metode Pembayaran</td>
                                    <td><input type="text" class="form-control" name="metode_pembayaran" value="<?= $takdirestui->metode_pembayaran ?>"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="hidden" name="id_rm" value="<?= $takdirestui->id_rm ?>">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <input type="reset" value="Reset" class="form-control" onclick="calculateTotal()">
                                        <input type="button" value="Kembali" class="form-control">
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

</main>

<!-- JavaScript for Auto-Calculate -->
<script>
function calculateTotal() {
    // Get values from form fields
    let biayaDokter = parseFloat(document.getElementById("biaya_dokter").value) || 0;
    let biayaFasilitas = parseFloat(document.getElementById("biaya_fasilitas").value) || 0;
    let biayaObat = parseFloat(document.getElementById("biaya_obat").value) || 0;

    // Calculate total
    let total = biayaDokter + biayaFasilitas + biayaObat;

    // Update the total field
    document.getElementById("total").value = total;
}
</script>
