<?php

namespace App\Exports\Chemhunt;

use App\Models\User;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection,WithMapping,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all(
            'id',
            'first_name',
            'middle_name',
            'last_name',
            'college',
            'year',
            'state',
            'phone_number',
            'phone_number_wapp',
            'user_email',
            'user_password',
            'email',
            'created_at'
        );
    }

    public function map($user) : array {
        return [
            $user->id,
            $user->first_name,
            $user->middle_name,
            $user->last_name,
            $user->college,
            $user->year,
            $user->state,
            $user->phone_number,
            $user->phone_number_wapp,
            $user->user_email,
            $user->user_password,
            $user->email,
            Carbon::parse($user->updated_at)->toDateTimeString(),
        ] ;


    }

    public function headings(): array
    {
        return [
            'id',
            'First Name',
            'Middle Name',
            'Last Name',
            'College',
            'Year',
            'State',
            'Phone',
            'Wapp',
            'Email',
            'Password',
            'ChemHunt Id',
            'Created At',
        ];
    }
}
