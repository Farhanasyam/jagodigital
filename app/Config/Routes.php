<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Homectrl');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/',  'NewUser\BerandaController::index');
$routes->get('/about', 'NewUser\BerandaController::about');

$routes->get('/video', 'NewUser\VideoController::index');
$routes->get('/video/detail/(:num)', 'NewUser\VideoController::detail/$1');
$routes->get('/video/kategori/(:num)', 'NewUser\VideoController::categoryDetails/$1');

$routes->get('/artikel', 'NewUser\ArtikelController::artikel');
$routes->get('/artikel/all', 'NewUser\ArtikelController::all');
$routes->get('/artikel/(:segment)', 'NewUser\ArtikelController::detail/$1');

$routes->get('/pengumuman', 'NewUser\PengumumanController::pengumuman');
$routes->get('/pengumuman/all', 'NewUser\PengumumanController::all');
$routes->get('/pengumuman/(:segment)', 'NewUser\PengumumanController::detail/$1');

$routes->get('/berita', 'NewUser\BeritaController::berita');
$routes->get('/berita/all', 'NewUser\BeritaController::all');
$routes->get('/berita/(:segment)', 'NewUser\BeritaController::detail/$1');

$routes->get('/kontak', 'NewUser\BerandaController::kontak');


//ADMIN
$routes->get('login', 'Login::index');
$routes->post('login/process', 'Login::process');
$routes->get('logout', 'Login::logout');

$routes->get('admin', 'admin\Dashboardctrl::routetoDashboard');
$routes->get('admin/dashboard', 'admin\Dashboardctrl::index');

// Berita
$routes->get('admin/berita/index', 'admin\Berita::index');
$routes->get('admin/berita/tambah', 'admin\Berita::tambah');
$routes->post('admin/berita/proses_tambah', 'admin\Berita::proses_tambah');
$routes->get('/admin/berita/edit/(:num)', 'admin\Berita::edit/$1');
$routes->post('admin/berita/proses_edit/(:num)', 'admin\Berita::proses_edit/$1');
$routes->get('admin/berita/delete/(:any)', 'admin\Berita::delete/$1');


$routes->get('admin/artikel/index', 'admin\ArtikelController::index');
$routes->get('admin/artikel/tambah', 'admin\ArtikelController::create');
$routes->post('admin/artikel/store', 'admin\ArtikelController::store');
$routes->get('admin/artikel/delete/(:num)', 'admin\ArtikelController::delete/$1');
$routes->get('admin/artikel/edit/(:num)', 'admin\ArtikelController::edit/$1');
$routes->post('admin/artikel/update/(:num)', 'admin\ArtikelController::update/$1');

$routes->get('admin/kategori/index', 'admin\Kategori::index');
$routes->get('admin/kategori/tambah', 'admin\Kategori::tambah');
$routes->post('admin/kategori/proses_tambah', 'admin\Kategori::proses_tambah');
$routes->get('admin/kategori/edit/(:num)', 'admin\Kategori::edit/$1');
$routes->post('admin/kategori/proses_edit/(:num)', 'admin\Kategori::proses_edit/$1');
$routes->get('admin/kategori/delete/(:any)', 'admin\Kategori::delete/$1');

$routes->group('admin', function ($routes) {
    // Routes for Provinsi
    $routes->get('provinsi', 'admin\Provinsi::index');
    $routes->get('provinsi/tambah', 'admin\Provinsi::tambah');
    $routes->post('provinsi/proses_tambah', 'admin\Provinsi::proses_tambah');
    $routes->get('provinsi/edit/(:num)', 'admin\Provinsi::edit/$1');
    $routes->post('provinsi/proses_edit/(:num)', 'admin\Provinsi::proses_edit/$1');
    $routes->get('provinsi/delete/(:num)', 'admin\Provinsi::delete/$1');

    // Routes for Kabkota
    $routes->get('kabkota', 'admin\Kabkota::index');
    $routes->get('kabkota/tambah', 'admin\Kabkota::tambah');
    $routes->post('kabkota/proses_tambah', 'admin\Kabkota::proses_tambah');
    $routes->get('kabkota/edit/(:num)', 'admin\Kabkota::edit/$1');
    $routes->post('kabkota/proses_edit/(:num)', 'admin\Kabkota::proses_edit/$1');
    $routes->get('kabkota/delete/(:num)', 'admin\Kabkota::delete/$1');
});

