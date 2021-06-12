<?php

namespace App\Orchid\Screens\Chemhunt\Answer;

use App\Exports\Chemhunt\TodayAnswerExport;
use App\Models\User;
use App\Orchid\Layouts\Chemhunt\Answer\AnswerTodayListLayout;
use App\Orchid\Layouts\Chemhunt\Answer\ResultEditLayout;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class AnswerTodayListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Today Answers';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'ChemHunt today\'s answers list';

    /**
     * @var string
     */
    public $permission = 'platform.chemhunt.answers.today.show';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        $this->description = 'Day '.config('chemhunt.day').' ChemHunt answers list';
        return [
            'users'=>User::filters()
                ->where('admin_id',\Auth::user()->id)
                ->with('result')
                ->with('answer')
                ->select('id','first_name','last_name','user_email','email')
                ->paginate('30'),
        ];
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [

        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): array
    {
        return [
            AnswerTodayListLayout::class,
            Layout::modal('oneAsyncModal', ResultEditLayout::class)
                ->async('asyncGetUser'),
        ];
    }

    /**
     * @param User $user
     *
     * @return array
     */
    public function asyncGetUser(User $user): array
    {
        return [
            'user' => $user,
        ];
    }

    /**
     * @param User $user
     * @param Request $request
     */
    public function saveResult(User $user, Request $request): void
    {
        $user->result()->update([
            'day_'.config('chemhunt.day').'_r_1'=>$request->input('user.result.day_'.config('chemhunt.day').'_r_1'),
            'day_'.config('chemhunt.day').'_r_2'=>$request->input('user.result.day_'.config('chemhunt.day').'_r_2'),
            'day_'.config('chemhunt.day').'_r_3'=>$request->input('user.result.day_'.config('chemhunt.day').'_r_3'),
            'day_'.config('chemhunt.day').'_r_4'=>$request->input('user.result.day_'.config('chemhunt.day').'_r_4'),
        ]);
        Toast::info(__('Result Updated.'));
    }

}
