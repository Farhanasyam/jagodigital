<?= $this->extend('NewUser/layout/app'); ?>
<?= $this->section('content'); ?>
<style>
    .hashtag-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        /* Creates columns that fit within the container */
        gap: 10px;
        /* Space between checkboxes and labels */
    }

    .hashtag-item {
        display: flex;
        /* Align checkbox and label horizontally */
        align-items: center;
        /* Center checkbox and label vertically */
    }

    .hashtag-item input[type="checkbox"] {
        margin-right: 10px;
        /* Space between checkbox and label text */
        cursor: pointer;
    }

    .card-body {
        margin-top: 10px;
    }

    .card-body {
        min-height: 200px;
    }

    .card-petunjuk {
        background-color: #5865f2;
    }
</style>
<div class="container mt-4">
    <div class="row">
        <!-- Left Panel -->
        <div class="col-md-6 col-lg-8 mb-4">
            <div class="card">
                <div class="card-body">
                    <img src="<?= base_url('assets-new/images/logo.png') ?>" alt="Logo" style="height: 40px;">
                    <h2 class="text-center mb-4"></i> Hashtag Generator</h2>
                    <form id="hashtag-form">
                        <div class="mb-3">
                            <label for="topic" class="form-label">Topik atau caption <span class="text-danger">*</span></label>
                            <input type="text" id="hashtag-input" class="form-control" placeholder="Masukan topik atau kata tanpa spasi">
                            <div id="alert-placeholder" class="mt-2"></div>
                        </div>
                        <button type="button" id="generate-btn" class="btn btn-primary w-100"><i class="fas fa-cogs"></i> Generate</button>
                    </form>

                    <div class="card mt-3">
                        <div class="card-body">
                            <div id="hasil" class="hashtag-container"></div>
                        </div>
                    </div>
                    <button id="copy-btn" class="btn btn-success mt-3"><i class="fas fa-copy"></i> Copy</button>
                </div>
            </div>
        </div>

        <!-- Right Panel -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card card-petunjuk">
                <div class="card-body text-white">
                    <h4 class="text-center">Cara Penggunaan</h4>
                    <p class="paragraf">Tingkatkan jangkauan media sosial Anda dengan Pembuat Tagar kami yang canggih. Buat tagar yang relevan dan sedang tren untuk meningkatkan visibilitas konten Anda dan menarik minat audiens target Anda di berbagai platform.</p>
                    <ul class="list-unstyled mt-4">
                        <li class="mb-2"><i class="fas fa-check-circle"></i> Masukan kata atau topik yang terkait dengan konten</li>
                        <li class="mb-2"><i class="fas fa-check-circle"></i> Tekan Generate dan Pilih Hashtag yang ingin dipakai</li>
                        <li><i class="fas fa-check-circle"></i> Pilih Copy untuk menyalin hashtag</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JavaScript Libraries -->
<script src="<?= base_url('hashtag_generator/hashtag.js'); ?>"></script>

<?= $this->endsection(); ?>