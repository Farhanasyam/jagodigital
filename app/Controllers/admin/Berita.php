<?php

namespace App\Controllers\admin;

use App\Models\BeritaModels;

class Berita extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        $role = session()->get('role');
        if ($role !== 'admin') {
            return redirect()->to(base_url('/'));
        }

        $berita_model = new BeritaModels();
        $all_data_berita = $berita_model->findAll();
        $validation = \Config\Services::validation();

        return view('admin/berita/index', [
            'all_data_berita' => $all_data_berita,
            'validation' => $validation
        ]);
    }

    public function tambah()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        $role = session()->get('role');
        if ($role !== 'admin') {
            return redirect()->to(base_url('/'));
        }

        $validation = \Config\Services::validation();

        return view('admin/berita/tambah', [
            'validation' => $validation
        ]);
    }

    public function proses_tambah()
    {
        if (!$this->validate([
            'poster_berita' => [
                'rules' => 'uploaded[poster_berita]|is_image[poster_berita]|max_dims[poster_berita,3000,3000]|mime_in[poster_berita,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih foto terlebih dahulu',
                    'is_image' => 'File yang anda pilih bukan gambar',
                    'max_dims' => 'Maksimal ukuran gambar 3000x3000 pixels',
                    'mime_in' => 'File yang anda pilih wajib berekstensikan jpg/jpeg/png'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {
            // Buat slug otomatis dari judul dan tambahkan tanggal ddmmyyyy
            $judul = $this->request->getVar('judul_berita');
            $tanggal = date('dmY'); // Format tanggal ddmmyyyy
            $slug = url_title($judul, '-', true) . '-' . $tanggal; // Menghasilkan slug + tanggal

            $file_foto = $this->request->getFile('poster_berita');
            $file_name = $file_foto->getRandomName();
            $file_foto->move('assets-baru/img/', $file_name);

            $berita_model = new BeritaModels();
            $data = [
                'judul_berita' => $this->request->getVar("judul_berita"),
                'deskripsi_berita' => $this->request->getVar("deskripsi_berita"),
                'mulai_berita' => $this->request->getVar("mulai_berita"),
                'akhir_berita' => $this->request->getVar("akhir_berita"),
                'poster_berita' => $file_name,
                'slug' => $slug,
            ];

            $berita_model->save($data);

            session()->setFlashdata('success', 'Data berhasil disimpan');
            return redirect()->to(base_url('admin/berita/index'));
        }
    }

    public function edit($id_berita)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        $role = session()->get('role');
        if ($role !== 'admin') {
            return redirect()->to(base_url('/'));
        }

        $berita_model = new BeritaModels();
        $beritaData = $berita_model->find($id_berita);
        $validation = \Config\Services::validation();

        return view('admin/berita/edit', [
            'beritaData' => $beritaData,
            'validation' => $validation
        ]);
    }

    public function proses_edit($id_berita = null)
    {
        if (!$id_berita) {
            return redirect()->back();
        }

        $berita_model = new BeritaModels();
        $beritaData = $berita_model->find($id_berita);

        if ($this->request->getFile('poster_berita')->isValid()) {
            if (file_exists('assets-baru/img/' . $beritaData->poster_berita)) {
                unlink('assets-baru/img/' . $beritaData->poster_berita);
            }

            $file_foto = $this->request->getFile('poster_berita');
            $fotoName = $file_foto->getRandomName();
            $file_foto->move('assets-baru/img/', $fotoName);

            // Buat slug otomatis dari judul dan tambahkan tanggal ddmmyyyy
            $judul = $this->request->getVar('judul_berita');
            $tanggal = date('dmY'); // Format tanggal ddmmyyyy
            $slug = url_title($judul, '-', true) . '-' . $tanggal; // Menghasilkan slug + tanggal

            $berita_model->update($id_berita, [
                'poster_berita' => $fotoName,
                'judul_berita' => $this->request->getVar("judul_berita"),
                'deskripsi_berita' => $this->request->getVar("deskripsi_berita"),
                'mulai_berita' => $this->request->getVar("mulai_berita"),
                'akhir_berita' => $this->request->getVar("akhir_berita"),
                'slug' => $slug,
            ]);
        } else {
            // Buat slug otomatis dari judul dan tambahkan tanggal ddmmyyyy
            $judul = $this->request->getVar('judul_berita');
            $tanggal = date('dmY'); // Format tanggal ddmmyyyy
            $slug = url_title($judul, '-', true) . '-' . $tanggal; // Menghasilkan slug + tanggal
            $berita_model->update($id_berita, [
                'judul_berita' => $this->request->getVar("judul_berita"),
                'deskripsi_berita' => $this->request->getVar("deskripsi_berita"),
                'mulai_berita' => $this->request->getVar("mulai_berita"),
                'akhir_berita' => $this->request->getVar("akhir_berita"),
                'slug' => $slug,

            ]);
        }

        session()->setFlashdata('success', 'Berkas berhasil diperbarui');
        return redirect()->to(base_url('admin/berita/index'));
    }

    public function delete($id = false)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        $role = session()->get('role');
        if ($role !== 'admin') {
            return redirect()->to(base_url('/'));
        }

        $berita_model = new BeritaModels();

        $data = $berita_model->find($id);

        if (file_exists('assets-baru/img/' . $data->poster_berita)) {
            unlink('assets-baru/img/' . $data->poster_berita);
        }

        $berita_model->delete($id);

        return redirect()->to(base_url('admin/berita/index'));
    }
}
