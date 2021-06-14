<?php

namespace App\Exports\Chemhunt;

use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TasksExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::with('admin','task')->get();
    }

    public function map($user) : array {
        return [
            $user->id,
            $user->first_name,
            $user->last_name,
            $user->admin->name,
            $user->user_email,
            $user->email,
            $user->task->day_1,
            $user->task->hunt_day_1,
            $user->task->day_2,
            $user->task->hunt_day_2,
            $user->task->day_3,
            $user->task->hunt_day_3,
            $user->task->day_4,
            $user->task->hunt_day_4,
            $user->task->day_5,
            $user->task->hunt_day_5,
            $user->task->day_6,
            $user->task->hunt_day_6,
            $user->task->day_7,
            $user->task->hunt_day_7,
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
            'Task 1',
            'Hunt 1',
            'Task 2',
            'Hunt 2',
            'Task 3',
            'Hunt 3',
            'Task 4',
            'Hunt 4',
            'Task 5',
            'Hunt 5',
            'Task 6',
            'Hunt 6',
            'Task 7',
            'Hunt 7',
        ] ;
    }
}
