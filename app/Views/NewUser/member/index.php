<?= $this->extend('NewUser/layout/app'); ?>
<?= $this->section('content'); ?>

<?php
// Get the session object
$session = session();
$loggedIn = $session->get('logged_in');
?>

<?php if ($loggedIn): ?>

  <!-- Section Member -->
  <section class="member-section">
      <div class="container">
          <h2>Daftar Member</h2>
          <?php if (empty($members)) : ?>
              <div class="row mt-3">
                  <div class="col-lg-12">
                      <div class="container text-center" style="min-height: 50vh; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                          <p>Tidak Ada Member yang Tersedia</p>
                      </div>
                  </div>
              </div>
          <?php else : ?>
              <div class="row mt-3">
                  <?php foreach ($members as $member) : ?>
                      <div class="col-4" style="max-width: 250px;">
                          <div class="card" style="width: 100%; height: 350px; display: flex; flex-direction: column; cursor: pointer; border-radius: 8px; transition: box-shadow 0.3s, transform 0.3s;">
                              <img src="<?= base_url('uploads/photos/' . $member->foto_member) ?>" class="card-img-top" alt="<?= $member->nama_member ?>" style="height: 150px; object-fit: cover; border-top-left-radius: 8px; border-top-right-radius: 8px;">
                              <div class="card-body d-flex flex-column" style="flex-grow: 1;">
                                  <h6 class="card-title" style="flex-grow: 0; margin-bottom: 10px; word-wrap: break-word; white-space: normal;"><?= $member->nama_member ?? 'Nama Tidak Diketahui' ?></h6>
                                  <p class="card-text" style="flex-grow: 1; word-wrap: break-word; white-space: normal;">
                                      <?= $member->nama_provinsi ?? 'Provinsi Tidak Diketahui' ?>
                                  </p>
                                  <a href="<?= base_url('/NewUser/member/detail/' . $member->id_member) ?>" class="btn btn-primary">Lihat Profil</a>
                              </div>
                          </div>
                      </div>
                  <?php endforeach; ?>
              </div>
          <?php endif; ?>
      </div>
  </section>

<?php else: ?>

  <!-- Other content for not logged in users -->

<?php endif; ?>

<?= $this->endSection(); ?>
