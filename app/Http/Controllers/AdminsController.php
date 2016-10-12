<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Survey;
use App\Models\SurveyAssignment;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class AdminsController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        return view('manage.dashboard');
    }

}
