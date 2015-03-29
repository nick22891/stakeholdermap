<?php namespace App\Http\Controllers;

use App\Initiative;
use App\Stakeholder;
use Illuminate\Support\Facades\Input;

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

    function processStakeholder () {

        $name = Input::get('name');

        $type = Input::get('type');

        $functional_area = Input::get('functional_area');

        $url = Input::get('url');

        $country = Input::get('country');

        $newstakeholder = Stakeholder::create(['name' => $name, 'type' => $type, 'functional_area' => $functional_area, 'url' => $url, 'country' => $country]);

        return "User's Name is " . $newstakeholder->name . " " . $newstakeholder->type . " " . $newstakeholder->functional_area . " " . $newstakeholder->url . " " . $newstakeholder->country;

    }

}


