<?php

namespace App\Exports\Chemhunt;

use App\Models\User;
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
        return User::with('answer','admin')->get();
    }

    public function map($user) : array {
        return [
            $user->id,
            $user->first_name,
            $user->last_name,
            $user->admin->name,
            $user->user_email,
            $user->email,
            $user->answer->day_1_q_1,
            $user->answer->day_1_q_2,
            $user->answer->day_1_q_3,
            $user->answer->day_1_q_4,
            $user->answer->day_1_time,
            $user->answer->day_2_q_1,
            $user->answer->day_2_q_2,
            $user->answer->day_2_q_3,
            $user->answer->day_2_q_4,
            $user->answer->day_2_time,
            $user->answer->day_3_q_1,
            $user->answer->day_3_q_2,
            $user->answer->day_3_q_3,
            $user->answer->day_3_q_4,
            $user->answer->day_3_time,
            $user->answer->day_4_q_1,
            $user->answer->day_4_q_2,
            $user->answer->day_4_q_3,
            $user->answer->day_4_q_4,
            $user->answer->day_4_time,
            $user->answer->day_5_q_1,
            $user->answer->day_5_q_2,
            $user->answer->day_5_q_3,
            $user->answer->day_5_q_4,
            $user->answer->day_5_time,
            $user->answer->day_6_q_1,
            $user->answer->day_6_q_2,
            $user->answer->day_6_q_3,
            $user->answer->day_6_q_4,
            $user->answer->day_6_time,
            $user->answer->day_7_q_1,
            $user->answer->day_7_q_2,
            $user->answer->day_7_q_3,
            $user->answer->day_7_q_4,
            $user->answer->day_7_time,
        ] ;

    }

    public function headings() : array {
        return [
            'id',
            'First Name',
            'Last Name',
            'Coordinator',
            'Email',
            'ChemHunt Id',
            'Day 1 Answer 1',
            'Day 1 Answer 2',
            'Day 1 Answer 3',
            'Day 1 Answer 4',
            'Day 1 Time',
            'Day 2 Answer 1',
            'Day 2 Answer 2',
            'Day 2 Answer 3',
            'Day 2 Answer 4',
            'Day 2 Time',
            'Day 3 Answer 1',
            'Day 3 Answer 2',
            'Day 3 Answer 3',
            'Day 3 Answer 4',
            'Day 3 Time',
            'Day 4 Answer 1',
            'Day 4 Answer 2',
            'Day 4 Answer 3',
            'Day 4 Answer 4',
            'Day 4 Time',
            'Day 5 Answer 1',
            'Day 5 Answer 2',
            'Day 5 Answer 3',
            'Day 5 Answer 4',
            'Day 5 Time',
            'Day 6 Answer 1',
            'Day 6 Answer 2',
            'Day 6 Answer 3',
            'Day 6 Answer 4',
            'Day 6 Time',
            'Day 7 Answer 1',
            'Day 7 Answer 2',
            'Day 7 Answer 3',
            'Day 7 Answer 4',
            'Day 7 Time',
        ] ;
    }
}
