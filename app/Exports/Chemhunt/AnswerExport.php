<?php

namespace App\Exports\Chemhunt;

use App\Models\User;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AnswerExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::with('answer')->get(['id','user_email','email']);
    }

    public function map($user) : array {
        return [
            $user->id,
            $user->user_email,
            $user->email,
            $user->answer->day_1_q_1,
            $user->answer->day_1_q_2,
            $user->answer->day_1_q_3,
            $user->answer->day_1_q_4,
            $user->answer->day_2_q_1,
            $user->answer->day_2_q_2,
            $user->answer->day_2_q_3,
            $user->answer->day_2_q_4,
            $user->answer->day_3_q_1,
            $user->answer->day_3_q_2,
            $user->answer->day_3_q_3,
            $user->answer->day_3_q_4,
            $user->answer->day_4_q_1,
            $user->answer->day_4_q_2,
            $user->answer->day_4_q_3,
            $user->answer->day_4_q_4,
            $user->answer->day_5_q_1,
            $user->answer->day_5_q_2,
            $user->answer->day_5_q_3,
            $user->answer->day_5_q_4,
            $user->answer->day_6_q_1,
            $user->answer->day_6_q_2,
            $user->answer->day_6_q_3,
            $user->answer->day_6_q_4,
            $user->answer->day_7_q_1,
            $user->answer->day_7_q_2,
            $user->answer->day_7_q_3,
            $user->answer->day_7_q_4,
            Carbon::parse($user->updated_at)->toDateTimeString(),
        ] ;
    }

    public function headings() : array {
        return [
            'id',
            'Email',
            'ChemHunt Id',
            'Day 1 Question 1',
            'Day 1 Question 2',
            'Day 1 Question 3',
            'Day 1 Question 4',
            'Day 2 Question 1',
            'Day 2 Question 2',
            'Day 2 Question 3',
            'Day 2 Question 4',
            'Day 3 Question 1',
            'Day 3 Question 2',
            'Day 3 Question 3',
            'Day 3 Question 4',
            'Day 4 Question 1',
            'Day 4 Question 2',
            'Day 4 Question 3',
            'Day 4 Question 4',
            'Day 5 Question 1',
            'Day 5 Question 2',
            'Day 5 Question 3',
            'Day 5 Question 4',
            'Day 6 Question 1',
            'Day 6 Question 2',
            'Day 6 Question 3',
            'Day 6 Question 4',
            'Day 7 Question 1',
            'Day 7 Question 2',
            'Day 7 Question 3',
            'Day 7 Question 4',
            'Created At'
        ] ;
    }
}
