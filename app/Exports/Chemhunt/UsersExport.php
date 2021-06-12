<?php

namespace App\Exports\Chemhunt;

use App\Models\User;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class
UsersExport implements FromCollection,WithMapping,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::with('admin')->get();
    }

    public function map($user) : array {
        return [
            $user->id,
            $user->first_name,
            $user->middle_name,
            $user->last_name,
            $user->admin->name,
            $user->admin->ig,
            $user->user_email,
            $user->user_password,
            $user->email,
            $user->college,
            $user->year,
            $user->state,
            $user->phone_number,
            $user->phone_number_wapp,
            $user->created_at->toDateTimeString(),
        ] ;


    }

    public function headings(): array
    {
        return [
            'id',
            'First Name',
            'Middle Name',
            'Last Name',
            'Coordinator',
            'Coordinator IG',
            'Email',
            'Password',
            'ChemHunt Id',
            'College',
            'Year',
            'State',
            'Phone',
            'Wapp',
            'Created At',
        ];
    }
}
