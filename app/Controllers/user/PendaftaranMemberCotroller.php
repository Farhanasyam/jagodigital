<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class PendaftaranMemberCotroller extends BaseController
{
    public function pendaftaran_member()
    {
        return view('NewUser/beranda/pendaftaran_member', [
            'title' => 'Pendaftaran member'
        ]);
    }
}
