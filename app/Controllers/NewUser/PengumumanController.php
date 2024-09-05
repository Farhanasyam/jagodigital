<?php

namespace App\Controllers\NewUser;

use App\Controllers\NewUser\BaseController;
use App\Models\PengumumanModels;

class PengumumanController extends BaseController
{
    public function pengumuman()
    {
        helper('text');

        $pengumumanModel = new PengumumanModels();
        $today = date('Y-m-d'); // Mengambil tanggal hari ini

        // Ambil pengumuman yang aktif sesuai dengan tanggal hari ini
        $activePengumuman = $pengumumanModel->getHomePengumuman($today);

        return $this->render('NewUser/pengumuman/index', [
            'title' => 'Pengumuman Terbaru',
            'activePengumuman' => $activePengumuman
        ]);
    }

    public function all()
    {
        helper('text');
        $pengumumanModel = new PengumumanModels();

        // Get all pengumuman
        $allPengumuman = $pengumumanModel->orderBy('created_at', 'desc')->findAll();

        // Pass data to the view
        return $this->render('NewUser/pengumuman/index', [
            'title' => 'Pengumuman',
            'initialPengumuman' => $allPengumuman,
            'allPengumuman' => $allPengumuman,
            'initialLimit' => count($allPengumuman)
        ]);
    }

    public function detail($slug)
    {
        helper('text');

        $pengumumanModel = new PengumumanModels();

        // Fetch the pengumuman based on slug
        $pengumuman = $pengumumanModel->where('slug', $slug)->first();

        if (!$pengumuman) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Pengumuman tidak ditemukan');
        }

        // Fetch 3 random recommended pengumuman
        $recommendedPengumuman = $pengumumanModel->orderBy('RAND()')->findAll(3);

        return $this->render('NewUser/pengumuman/detail', [
            'title' => 'Detail Pengumuman',
            'pengumuman' => $pengumuman,
            'recommendedPengumuman' => $recommendedPengumuman
        ]);
    }
}
