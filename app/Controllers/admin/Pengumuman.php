<?php

namespace App\Controllers\admin;

use App\Models\PengumumanModels;

class Pengumuman extends BaseController
{
    public function index()
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
            // Ubah 'login' sesuai dengan halaman login Anda
        }

        $role = session()->get('role');
        if ($role !== 'admin') {
            // Jika peran bukan admin, arahkan ke halaman lain (misal: user)
            return redirect()->to(base_url('/')); // Sesuaikan dengan URL halaman user
        }

        $pengumuman_model = new PengumumanModels();
        $all_data_pengumuman = $pengumuman_model->findAll();
        $validation = \Config\Services::validation();
        return view('admin/pengumuman/index', [
            'all_data_pengumuman' => $all_data_pengumuman,
            'validation' => $validation
        ]);
    }

    public function tambah()
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
            // Ubah 'login' sesuai dengan halaman login Anda
        }

        $role = session()->get('role');
        if ($role !== 'admin') {
            // Jika peran bukan admin, arahkan ke halaman lain (misal: user)
            return redirect()->to(base_url('/')); // Sesuaikan dengan URL halaman user
        }

        $pengumuman_model = new PengumumanModels();
        $all_data_pengumuman = $pengumuman_model->findAll();
        $validation = \Config\Services::validation();
        return view('admin/pengumuman/tambah', [
            'all_data_pengumuman' => $all_data_pengumuman,
            'validation' => $validation
        ]);
    }

    public function proses_tambah()
    {
        if (!$this->validate([
            'poster_pengumuman' => [
                'rules' => 'uploaded[poster_pengumuman]|is_image[poster_pengumuman]|max_dims[poster_pengumuman,3000,3000]|mime_in[poster_pengumuman,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih foto terlebih dahulu',
                    'is_image' => 'File yang anda pilih bukan gambar',
                    'max_dims' => 'Maksimal ukuran gambar 572x572 pixels',
                    'mime_in' => 'File yang anda pilih wajib berekstensikan jpg/jpeg/png'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {
            // Buat slug otomatis dari judul dan tambahkan tanggal ddmmyyyy
            $judul = $this->request->getVar('judul_pengumuman');
            $tanggal = date('dmY'); // Format tanggal ddmmyyyy
            $slug = url_title($judul, '-', true) . '-' . $tanggal; // Menghasilkan slug + tanggal

            $file_foto = $this->request->getFile('poster_pengumuman');
            $file_foto->move('assets-baru/img/');
            $file_name = $file_foto->getName();
            $PengumumanModels = new PengumumanModels();
            $data = [
                'judul_pengumuman' => $this->request->getVar("judul_pengumuman"),
                'deskripsi_pengumuman' => $this->request->getVar("deskripsi_pengumuman"),
                'mulai_pengumuman' => $this->request->getVar("mulai_pengumuman"),
                'akhir_pengumuman' => $this->request->getVar("akhir_pengumuman"),
                'poster_pengumuman' => $file_name,
                'slug' => $slug
            ];
            $PengumumanModels->save($data);

            session()->setFlashdata('success', 'Data berhasil disimpan');
            return redirect()->to(base_url('admin/pengumuman/index'));
        }
    }

    public function edit($id_pengumuman)
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
            // Ubah 'login' sesuai dengan halaman login Anda
        }

        $role = session()->get('role');
        if ($role !== 'admin') {
            // Jika peran bukan admin, arahkan ke halaman lain (misal: user)
            return redirect()->to(base_url('/')); // Sesuaikan dengan URL halaman user
        }

        $pengumuman_model = new PengumumanModels();
        $pengumumanData = $pengumuman_model->find($id_pengumuman);
        $validation = \Config\Services::validation();

        return view('admin/pengumuman/edit', [
            'pengumumanData' => $pengumumanData,
            'validation' => $validation
        ]);
    }

    // Penulis.php (Controller)
    public function proses_edit($id_pengumuman = null)
    {
        if (!$id_pengumuman) {
            return redirect()->back();
        }

        $PengumumanModels = new PengumumanModels();
        $pengumumanData = $PengumumanModels->find($id_pengumuman);

        // Check if new 'foto_penulis' file is uploaded
        if ($this->request->getFile('poster_pengumuman')->isValid()) {
            // Delete the old 'foto_penulis' file
            unlink('assets-baru/img/' . $pengumumanData->poster_pengumuman);

            // Upload the new 'foto_penulis' file
            $dataPengumuman = $this->request->getFile('poster_pengumuman');
            $fotoName = $dataPengumuman->getRandomName();
            $dataPengumuman->move('assets-baru/img/', $fotoName);

            // Buat slug otomatis dari judul dan tambahkan tanggal ddmmyyyy
            $judul = $this->request->getVar('judul_pengumuman');
            $tanggal = date('dmY'); // Format tanggal ddmmyyyy
            $slug = url_title($judul, '-', true) . '-' . $tanggal; // Menghasilkan slug + tanggal

            // Update the 'foto_penulis' field in the database with a "where" clause
            $PengumumanModels->where('id_pengumuman', $id_pengumuman)->set([
                'poster_pengumuman' => $fotoName,
                'judul_pengumuman' => $this->request->getVar("judul_pengumuman"),
                'deskripsi_pengumuman' => $this->request->getVar("deskripsi_pengumuman"),
                'mulai_pengumuman' => $this->request->getVar("mulai_pengumuman"),
                'akhir_pengumuman' => $this->request->getVar("akhir_pengumuman"),
                'slug' => $slug,
            ])->update();
        } else {
            // Buat slug otomatis dari judul dan tambahkan tanggal ddmmyyyy
            $judul = $this->request->getVar('judul_pengumuman');
            $tanggal = date('dmY'); // Format tanggal ddmmyyyy
            $slug = url_title($judul, '-', true) . '-' . $tanggal; // Menghasilkan slug + tanggal
            // If no new 'foto_penulis' file is uploaded, update only the other fields
            $PengumumanModels->where('id_pengumuman', $id_pengumuman)->set([
                'judul_pengumuman' => $this->request->getVar("judul_pengumuman"),
                'deskripsi_pengumuman' => $this->request->getVar("deskripsi_pengumuman"),
                'mulai_pengumuman' => $this->request->getVar("mulai_pengumuman"),
                'akhir_pengumuman' => $this->request->getVar("akhir_pengumuman"),
                'slug' => $slug,
            ])->update();
        }

        session()->setFlashdata('success', 'Berkas berhasil diperbarui');
        return redirect()->to(base_url('admin/pengumuman/index'));
    }




    public function delete($id = false)
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
            // Ubah 'login' sesuai dengan halaman login Anda
        }

        $role = session()->get('role');
        if ($role !== 'admin') {
            // Jika peran bukan admin, arahkan ke halaman lain (misal: user)
            return redirect()->to(base_url('/')); // Sesuaikan dengan URL halaman user
        }

        $PengumumanModels = new PengumumanModels();

        $data = $PengumumanModels->find($id);

        unlink('assets-baru/img/' . $data->poster_pengumuman);

        $PengumumanModels->delete($id);

        return redirect()->to(base_url('admin/pengumuman/index'));
    }
}
