<?php

namespace App\Exports;

use App\Models\User; // Replace with your model
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection,WithHeadings
{
    public function collection()
    {
        return User::all(); // You can modify this query as needed
    }
    public function headings():array
    {
      return [
        'id',
        'name',
        'email',
        'email_verified_at',
        'password',
        'profileImageURL',
        'remember_token',
        'created_at',
        'updated_at',
    ];
    }
}