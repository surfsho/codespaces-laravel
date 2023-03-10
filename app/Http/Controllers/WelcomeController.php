<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class WelcomeController extends Controller
{
    function index() {
        //get all patients
        $patients = DB::table('patients')->get();
        //render vuejs template
        return  Inertia::render('Welcome',[
            'user.name' => 'he',
            'patients' => $patients
        ]);
    }
}
