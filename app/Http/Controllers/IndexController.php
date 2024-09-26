<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware('auth');


    }

    /**
     * Show the application all tasks.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tasks.index');
    }


    /**
     * Show the application today tasks.
     *
     * @return \Illuminate\Http\Response
     */
    public function toDay()
    {
        return view('tasks.index');
    }
    /**
     * Show the application finished tasks.
     *
     * @return \Illuminate\Http\Response
     */
    public function completed()
    {
        return view('tasks.index');
    }
    /**
     * Show the application categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function categories()
    {
        return view('tasks.index');
    }

    /**
     * Show the application flags.
     *
     * @return \Illuminate\Http\Response
     */
    public function flags()
    {
        return view('tasks.index');
    }


}