$routes->get('admin/artikel/index', 'admin\Artikel::index');
$routes->get('admin/artikel/detail/(:num)/(:any)', 'admin\Artikel::viewArtikel/$1/$2');
$routes->get('admin/artikel/tambah', 'admin\Artikel::tambah');
$routes->post('admin/artikel/proses_tambah', 'admin\Artikel::proses_tambah');
$routes->get('/admin/artikel/edit/(:num)', 'admin\Artikel::edit/$1');
$routes->post('admin/artikel/proses_edit/(:num)', 'admin\Artikel::proses_edit/$1');
$routes->get('admin/artikel/delete/(:any)', 'admin\Artikel::delete/$1');

// Member
$routes->get('admin/member/index', 'admin\Member::index');
$routes->get('admin/member/detail/(:num)/(:any)', 'admin\Member::viewMember/$1/$2');
$routes->get('admin/member/tambah', 'admin\Member::tambah');
$routes->post('admin/member/proses_tambah', 'admin\Member::proses_tambah');
$routes->get('/admin/member/edit/(:num)', 'admin\Member::edit/$1');
$routes->post('admin/member/proses_edit/(:num)', 'admin\Member::proses_edit/$1');
$routes->get('admin/member/delete/(:any)', 'admin\Member::delete/$1');
// Akhir Member

// Kategori Video
$routes->get('admin/kategori_videos/index', 'admin\KategoriVideo::index');
$routes->get('admin/kategori_videos/tambah', 'admin\KategoriVideo::tambah');
$routes->post('admin/kategori_videos/proses_tambah', 'admin\KategoriVideo::proses_tambah');
$routes->get('admin/kategori_videos/edit/(:num)', 'admin\KategoriVideo::edit/$1');
$routes->post('admin/kategori_videos/proses_edit/(:num)', 'admin\KategoriVideo::proses_edit/$1');
$routes->get('admin/kategori_videos/delete/(:any)', 'admin\KategoriVideo::delete/$1');

// Video
$routes->get('admin/video_pembelajaran/index', 'admin\Video::index');
$routes->get('admin/video_pembelajaran/tambah', 'admin\Video::tambah');
$routes->post('admin/video_pembelajaran/proses_tambah', 'admin\Video::proses_tambah');
$routes->get('admin/video_pembelajaran/edit/(:num)', 'admin\Video::edit/$1');
$routes->post('admin/video_pembelajaran/proses_edit/(:num)', 'admin\Video::proses_edit/$1');
$routes->get('admin/video_pembelajaran/delete/(:any)', 'admin\Video::delete/$1');


// Pengumuman
$routes->get('admin/pengumuman/index', 'admin\Pengumuman::index');
$routes->get('admin/pengumuman/tambah', 'admin\Pengumuman::tambah');
$routes->post('admin/pengumuman/proses_tambah', 'admin\Pengumuman::proses_tambah');
$routes->get('/admin/pengumuman/edit/(:num)', 'admin\Pengumuman::edit/$1');
$routes->post('admin/pengumuman/proses_edit/(:num)', 'admin\Pengumuman::proses_edit/$1');
$routes->get('admin/pengumuman/delete/(:any)', 'admin\Pengumuman::delete/$1');
// Akhir Pengumuman

$routes->get('admin/user/index', 'admin\User::index');
$routes->get('admin/user/tambah', 'admin\User::tambah');
$routes->post('admin/user/proses_tambah', 'admin\User::proses_tambah');
$routes->get('/admin/user/edit/(:num)', 'admin\User::edit/$1');
$routes->post('admin/user/proses_edit/(:num)', 'admin\User::proses_edit/$1');
$routes->get('admin/user/delete/(:any)', 'admin\User::delete/$1');

$routes->get('admin/founder/index', 'admin\Founder::index');
$routes->get('admin/founder/tambah', 'admin\Founder::tambah');
$routes->post('admin/founder/proses_tambah', 'admin\Founder::proses_tambah');
$routes->get('admin/founder/edit/(:num)', 'admin\Founder::edit/$1');
$routes->post('admin/founder/proses_edit/(:num)', 'admin\Founder::proses_edit/$1');
$routes->get('admin/founder/delete/(:any)', 'admin\Founder::delete/$1');

$routes->get('admin/link_founder/index', 'admin\LinkFounder::index');
$routes->get('admin/link_founder/tambah', 'admin\LinkFounder::tambah');
$routes->post('admin/link_founder/proses_tambah', 'admin\LinkFounder::proses_tambah');
$routes->get('admin/link_founder/edit/(:num)', 'admin\LinkFounder::edit/$1');
$routes->post('admin/link_founder/proses_edit/(:num)', 'admin\LinkFounder::proses_edit/$1');
$routes->get('admin/link_founder/delete/(:any)', 'admin\LinkFounder::delete/$1');

