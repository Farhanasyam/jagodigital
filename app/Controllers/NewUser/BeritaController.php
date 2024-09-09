<?php

namespace App\Controllers\NewUser;

use App\Controllers\NewUser\BaseController;
use App\Models\BeritaModels;

class BeritaController extends BaseController
{
    public function berita()
    {
        helper('text');

        $beritaModel = new BeritaModels();
        $today = date('Y-m-d'); // Mengambil tanggal hari ini

        // Ambil berita yang aktif sesuai dengan tanggal hari ini
        $activeBerita = $beritaModel->getHomeBerita($today);

        return $this->render('NewUser/berita/index', [
            'title' => 'Berita Terbaru',
            'activeBerita' => $activeBerita 
        ]);
    }


    public function all()
    {
        helper('text');
        $beritaModel = new BeritaModels();
        $today = date('Y-m-d'); // Get today's date
        // Get all pengumuman

        $activeBerita = $beritaModel->getHomeBeritaAll($today);

        // Pass data to the view
        return $this->render('NewUser/berita/index', [
            'title' => 'Berita Terbaru',
            'activeBerita' => $activeBerita
        ]);
    }

    public function detail($slug)
    {
        helper('text');

        $beritaModel = new BeritaModels();

        // Fetch the berita based on slug
        $berita = $beritaModel->where('slug', $slug)->first();

        if (!$berita) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Berita tidak ditemukan');
        }

        // Fetch 3 random recommended berita
        $recommendedBerita = $beritaModel->orderBy('RAND()')->findAll(3);

        return $this->render('NewUser/berita/detail', [
            'title' => 'Detail Berita',
            'berita' => $berita,
            'recommendedBerita' => $recommendedBerita
        ]);
    }
}
