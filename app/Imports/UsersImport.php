<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel,WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return User::updateOrCreate(
            ['id' => $row['id']], // Match by ID
            [
                'name' => $row['name'],
                'email' => $row['email'],
                'email_verified_at' => $row['email_verified_at'],
                'password' => Hash::make($row['password']),
                'profileImageURL' => $row['profileimageurl'],
                'remember_token' => $row['remember_token'],
                'created_at' => $row['created_at'],
                'updated_at' => $row['updated_at'],
            ]
        );
    }
}
