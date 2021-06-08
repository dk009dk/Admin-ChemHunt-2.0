<?php

namespace App\Exports\Chemhunt;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TodayResultExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::with('result')->get(['id','user_email','email']);
    }

    public function map($user) : array {
        return [
            $user->id,
            $user->user_email,
            $user->email,
            $user->result->{'day_'.config('chemhunt.day').'_r_1'},
            $user->result->{'day_'.config('chemhunt.day').'_r_2'},
            $user->result->{'day_'.config('chemhunt.day').'_r_3'},
            $user->result->{'day_'.config('chemhunt.day').'_r_4'},
        ] ;

    }

    public function headings() : array {
        return [
            'id',
            'Email',
            'ChemHunt Id',
            'Day '.config('chemhunt.day').' Answer 1',
            'Day '.config('chemhunt.day').' Answer 2',
            'Day '.config('chemhunt.day').' Answer 3',
            'Day '.config('chemhunt.day').' Answer 4',
        ] ;
    }
}

