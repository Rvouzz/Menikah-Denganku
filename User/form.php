<?php
session_start();
$judul = 'Dashboard';
// include '../proses/check_admin.php';
include '../connection.php';
?>
<?php include '../header.php'; ?>
<?php include '../sidebar.php'; ?>

<style>
  .text-pink {
    color: #d63384;
  }

  .bg-pink {
    background-color: #d63384;
  }

  .btn-pink {
    background-color: #d63384;
    color: white;
    border: none;
  }

  .btn-pink:hover {
    background-color: #c2185b;
  }
</style>
<!-- Content-->
<div class="container-fluid">
  <div class="card shadow-lg border-0">
    <div class="card-body">
      <form id="weddingForm" action="proses/simpan_semua_data.php" method="POST">
        <!-- Progress Step View -->
        <div class="mb-3">
          <span class="badge bg-secondary px-3 py-2">
            Langkah <span id="currentStepView">1</span> dari <span id="totalSteps">4</span>
          </span>
        </div>

        <div class="step-content">
          <!-- STEP 1: Pengantin Pria -->
          <div class="step" id="step-1">
            <h6 class="fw-bold text-white bg-primary px-3 py-2 rounded mb-3">Pengantin Pria</h6>
            <div class="row g-3 mb-3">
              <div class="col-md-6"><label class="form-label">Nama Lengkap</label><input type="text"
                  class="form-control" name="pp_nama_lengkap" required></div>
              <div class="col-md-6"><label class="form-label">Nama Panggilan</label><input type="text"
                  class="form-control" name="pp_nama_panggilan" required></div>
              <div class="col-md-6">
                <label class="form-label">Tempat & Tanggal Lahir</label>
                <div class="d-flex gap-2">
                  <input type="text" class="form-control" name="pp_tempat_lahir" placeholder="Tempat" required>
                  <input type="date" class="form-control" name="pp_tanggal_lahir" required>
                </div>
              </div>
              <div class="col-md-6"><label class="form-label">Alamat</label><input type="text" class="form-control"
                  name="pp_alamat" required></div>
              <div class="col-md-6"><label class="form-label">Pekerjaan</label><input type="text" class="form-control"
                  name="pp_pekerjaan" required></div>
              <div class="col-md-6"><label class="form-label">No HP / Email</label><input type="text"
                  class="form-control" name="pp_kontak" required></div>
              <div class="col-md-6"><label class="form-label">Anak ke</label><input type="text" class="form-control"
                  name="pp_anak_ke" required></div>
              <div class="col-md-6"><label class="form-label">Nama Ayah</label><input type="text" class="form-control"
                  name="pp_nama_ayah" required></div>
              <div class="col-md-6"><label class="form-label">Nama Ibu</label><input type="text" class="form-control"
                  name="pp_nama_ibu" required></div>
              <div class="col-md-6">
                <label class="form-label">Nama Saudara Kandung</label>
                <textarea class="form-control" name="pp_saudara_kandung" rows="4" placeholder="Pisahkan dengan koma"
                  required></textarea>
              </div>
            </div>
          </div>

          <!-- STEP 2: Pengantin Wanita -->
          <div class="step d-none" id="step-2">
            <h6 class="fw-bold text-white bg-primary px-3 py-2 rounded mb-3">Pengantin Wanita</h6>
            <div class="row g-3 mb-3">
              <div class="col-md-6"><label class="form-label">Nama Lengkap</label><input type="text"
                  class="form-control" name="pw_nama_lengkap" required></div>
              <div class="col-md-6"><label class="form-label">Nama Panggilan</label><input type="text"
                  class="form-control" name="pw_nama_panggilan" required></div>
              <div class="col-md-6">
                <label class="form-label">Tempat & Tanggal Lahir</label>
                <div class="d-flex gap-2">
                  <input type="text" class="form-control" name="pw_tempat_lahir" placeholder="Tempat" required>
                  <input type="date" class="form-control" name="pw_tanggal_lahir" required>
                </div>
              </div>
              <div class="col-md-6"><label class="form-label">Alamat</label><input type="text" class="form-control"
                  name="pw_alamat" required></div>
              <div class="col-md-6"><label class="form-label">Pekerjaan</label><input type="text" class="form-control"
                  name="pw_pekerjaan" required></div>
              <div class="col-md-6"><label class="form-label">No HP / Email</label><input type="text"
                  class="form-control" name="pw_kontak" required></div>
              <div class="col-md-6"><label class="form-label">Anak ke</label><input type="text" class="form-control"
                  name="pw_anak_ke" required></div>
              <div class="col-md-6"><label class="form-label">Nama Ayah</label><input type="text" class="form-control"
                  name="pw_nama_ayah" required></div>
              <div class="col-md-6"><label class="form-label">Nama Ibu</label><input type="text" class="form-control"
                  name="pw_nama_ibu" required></div>
              <div class="col-md-6">
                <label class="form-label">Nama Saudara Kandung</label>
                <textarea class="form-control" name="pw_saudara_kandung" rows="4" placeholder="Pisahkan dengan koma"
                  required></textarea>
              </div>
            </div>
          </div>

          <!-- STEP 3: Acara & Panitia -->
          <div class="step d-none" id="step-3">
            <h6 class="fw-bold text-white bg-primary px-3 py-2 rounded mb-3">Informasi Acara & Panitia</h6>
            <div class="row g-3 mb-3">
              <div class="col-md-6"><label class="form-label">Tanggal Acara</label><input type="date" name="tanggal"
                  class="form-control" required></div>
              <div class="col-md-6"><label class="form-label">Lokasi</label><input type="text" name="lokasi"
                  class="form-control" required></div>
              <div class="col-md-6"><label class="form-label">Total Undangan</label><input type="number"
                  name="total_undangan" class="form-control" required></div>
            </div>
            <div class="row g-3">
              <div class="col-md-6"><label class="form-label">Penasehat</label><input type="text" name="penasehat"
                  class="form-control" required></div>
              <div class="col-md-6"><label class="form-label">Ketua Panitia</label><input type="text"
                  name="ketua_panitia" class="form-control" required></div>
              <div class="col-md-6"><label class="form-label">Panitia Konsumsi</label><input type="text"
                  name="panitia_konsumsi" class="form-control"></div>
              <div class="col-md-6"><label class="form-label">Panitia Keamanan</label><input type="text"
                  name="panitia_keamanan" class="form-control"></div>
              <div class="col-md-6"><label class="form-label">Panitia Tamu</label><input type="text" name="panitia_tamu"
                  class="form-control"></div>
              <div class="col-md-6"><label class="form-label">Penjaga Buku Tamu & Souvenir</label><input type="text"
                  name="penjaga_buku_tamu" class="form-control"></div>
              <div class="col-md-6"><label class="form-label">Sambutan</label><input type="text" name="sambutan"
                  class="form-control"></div>
              <div class="col-md-6"><label class="form-label">Doa</label><input type="text" name="doa"
                  class="form-control"></div>
              <div class="col-md-12">
                <label class="form-label">Bridesmaids</label>
                <input type="text" name="bridesmaid_1" class="form-control mb-2" placeholder="Bridesmaid 1">
                <input type="text" name="bridesmaid_2" class="form-control mb-2" placeholder="Bridesmaid 2">
                <input type="text" name="bridesmaid_3" class="form-control" placeholder="Bridesmaid 3">
              </div>
            </div>
          </div>

          <!-- STEP 4: Vendor -->
          <div class="step d-none" id="step-4">
            <h6 class="fw-bold text-white bg-primary px-3 py-2 rounded mb-3">Vendor Pernikahan</h6>
            <div class="row g-3">
              <div class="col-md-6"><label class="form-label">Venue</label><input type="text" name="vendor_venue"
                  class="form-control" value="Fasum Perumahan Mantang"></div>
              <div class="col-md-6"><label class="form-label">Dekorasi</label><input type="text" name="vendor_dekorasi"
                  class="form-control" value="@safiraramlan.wedding"></div>
              <div class="col-md-6"><label class="form-label">Orgen Tunggal</label><input type="text"
                  name="vendor_orgen" class="form-control"></div>
              <div class="col-md-6"><label class="form-label">Rias Pengantin</label><input type="text"
                  name="vendor_rias_pengantin" class="form-control"></div>
              <div class="col-md-6"><label class="form-label">Rias Keluarga</label><input type="text"
                  name="vendor_rias_keluarga" class="form-control"></div>
              <div class="col-md-6"><label class="form-label">Wardrobe Pengantin</label><input type="text"
                  name="vendor_wardrobe_pengantin" class="form-control" value="@oja_weddingattire"></div>
              <div class="col-md-6"><label class="form-label">Wardrobe Keluarga</label><input type="text"
                  name="vendor_wardrobe_keluarga" class="form-control"></div>
              <div class="col-md-6"><label class="form-label">MC</label><input type="text" name="vendor_mc"
                  class="form-control"></div>
              <div class="col-md-6"><label class="form-label">Wedding Organizer</label><input type="text"
                  name="vendor_wo" class="form-control"></div>
              <div class="col-md-6"><label class="form-label">Videographer</label><input type="text"
                  name="vendor_videographer" class="form-control" value="@hfvisual.pro"></div>
              <div class="col-md-6"><label class="form-label">Photographer</label><input type="text"
                  name="vendor_photographer" class="form-control" value="@etermo.studio"></div>
              <div class="col-md-6"><label class="form-label">Catering</label><input type="text" name="vendor_catering"
                  class="form-control" value="Mantang Catering"></div>
              <div class="col-md-6"><label class="form-label">Henna</label><input type="text" name="vendor_henna"
                  class="form-control"></div>
            </div>
          </div>
        </div>

        <!-- Navigation -->
        <div class="d-flex justify-content-between mt-4">
          <button type="button" class="btn btn-outline-secondary" id="prevBtn" disabled>Previous</button>
          <button type="button" class="btn btn-primary" id="nextBtn">Next</button>
          <button type="submit" class="btn btn-success d-none" id="submitBtn"><i class="fas fa-save me-1"></i>
            Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>







