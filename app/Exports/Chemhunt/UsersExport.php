<?php

namespace App\Exports\Chemhunt;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }

    public function headings(): array
    {
        return [
            'id',
            'First Name',
            'Middle Name',
            'Last Name',
            'college',
            'year',
            'state',
            'Phone',
            'Wapp',
            'Email',
            'Password',
            'ChemHunt Id',
            'Email Verified At',
            'Created At',
            'Updated At',
        ];
    }
}
