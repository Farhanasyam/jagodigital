<?php $this->setVar('title', 'Edit Content Planner'); ?>
<?= $this->extend('NewUser/layout/app'); ?>
<?= $this->section('content'); ?>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />

<style>
    .card {
        background-color: #e9ecef;
        padding: 20px;
        border-radius: 30px;
        margin-bottom: 20px;
    }

    .card-content {
        padding: 15px;
        background-color: #ffff;
    }

    .container {
        margin-top: 20px;
    }

    .header {
        margin-top: 30px;
        position: relative;
        padding-bottom: 20px;
    }

    .line-separator {
        width: 100%;
        height: 2px;
        background-color: #000;
        border: none;
        margin-top: 5px;
        margin-bottom: 40px;
    }

    #upload {
        opacity: 0;
    }

    #upload-label {
        position: absolute;
        top: 50%;
        left: 1rem;
        transform: translateY(-50%);
    }

    .image-area {
        border: 2px dashed;
        padding: 1.6rem;
        position: relative;
        text-align: center;
    }

    .image-area::before {
        content: 'Uploaded image result';
        font-weight: bold;
        text-transform: uppercase;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 0.8rem;
        z-index: 1;
    }

    .image-area img {
        z-index: 2;
        position: relative;
    }


    .date {
        font-weight: bold;
        margin-bottom: 20px;
    }

    .calendar-icons {
        display: flex;
        justify-content: flex-end;
    }

    .calendar-icons i {
        margin-left: 10px;
        cursor: pointer;
    }

    .form-control,
    .btn {
        border-radius: 0.25rem;
        /* Bootstrap default border-radius */
    }

    .button-container {
        display: flex;
        gap: 10px;
    }

    .button-container .btn {
        flex-shrink: 0;
        /* Mencegah tombol mengecil */
        white-space: nowrap;
        /* Mencegah teks membungkus ke baris berikutnya */
    }

    @media (max-width: 320px) {
        .d-flex {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .calendar-controls {
            margin-top: 10px;
            width: 100%;
        }
    }

    @media (max-width: 375px) {
        .d-flex {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .calendar-controls {
            margin-top: 10px;
            width: 100%;
        }
    }
</style>

<!-- start text header and line -->
<div class="container">
    <div class="mt-4">
        <div class="card bg-white">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="display-7 mb-0">Edit Content Planner</h2>
                </div>
                <div class="dropdown">
                    <button id="current-page-btn" class="btn btn-primary dropdown-toggle px-3" style="border-radius: 10px;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Halaman Saat Ini
                    </button>
                    <ul class="dropdown-menu  dropdown-menu-right">
                        <li><a class="dropdown-item" href="<?= base_url('/content-calendar'); ?>">Content Calender</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('/set-up'); ?>">Set Up</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('/kpi'); ?>">Matrics</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <form action="<?= base_url('/content-planner/add'); ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
        <div class="card">
            <!-- Info Date -->
            <div class="mb-4 left-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 id="dateDisplay" class="m-0 text-primary fw-bold"></h5>
                </div>
            </div>



            <div class="row">
                <!-- Upload Image -->
                <div class="col-md-5 mb-4">
                    <input type="hidden" name="old_file_content" value="<?= esc($c_planners['file_content']) ?>">
                    <!-- Upload image input-->
                    <label>Upload Image</label>
                    <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                        <input name="file_content" id="upload" type="file" onchange="readURL(this);"
                            class="form-control border-0">
                        <?php $fileContent = isset($c_planners['file_content']) ? esc($c_planners['file_content']) : 'No file uploaded'; ?>
                        <label id="upload-label" for="upload" class="font-weight-light text-muted">
                            File name: <?= $fileContent ?>
                        </label>
                        <div class="input-group-append">
                            <label class="btn btn-light m-0 rounded-pill px-4"> <i
                                    class="fa fa-cloud-upload mr-2 text-muted"></i><small
                                    class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                        </div>
                    </div>

                    <!-- Uploaded image area-->
                    <p class="text-center font-weight-light mt-4 text-muted">The image uploaded will be rendered inside the box
                        below.</p>
                    <?php if (!empty($c_planners['file_content'])): ?>
                        <div class="image-area mt-4 text-muted">
                            <img id="imageResult" src="<?= base_url('uploads/file_content/' . esc($c_planners['file_content'])) ?>" alt="Uploaded Image" class="img-fluid rounded shadow-sm mx-auto d-block">
                        </div>
                    <?php endif; ?>

                </div>

                <!-- Form -->
                <div class="col-md-7">
                    <div class="row">
                        <!-- Social Media -->
                        <div class="form-group">
                            <label>Social Media</label>
                            <select class="form-control" name="sosial_media" required>
                                <?php foreach ($sosmeds as $sosmed): ?>
                                    <option value="<?= $sosmed['nama_sosial_media'] ?>"
                                        <?= $sosmed['nama_sosial_media'] == $c_planners['sosial_media'] ? 'selected' : '' ?>>
                                        <?= $sosmed['nama_sosial_media'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Content Type -->
                        <div class="col-md-4 mb-2">
                            <div class="form-group">
                                <label>Content Type</label>
                                <select class="form-control" name="content_type" required>
                                    <?php foreach ($c_types as $c_type): ?>
                                        <option value="<?= $c_type['nama_content_type'] ?>"
                                            <?= $c_type['nama_content_type'] == $c_planners['content_type'] ? 'selected' : '' ?>>
                                            <?= $c_type['nama_content_type'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <!-- Content Pillar -->
                        <div class="col-md-4 mb-2">
                            <div class="form-group">
                                <label>Content Pillar</label>
                                <select class="form-control" name="content_pillar" required>
                                    <?php foreach ($c_pillars as $c_pillar): ?>
                                        <option value="<?= $c_pillar['nama_content_pillar'] ?>"
                                            <?= $c_pillar['nama_content_pillar'] == $c_planners['content_pillar'] ? 'selected' : '' ?>>
                                            <?= $c_pillar['nama_content_pillar'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="col-md-4 mb-2">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status" required>
                                    <?php foreach ($statuses as $status): ?>
                                        <option value="<?= $status['nama_status'] ?>"
                                            <?= $status['nama_status'] == $c_planners['status'] ? 'selected' : '' ?>>
                                            <?= $status['nama_status'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Caption -->
                    <div class="form-group">
                        <label>Caption</label>
                        <textarea class="form-control" rows="5" placeholder="Caption" name="caption"><?= esc($c_planners['caption']) ?></textarea>
                    </div>

                    <!-- CTA Link -->
                    <div class="form-group">
                        <label>CTA / Link</label>
                        <textarea type="text" class="form-control" placeholder="CTA / Link" name="cta_link"><?= esc($c_planners['cta_link']) ?></textarea>
                    </div>

                    <!-- Hashtag -->
                    <div class="form-group">
                        <label>Hashtag</label>
                        <textarea type="text" class="form-control" placeholder="Hashtag" name="hashtag"><?= esc($c_planners['hashtag']) ?></textarea>
                    </div>

                    <!-- Date -->
                    <div class="form-group">
                        <label>Post Date</label>
                        <input type="date" class="form-control" name="created_at" id="dateInput" required>
                    </div>

                    <!-- Button Add Content -->
                    <div class="d-flex justify-content-center mt-4">
                        <button type="submit" class="btn btn-warning">
                            Ubah
                        </button>
                    </div>

    </form>
</div>
</div>
</div>
</div>

<!-- jQuery via CDN -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<!-- Bootstrap Bundle with Popper via CDN -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<!-- Upload Image with Preview -->
<script>
    // Mengambil elemen button dropdown
    const currentPageBtn = document.getElementById("current-page-btn");

    // Mengambil nama halaman saat ini dari title dokumen
    const currentPage = document.title;

    // Mengganti teks pada tombol dropdown dengan nama halaman
    currentPageBtn.textContent = currentPage;

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imageResult').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(function() {
        $('#upload').on('change', function() {
            readURL(this);
        });
    });

    var input = document.getElementById('upload');
    var infoArea = document.getElementById('upload-label');

    input.addEventListener('change', showFileName);

    function showFileName(event) {
        var input = event.srcElement;
        var fileName = input.files[0].name;
        infoArea.textContent = 'File name: ' + fileName;
    }

    document.addEventListener('DOMContentLoaded', function() {
        var dateInput = document.getElementById('dateInput');
        var dateDisplay = document.getElementById('dateDisplay');

        // Ambil tanggal saat ini
        var dateData = new Date("<?= date('Y-m-d', strtotime($c_planners['created_at'])) ?>");
        var options = {
            day: '2-digit',
            month: 'long',
            year: 'numeric'
        };
        var formattedDate = dateData.toLocaleDateString('id-ID', options); // Format tanggal sesuai lokal ID

        // Tampilkan tanggal saat ini
        dateDisplay.textContent = formattedDate;

        // Set nilai input date ke tanggal saat ini
        dateInput.valueAsDate = dateData;

        dateInput.addEventListener('change', function() {
            var selectedDate = new Date(dateInput.value);
            var formattedDate = selectedDate.toLocaleDateString('id-ID', options);

            dateDisplay.textContent = formattedDate;
        });
    });
</script>


<?= $this->endSection('content'); ?>