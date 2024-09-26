<?php

namespace App\Http\ViewComposer;

use App\Http\Resources\UserResource;
use App\Models\Category;
use App\Models\Flag;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class BodyComposer
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
            'date' => $this->getFormattedDate(),
            'categories' => $this->categories(),
            'flags' => $this->flags(),
        ]);
    }

    private function getFormattedDate()
    {
        return Carbon::now()->format('l, d F');
    }
    private function categories()
    {
        return User::find(auth()->user()->id)->categories->toArray();
    }

    private function flags()
    {
        return User::find(auth()->user()->id)->flags->toArray();
    }

}