<!-- Close Body Wrapper-->
</div>
</div>
<?php include '../script.php'; ?>
</body>

<script>
  const steps = document.querySelectorAll('.step');
  const prevBtn = document.getElementById('prevBtn');
  const nextBtn = document.getElementById('nextBtn');
  const submitBtn = document.getElementById('submitBtn');
  const currentStepView = document.getElementById('currentStepView');
  const totalSteps = document.getElementById('totalSteps');

  let currentStep = 0;
  const total = steps.length;
  totalSteps.textContent = total;

  function showStep(index) {
    steps.forEach((step, i) => {
      step.classList.toggle('d-none', i !== index);
    });
    prevBtn.disabled = index === 0;
    nextBtn.classList.toggle('d-none', index === total - 1);
    submitBtn.classList.toggle('d-none', index !== total - 1);
    currentStepView.textContent = index + 1;
  }

  function validateCurrentStepFields() {
    const inputs = steps[currentStep].querySelectorAll('input, textarea, select');
    for (const input of inputs) {
      if (input.hasAttribute('required') && !input.value.trim()) {
        return false;
      }
    }
    return true;
  }

  prevBtn.addEventListener('click', () => {
    if (currentStep > 0) {
      currentStep--;
      showStep(currentStep);
    }
  });

  nextBtn.addEventListener('click', () => {
    if (validateCurrentStepFields()) {
      currentStep++;
      showStep(currentStep);
    } else {
      Swal.fire({
        icon: 'warning',
        title: 'Data Belum Lengkap',
        text: 'Silakan lengkapi semua data yang wajib diisi sebelum melanjutkan.',
        confirmButtonColor: '#3085d6'
      });
    }
  });

  showStep(currentStep);
</script>


</html>