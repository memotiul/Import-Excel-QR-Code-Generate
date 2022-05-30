<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
  public $timestamps = false;

// turn off only updated_at
const UPDATED_AT = false;
    /**
     * @param array $row
     *
     * @return User|null
     */
    public function model(array $row)
    {

        return new User([
           'pin'     => $row[0],
           'qrid'    => $row[1], 
           'qrdata' => $row[2]
        ]);
    }
}