$routes->group('admin', function ($routes) {
    $routes->get('kontak', 'admin\Kontak::index');
    $routes->get('kontak/tambah', 'admin\Kontak::tambah');
    $routes->post('kontak/proses_tambah', 'admin\Kontak::proses_tambah');
    $routes->get('kontak/edit/(:num)', 'admin\Kontak::edit/$1');
    $routes->post('kontak/proses_edit/(:num)', 'admin\Kontak::proses_edit/$1');
    $routes->get('kontak/delete/(:num)', 'admin\Kontak::delete/$1');
});
// });

$routes->group('admin', function ($routes) {
    $routes->get('kategori_videos/index', 'admin\KategoriVideo::index');
    $routes->get('kategori_videos/tambah', 'admin\KategoriVideo::tambah');
    $routes->post('kategori_videos/proses_tambah', 'admin\KategoriVideo::proses_tambah');
    $routes->get('kategori_videos/edit/(:num)', 'admin\KategoriVideo::edit/$1');
    $routes->post('kategori_videos/proses_edit/(:num)', 'admin\KategoriVideo::proses_edit/$1');
    $routes->get('kategori_videos/delete/(:num)', 'admin\KategoriVideo::delete/$1');
});

// Admin Social Media Routes
$routes->get('admin/socialmedia/index', 'admin\Socialmedia::index');
$routes->get('admin/socialmedia/tambah', 'admin\Socialmedia::tambah');
$routes->post('admin/socialmedia/proses_tambah', 'admin\Socialmedia::proses_tambah');
$routes->get('admin/socialmedia/edit/(:num)', 'admin\Socialmedia::edit/$1');
$routes->post('admin/socialmedia/proses_edit/(:num)', 'admin\Socialmedia::proses_edit/$1');
$routes->get('admin/socialmedia/delete/(:any)', 'admin\Socialmedia::delete/$1');

<<<<<<< HEAD
// Admin Keuntungan
$routes->group('admin', function($routes) {
    $routes->get('keuntungan/index', 'admin\Keuntungan::index');
    $routes->get('keuntungan/tambah', 'admin\Keuntungan::tambah');
    $routes->post('keuntungan/proses_tambah', 'admin\Keuntungan::proses_tambah');
    $routes->get('keuntungan/edit/(:num)', 'admin\Keuntungan::edit/$1');
    $routes->post('keuntungan/proses_edit/(:num)', 'admin\Keuntungan::proses_edit/$1');
    $routes->post('keuntungan/delete/(:num)', 'admin\Keuntungan::delete/$1');
=======
$routes->group('admin', ['namespace' => 'App\Controllers\admin'], function ($routes) {
    $routes->get('keuntungan', 'Keuntungan::index');
    $routes->get('keuntungan/tambah', 'Keuntungan::tambah');
    $routes->post('keuntungan/proses_tambah', 'Keuntungan::proses_tambah');
    $routes->get('keuntungan/edit/(:num)', 'Keuntungan::edit/$1');
    $routes->post('keuntungan/proses_edit/(:num)', 'Keuntungan::proses_edit/$1');
    $routes->get('keuntungan/delete/(:num)', 'Keuntungan::delete/$1');
>>>>>>> a3a2e4aff0bfacb51441fb8254e91041a21e049d
});


//USER
// start frond end routes
// $routes->get('/', 'user\Pengumumanctrl::index');
$routes->get('/detail/(:any)', 'user\Pengumumanctrl::viewPengumuman/$1');
// // route halaman member
// $routes->get('/member', 'user\Memberctrl::index');
// $routes->get('/member/(:num)', 'user\Memberctrl::indexdpd/$1');
// $routes->get('/member/detail/(:num)/(:any)', 'user\Memberctrl::viewMember/$1/$2');
// $routes->get('/member/search', 'user\Memberctrl::search');
// // route halaman profil
// $routes->get('/profil', 'user\Profilctrl::edit');
// $routes->post('/profil/proses_edit', 'user\Profilctrl::edit');
// end frond end routes



// route language home
// $routes->get('lang/{locale}', 'user\Homectrl::language');
// $routes->get('lang/(:segment)', 'user\Homectrl::language/$1');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
