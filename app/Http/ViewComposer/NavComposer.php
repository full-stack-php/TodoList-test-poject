<?php

namespace App\Http\ViewComposer;

use App\Http\Resources\UserResource;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class NavComposer
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
            'user' => $this->getUserData(),
        ]);
    }

    private function getUserData(){
        return UserResource::toArray(auth()->user());
    }

}