<?php namespace App\Http\Controllers;

use App\Initiative;
use App\Stakeholder;

class AdminController extends Controller {


    function getStakeholderPage () {

        $list = Stakeholder::all();

        return view('stakeholders', ['list' => $list]);

    }

    function getInitiativePage () {

        $list = Initiative::all();

        return view('initiatives', ['list' => $list]);

    }

    function addStakeholderPage () {

        return view('addstakeholders');

    }

    function addInitiativePage () {

        $list = Initiative::all();

        return view('initiatives', ['list' => $list]);

    }

}


