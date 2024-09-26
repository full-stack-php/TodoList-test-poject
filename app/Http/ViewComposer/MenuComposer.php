<?php

namespace App\Http\ViewComposer;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MenuComposer
{


    /**
     * Bind data to the view.
     *
     * @param View $view
     *
     * @return void
     */
    public function compose($view)
    {
        $view->with([
            'total' => $this->getTotalTasksData(),
            'todayTotal' => $this->getTotalTasksDataToDay(),
            'todayTotalCompleted' => $this->getTotalTasksDataToDayCompleted(),
        ]);
    }
    private function getTotalTasksData() : int
    {
        return Task::where('user_id', auth()->user()->id)->count();
    }
    private function getTotalTasksDataToDay() : int
    {
        return Task::where('user_id', auth()->user()->id)
            ->whereDate('due_date', Carbon::now())
            ->count();
    }
    private function getTotalTasksDataToDayCompleted() : int
    {
        return Task::where('user_id', auth()->user()->id)
            ->whereDate('due_date', Carbon::now())
            ->where('is_active', 1)
            ->count();
    }
}