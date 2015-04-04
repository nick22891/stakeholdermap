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

        $list = Stakeholder::with('initiatives')->orderBy('country')->get();

        return view('stakeholders', ['list' => $list]);

    }

    function getInitiativePage () {

        $list = Initiative::with('stakeholders')->orderBy('name')->get();

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

        $list = Stakeholder::distinct()->select('country')->get();

        $types_list = Stakeholder::distinct()->select('type')->get();

        return view('addstakeholders', ['listOfCountries' => $list, 'listOfTypes' => $types_list]);

    }

    function addInitiativePage () {

        $list = Initiative::distinct()->select('country')->get();

        $types_list = Initiative::distinct()->select('initiative_type')->get();

        $stakeholders_list = Stakeholder::distinct()->select('name', 'id')->get();

        return view('addinitiatives', ['listOfCountries' => $list, 'listOfTypes' => $types_list, 'listOfStakeholders' => $stakeholders_list]);

    }

    function processStakeholder () {

        $name = Input::get('name');

        $type = Input::get('type');

        $functional_area = Input::get('functional_area');

        $url = Input::get('url');

        $country = Input::get('country');

        $newstakeholder = Stakeholder::create(['name' => $name, 'type' => $type, 'functional_area' => $functional_area, 'url' => $url, 'country' => $country]);

        return "<script>window.location = 'http://stakeholdermap.eu1.frbit.net/stakeholders'</script>";

    }

    function processInitiative () {

        $name = Input::get('name');

        $initiative_type = Input::get('initiative_type');

        $leaders = Input::get('leaders');

        $partners = Input::get('partners');

        $sponsors = Input::get('sponsors');

        $initiative_url = Input::get('initiative_url');

        $date = Input::get('date');

        $country = Input::get('country');

        $newinitiative = Initiative::create(['name' => $name, 'initiative_type' => $initiative_type, 'initiative_url' => $initiative_url, 'country' => $country, 'date' => $date]);

        foreach ((array)$leaders as $leader_id) {

          //insert query here using $newinitiative->id
            $newinitiative->stakeholders()->attach($leader_id, ['type' => 'Leader']);

        }

        foreach ((array)$partners as $partner_id) {

            //insert query here using $newinitiative->id
            $newinitiative->stakeholders()->attach($partner_id, ['type' => 'Partner']);

        }

        foreach ((array)$sponsors as $sponsor_id) {

            //insert query here using $newinitiative->id
            $newinitiative->stakeholders()->attach($sponsor_id, ['type' => 'Sponsor']);

        }

        return "<script>window.location = 'http://stakeholdermap.eu1.frbit.net/initiatives'</script>";

    }

    function deleteStakeholder ($stakeholder_id) {

        $stakeholder = Stakeholder::find($stakeholder_id);

        $stakeholder->delete();

        return "<script>window.location = 'http://stakeholdermap.eu1.frbit.net/stakeholders'</script>";

    }

    function editStakeholder () {

        $id = Input::get('id');

        $fieldname = Input::get('fieldname');

        $content = Input::get('content');

        $stakeholder = Stakeholder::find($id);

        switch ($fieldname) {

            case 'name' : $stakeholder->name = $content;

            break;

            case 'type' : $stakeholder->type = $content;

            break;

            case 'functional' : $stakeholder->functional_area = $content;

            break;

            case 'url' : $stakeholder->url = $content;

            break;

            case 'country' : $stakeholder->country = $content;

            break;

        }

        $stakeholder->save();

    }

}


