<?= $this->extend('NewUser/layout/app'); ?>
<?= $this->section('content'); ?>

<link href="<?= base_url('assets-new/css/pendaftaran_member.css') ?>" rel="stylesheet">

<!-- Tambahkan konten tambahan di sini -->
<div class="container mt-5 text-center-custom">
    <h2 class="text-custom-title">Cara Pendaftaran</h2>
    <p class="text-custom-paragraph">Ayo gabung dengan pelatihan Jago Digital Marketing dan jadi sukses bareng kami</p>
</div>

<!-- Gambar dengan teks di atasnya -->
<div class="card">
    <img src="<?= base_url('assets-new/images/bg1.jpg') ?>" alt="Deskripsi gambar" class="img-fluid">
    <div class="overlay-text">
        <h1><span class="highlight-yellow">Gimana</span><span class="highlight-white"> sih cara daftar</span></h1>
        <h1><span class="highlight-white">Kepelatihan</span><span class="highlight-yellow"> Jago Digital Marketing</span></h1>
        <p class="text-custom-paragraph highlight-black">Masih bingung cara daftarnya? yuk buruan simak video berikut ini. Setelah disimak jangan lupa langsung daftarkan diri yaa!!!</p>

        <!-- Tombol Daftar -->
        <a href="#" class="btn btn-warning btn-lg mt-3" id="btn-daftar">Daftar Sekarang</a>
    </div>
</div>

<!-- Form Pendaftaran -->
<div class="container-center">
    <div class="form-container">
        <h2><span class="highlight-purple">Dukung Usaha</span><span class="highlight-black"> Anda Untuk Mendapatkan Persiapan Terbaik</span></h2>

        <!-- Form pendaftaran -->
        <form id="pendaftaranForm" action="<?= base_url('/pendaftaran_member') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?> <!-- Tambahkan ini untuk memasukkan CSRF token -->

            <!-- Hidden field for role -->
            <input type="hidden" name="role" value="user">

            <!-- Field yang harus diisi -->
            <div class="form-group">
                <label for="nama_member">Nama Lengkap:</label>
                <input type="text" id="nama_member" name="nama_member" required placeholder="Masukkan Nama">
            </div>

            <div class="form-group">
                <label for="no_hp_member">Nomor WhatsApp:</label>
                <input type="text" id="no_hp_member" name="no_hp_member" required placeholder="Masukkan No WhatsApp">
            </div>

            <div class="form-group">
                <label for="email_member">Email:</label>
                <input type="email" id="email_member" name="email_member" required placeholder="Masukkan Email">
            </div>

            <div class="form-group">
                <label for="alamat_member">Alamat:</label>
                <input type="text" id="alamat_member" name="alamat_member" required placeholder="Masukkan Alamat">
            </div>

            <div class="form-group">
                <label for="pekerjaan_member">Pekerjaan:</label>
                <input type="text" id="pekerjaan_member" name="pekerjaan_member" required placeholder="Masukkan Pekerjaan">
            </div>

            <div class="form-group">
                <label for="pendidikan_member">Pendidikan:</label>
                <input type="text" id="pendidikan_member" name="pendidikan_member" required placeholder="Masukkan Pendidikan">
            </div>

            <div class="form-group">
                <label for="sertifikasi_member">Sertifikasi (Jika Ada):</label>
                <input type="text" id="sertifikasi_member" name="sertifikasi_member" placeholder="Masukkan Sertifikasi">
            </div>

            <div class="form-group">
                <label>Jenis Kelamin:</label>
                <select name="jenis_kelamin" required>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required placeholder="Masukkan Username">
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required placeholder="Masukkan Password">
            </div>

            <div class="form-group">
                <label for="foto_member">Foto Profil:</label>
                <input type="file" id="foto_member" name="foto_member" accept="image/*">
            </div>

            <div class="form-group">
                <label for="cv_member">Upload CV:</label>
                <input type="file" id="cv_member" name="cv_member" accept=".pdf, .doc, .docx">
            </div>

            <div class="form-group">
                <label for="slug">Slug:</label>
                <input type="text" id="slug" name="slug" required placeholder="Masukkan Slug">
            </div>

            <div class="form-group">
                <label for="id_dpc">ID DPC:</label>
                <input type="text" id="id_dpc" name="id_dpc" placeholder="Masukkan ID DPC">
            </div>

            <div class="form-group">
                <label for="status_kepengurusan">Status Kepengurusan:</label>
                <input type="text" id="status_kepengurusan" name="status_kepengurusan" placeholder="Masukkan Status Kepengurusan">
            </div>

            <div class="form-group">
                <label for="ig_member">Instagram:</label>
                <input type="text" id="ig_member" name="ig_member" placeholder="Masukkan Instagram">
            </div>

            <div class="form-group">
                <label for="fb_member">Facebook:</label>
                <input type="text" id="fb_member" name="fb_member" placeholder="Masukkan Facebook">
            </div>

            <button type="submit" class="btn btn-primary">Daftar</button>
        </form>
    </div>
</div>

<!-- Pop-up Konfirmasi -->
<div id="popup-konfirmasi" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Pendaftaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin mendaftar sekarang?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" id="confirm-daftar" class="btn btn-primary">Ya, Daftar Sekarang</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('btn-daftar').addEventListener('click', function(event) {
        event.preventDefault();
        $('#popup-konfirmasi').modal('show');
    });

    document.getElementById('confirm-daftar').addEventListener('click', function() {
        document.getElementById('pendaftaranForm').submit();
    });
</script>

<?= $this->endsection('content'); ?>