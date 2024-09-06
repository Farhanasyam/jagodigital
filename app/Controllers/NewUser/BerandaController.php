<?php

namespace App\Controllers\NewUser;

use App\Controllers\NewUser\BaseController;
use App\Models\ArtikelModel;
use App\Models\FounderModels;
use App\Models\KategoriVideoModels;
use App\Models\KeuntunganModel;
use App\Models\PengumumanModels;
use App\Models\TentangModels;
use App\Models\VideoPembelajaranModels;
use CodeIgniter\HTTP\ResponseInterface;

class BerandaController extends BaseController
{

    public function index()
    {
        $keuntunganModel = new KeuntunganModel();
        $keuntungan = $keuntunganModel->findAll();

        $founderModel = new FounderModels();
        $founder = $founderModel->findAll();

        $pengumumanModel = new PengumumanModels(); // Ensure this is the correct model
        $today = date('Y-m-d'); // Get today's date
        $pengumuman = $pengumumanModel->getHomePengumuman($today); // Fetch announcements

        // Slice the array to get the latest 3 if more are returned
        $pengumuman = array_slice($pengumuman, 0, 3);

        $metaTitle = 'Selamat Datang di Beranda Kami';
        $metaDesc = 'Temukan informasi terbaru, keuntungan bergabung, dan pendiri kami. Jelajahi pengumuman terbaru dan ketahui lebih lanjut tentang kami.';
        $canonicalUrl = base_url('beranda');

        return $this->render('NewUser/beranda/index', [
            'title' => 'Beranda',
            'metaTitle' => $metaTitle,
            'metaDesc' => $metaDesc,
            '$canonicalUrl' => $canonicalUrl,
            'keuntungan' => $keuntungan,
            'founder' => $founder,
            'pengumuman' => $pengumuman
        ]);
    }

    public function about()
    {
        // Load Tentang Model
        $tentang_model = new TentangModels();
        // Get the first record from Tentang table
        $tentang = $tentang_model->first(); // Returns an object of stdClass

        $founderModel = new FounderModels();
        $founder = $founderModel->findAll();


        return $this->render('NewUser/beranda/about', [
            'tentang' => $tentang,
            'title' => 'Tentang Kami',
            'founder' => $founder
        ]);
    }

    public function kontak()
    {
        return $this->render('NewUser/beranda/kontak', [
            'title' => 'Kontak'
        ]);
    }
}
