<?php

namespace App\Exports\Chemhunt;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ResultExport implements FromCollection, WithMapping, WithHeadings
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
            $user->result->day_1_r_1,
            $user->result->day_1_r_2,
            $user->result->day_1_r_3,
            $user->result->day_1_r_4,
            $user->result->day_2_r_1,
            $user->result->day_2_r_2,
            $user->result->day_2_r_3,
            $user->result->day_2_r_4,
            $user->result->day_3_r_1,
            $user->result->day_3_r_2,
            $user->result->day_3_r_3,
            $user->result->day_3_r_4,
            $user->result->day_4_r_1,
            $user->result->day_4_r_2,
            $user->result->day_4_r_3,
            $user->result->day_4_r_4,
            $user->result->day_5_r_1,
            $user->result->day_5_r_2,
            $user->result->day_5_r_3,
            $user->result->day_5_r_4,
            $user->result->day_6_r_1,
            $user->result->day_6_r_2,
            $user->result->day_6_r_3,
            $user->result->day_6_r_4,
            $user->result->day_7_r_1,
            $user->result->day_7_r_2,
            $user->result->day_7_r_3,
            $user->result->day_7_r_4,
        ] ;

    }

    public function headings() : array {
        return [
            'id',
            'Email',
            'ChemHunt Id',
            'Day 1 Answer 1',
            'Day 1 Answer 2',
            'Day 1 Answer 3',
            'Day 1 Answer 4',
            'Day 2 Answer 1',
            'Day 2 Answer 2',
            'Day 2 Answer 3',
            'Day 2 Answer 4',
            'Day 3 Answer 1',
            'Day 3 Answer 2',
            'Day 3 Answer 3',
            'Day 3 Answer 4',
            'Day 4 Answer 1',
            'Day 4 Answer 2',
            'Day 4 Answer 3',
            'Day 4 Answer 4',
            'Day 5 Answer 1',
            'Day 5 Answer 2',
            'Day 5 Answer 3',
            'Day 5 Answer 4',
            'Day 6 Answer 1',
            'Day 6 Answer 2',
            'Day 6 Answer 3',
            'Day 6 Answer 4',
            'Day 7 Answer 1',
            'Day 7 Answer 2',
            'Day 7 Answer 3',
            'Day 7 Answer 4',
        ] ;
    }
}
