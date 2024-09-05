<?= $this->extend('NewUser/layout/app'); ?>
<?= $this->section('content'); ?>

<!-- artikel-detail section start -->
<section class="artikel-detail-section">
    <div class="container">
        <!-- Article Header -->
        <div class="artikel-detail-header text-center">
            <h1><?= esc($artikel['judul_artikel']) ?></h1>
            <p class="text-muted"><i class="fas fa-calendar-alt"></i> <?= date('d M Y', strtotime($artikel['created_at'])) ?></p>
        </div>

        <!-- Article Content -->
        <div class="artikel-detail-content">
            <img src="<?= base_url('uploads/upload_artikel/' . $artikel['foto_artikel']) ?>" class="artikel-img" alt="<?= esc($artikel['judul_artikel']) ?>">
            <div class="artikel-text">
                <p><?= esc($artikel['deskripsi_artikel']) ?></p>
            </div>
        </div>

        <!-- Back Button -->
        <div class="artikel-detail-footer text-center">
            <a href="<?= base_url('/artikel') ?>" class="btn btn-primary">Kembali ke Artikel</a>
        </div>
    </div>
</section>
<!-- artikel-detail section end -->

<!-- recommended articles section start -->
<section class="recommended-articles-section">
    <div class="container">
        <h2 class="text-center">Artikel Rekomendasi</h2>
        <div class="row">
            <?php foreach ($recommendedArticles as $item): ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-0">
                        <img src="<?= base_url('uploads/upload_artikel/' . $item['foto_artikel']) ?>" class="card-img-top" alt="<?= esc($item['judul_artikel']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($item['judul_artikel']) ?></h5>
                            <p class="card-text"><?= character_limiter(strip_tags($item['deskripsi_artikel']), 100) ?></p>
                            <a href="/artikel/<?= esc($item['slug']) ?>" class="btn btn-primary">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- recommended articles section end -->

<style>
    /* Artikel Detail Section */
    .artikel-detail-section {
        padding: 60px 15px;
        background-color: #f9f9f9;
        border-bottom: 1px solid #ddd;
    }

    .artikel-detail-header h1 {
        font-size: 2.5rem;
        color: #333;
        margin-bottom: 10px;
    }

    .artikel-detail-header p {
        font-size: 1rem;
        color: #777;
    }

    .artikel-detail-content {
        margin-top: 30px;
        text-align: center;
    }

    .artikel-img {
        width: 100%;
        max-width: 800px;
        max-height: 300px;
        /* Set a maximum height for images */
        min-height: 200px;
        /* Set a minimum height for images */
        object-fit: cover;
        /* Ensure the image covers the area without distortion */
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .artikel-text {
        margin-top: 20px;
        line-height: 1.6;
        font-size: 1.1rem;
        color: #555;
    }

    .artikel-detail-footer {
        margin-top: 40px;
    }

    .btn-primary {
        background-color: #87D5C8;
        color: #fff;
        font-weight: bold;
        border-radius: 5px;
        padding: 10px 20px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #66b2a5;
    }

    /* Recommended Articles Section */
    .recommended-articles-section {
        padding: 60px 15px;
        background-color: #fff;
    }

    .recommended-articles-section h2 {
        font-size: 2rem;
        color: #333;
        margin-bottom: 20px;
    }

    .card {
        border-radius: 10px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        /* Ensure uniform card heights */
        height: 100%;
        /* Adjusts to fill the available height */
    }

    .card-img-top {
        width: 100%;
        height: 200px;
        /* Set a fixed height for the card images */
        object-fit: cover;
        /* Ensure the image covers the area without distortion */
        border-bottom: 1px solid #ddd;
    }

    .card-body {
        padding: 20px;
        flex-grow: 1;
        /* Allow the body to grow and fill available space */
        display: flex;
        flex-direction: column;
    }

    .card-title {
        font-size: 1.25rem;
        color: #333;
        margin-bottom: 10px;
    }

    .card-text {
        font-size: 1rem;
        color: #555;
        flex-grow: 1;
        /* Allow text to grow and fill available space */
    }

    .btn-primary {
        background-color: #87D5C8;
        color: #fff;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #66b2a5;
    }

    @media (max-width: 768px) {
        .artikel-detail-header h1 {
            font-size: 2rem;
        }

        .artikel-detail-content {
            padding: 0 15px;
        }

        .artikel-text {
            font-size: 1rem;
        }
    }
</style>

<?= $this->endsection('content'); ?>