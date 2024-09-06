<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TbMemberSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'role'              => 'admin',
                'username'          => 'admin',
                'password'          => 'admin',
                'nama_member'       => 'Admin',
                'id_provinsi'            => null,
                'id_kabkota'            => null,
                'status_kepengurusan' => null,
                'alamat_member'     => null,
                'no_hp_member'      => null,
                'email_member'      => null,
                'ig_member'         => null,
                'fb_member'         => null,
                'pendidikan_member' => null,
                'pekerjaan_member'  => null,
                'sertifikasi_member' => null,
                'jenis_kelamin'     => null,
                'foto_member'       => null,
                'cv_member'         => null,
                'slug'              => null,
            ],
            [
                'role'              => 'admin',
                'username'          => 'adminpribadi',
                'password'          => 'adminpribadi',
                'nama_member'       => 'Admin Pribadi',
                'id_provinsi'            => null,
                'id_kabkota'            => null,
                'status_kepengurusan' => null,
                'alamat_member'     => null,
                'no_hp_member'      => null,
                'email_member'      => null,
                'ig_member'         => null,
                'fb_member'         => null,
                'pendidikan_member' => null,
                'pekerjaan_member'  => null,
                'sertifikasi_member' => null,
                'jenis_kelamin'     => null,
                'foto_member'       => null,
                'cv_member'         => null,
                'slug'              => null,
            ],
            [
                'role'              => 'admin',
                'username'          => 'adminelecomp',
                'password'          => 'adminelecomp',
                'nama_member'       => 'Admin Elecomp',
                'id_provinsi'            => null,
                'id_kabkota'            => null,
                'status_kepengurusan' => null,
                'alamat_member'     => null,
                'no_hp_member'      => null,
                'email_member'      => null,
                'ig_member'         => null,
                'fb_member'         => null,
                'pendidikan_member' => null,
                'pekerjaan_member'  => null,
                'sertifikasi_member' => null,
                'jenis_kelamin'     => null,
                'foto_member'       => null,
                'cv_member'         => null,
                'slug'              => null,
            ],
            [
                'role'              => 'user',
                'username'          => 'tes',
                'password'          => 'tes',
                'nama_member'       => 'Aditya',
                'id_provinsi'            => null,
                'id_kabkota'            => null,
                'status_kepengurusan' => 'Sekretaris',
                'alamat_member'     => 'bwi',
                'no_hp_member'      => '08888',
                'email_member'      => 'adit@gmail.com',
                'ig_member'         => 'a',
                'fb_member'         => 'a',
                'pendidikan_member' => '<p>ad</p>',
                'pekerjaan_member'  => '<p>a</p>',
                'sertifikasi_member' => '<p>a</p>',
                'jenis_kelamin'     => 'Laki-laki',
                'foto_member'       => '20827040_6347498.jpg',
                'cv_member'         => '20827040_6347498.jpg',
                'slug'              => 'a',
            ],
            // Tambahkan data lainnya sesuai kebutuhan...
        ];

        // Menggunakan Query Builder untuk insert data
        $this->db->table('tb_member')->insertBatch($data);
    }
}
