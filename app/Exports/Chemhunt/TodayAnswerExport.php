<?php

namespace App\Exports\Chemhunt;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TodayAnswerExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::with('answer','admin')->get();
    }

    public function map($user) : array {
        $data = [
            $user->id,
            $user->first_name,
            $user->last_name,
            $user->admin->name,
            $user->user_email,
            $user->email,
            $user->answer->{'day_'.config('chemhunt.day').'_q_1'},
            $user->answer->{'day_'.config('chemhunt.day').'_q_2'},
            $user->answer->{'day_'.config('chemhunt.day').'_q_3'},
            $user->answer->{'day_'.config('chemhunt.day').'_q_4'},
            $user->answer->{'day_'.config('chemhunt.day').'_time'},
        ] ;

        return $data;
    }

    public function headings() : array {
        return [
            'id',
            'First Name',
            'Last Name',
            'Coordinator',
            'Email',
            'ChemHunt Id',
            'Day '.config('chemhunt.day').' Answer 1',
            'Day '.config('chemhunt.day').' Answer 2',
            'Day '.config('chemhunt.day').' Answer 3',
            'Day '.config('chemhunt.day').' Answer 4',
            'Time',
        ] ;
    }
}
