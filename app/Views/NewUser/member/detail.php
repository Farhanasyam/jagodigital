<?= $this->extend('NewUser/layout/app'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4">
    <h2 class="mb-4">Detail Member</h2>
    
    <div class="card mb-3 shadow-sm" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('uploads/photos/' . $member->foto_member) ?>" class="card-img img-fluid rounded-start" alt="<?= $member->nama_member ?>">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h3 class="card-title font-weight-bold"><?= $member->nama_member ?? 'Nama Tidak Diketahui' ?></h3>
                    <p class="card-text"><strong>Provinsi:</strong> <?= $member->nama_provinsi ?? 'Provinsi Tidak Diketahui' ?></p>
                    <p class="card-text"><strong>Kabupaten/Kota:</strong> <?= $member->nama_kabkota ?? 'Kabupaten/Kota Tidak Diketahui' ?></p>
                    <p class="card-text"><strong>Alamat:</strong> <?= $member->alamat_member ?? 'Alamat Tidak Diketahui' ?></p>
                    <p class="card-text"><strong>No Telepon:</strong> <?= $member->no_hp_member ?? 'No Telepon Tidak Diketahui' ?></p>
                    <p class="card-text"><strong>Email:</strong> <?= $member->email_member ?? 'Email Tidak Diketahui' ?></p>
                </div>
            </div>
        </div>
    </div>

    <a href="<?= base_url('/member') ?>" class="btn btn-primary">
        <i class="fas fa-arrow-left"></i> Kembali ke Daftar Member
    </a>
</div>

<?= $this->endSection(); ?>
