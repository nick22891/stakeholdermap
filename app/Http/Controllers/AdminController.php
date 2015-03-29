<?php namespace App\Http\Controllers;

use App\Initiative;
use App\Stakeholder;
use App\Geocode;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller {

    function getStakeholderMap () {

        $list = Stakeholder::all();

        return view('mapview', ['list' => $list]);

    }

    function getStakeholderPage () {

        $list = Stakeholder::all();

        return view('stakeholders', ['list' => $list]);

    }

    function getInitiativePage () {

        $list = Initiative::all();

        return view('initiatives', ['list' => $list]);

    }

    function getStakeholderJSON () {

        $list = Stakeholder::all();

        return '{"results":' . $list . '}';

    }

    function getInitiativeJSON ($stakeholder) {

        $list = Initiative::where('stakeholder', $stakeholder)->get();

        return '{"results":' . $list . '}';

    }

    function getGeocodeJSON ($country) {

        $list = Geocode::where('countryname', $country)->get();

        return '{"results":' . $list . '}';

    }

    function addStakeholderPage () {

        return view('addstakeholders');

    }

    function addInitiativePage () {

        $list = Initiative::all();

        return view('addinitiatives');

    }

    function processStakeholder () {

        $name = Input::get('name');

        $type = Input::get('type');

        $functional_area = Input::get('functional_area');

        $url = Input::get('url');

        $country = Input::get('country');

        $newstakeholder = Stakeholder::create(['name' => $name, 'type' => $type, 'functional_area' => $functional_area, 'url' => $url, 'country' => $country]);

        return "New Stakeholder Info : " . $newstakeholder->name . " " . $newstakeholder->type . " " . $newstakeholder->functional_area . " " . $newstakeholder->url . " " . $newstakeholder->country;

    }

    function processInitiative () {

        $name = Input::get('name');

        $initiative_type = Input::get('initiative_type');

        $stakeholder = Input::get('stakeholder');

        $initiative_url = Input::get('initiative_url');

        $date = Input::get('date');

        $country = Input::get('country');

        $newinitiative = Initiative::create(['name' => $name, 'initiative_type' => $initiative_type, 'stakeholder' => $stakeholder, 'initiative_url' => $initiative_url, 'country' => $country, 'date' => $date]);

        return "New Initiative Info : " . $newinitiative->name . " " . $newinitiative->initiative_type . " " . $newinitiative->stakeholder . " " . $newinitiative->initiative_url . " " . $newinitiative->country. " " . $newinitiative->date;

    }

}


