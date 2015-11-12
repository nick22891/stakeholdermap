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

        $stakeholders_list = Stakeholder::distinct()->select('name', 'id')->get();

        return view('initiatives', ['list' => $list, 'listOfStakeholders' => $stakeholders_list]);

    }

    function getStakeholderJSON () {

        $list = Stakeholder::with('initiatives')->get();

        return '{"results":' . $list . '}';

    }

    function getInitiativeJSON ($stakeholder_id) {

        $list = Stakeholder::find($stakeholder_id)->initiatives;

        return '{"results":' . $list . '}';

    }

    function getGeocodeJSON ($country) {

        $list = Geocode::where('countryname', $country)->get();

        return '{"results":' . $list . '}';

    }

    function getAllGeocodeJSON () {

        $list = Geocode::all();

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

        return "<script>window.location = 'http://localhost/stakeholdermap/public/stakeholders'</script>";

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

        return "<script>window.location = 'http://localhost/stakeholdermap/public/initiatives'</script>";

    }

    function deleteStakeholder ($stakeholder_id) {

        $stakeholder = Stakeholder::find($stakeholder_id);

        $stakeholder->initiatives()->detach();

        $stakeholder->delete();

        return "<script>window.location = 'http://localhost/stakeholdermap/public/stakeholders'</script>";

    }

    function deleteInitiative ($initiative_id) {

        $initiative = Initiative::find($initiative_id);

        $initiative->stakeholders()->detach();

        $initiative->delete();

        return "<script>window.location = 'http://localhost/stakeholdermap/public/initiatives'</script>";

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

    function editInitiative () {

        $id = Input::get('id');

        $fieldname = Input::get('fieldname');

        $content = Input::get('content');

        $initiative = Initiative::find($id);

        switch ($fieldname) {

            case 'name' : $initiative->name = $content;

                break;

            case 'type' : $initiative->initiative_type = $content;

                break;

            case 'date' : $initiative->date = $content;

                break;

            case 'url' : $initiative->initiative_url = $content;

                break;

            case 'country' : $initiative->country = $content;

                break;

        }

        $initiative->save();

    }

    function editInitiativeStakeholders () {

        $id = Input::get('initiative_id');

        $leaders = Input::get('leaders');

        $partners = Input::get('partners');

        $sponsors = Input::get('sponsors');

        $initiative = Initiative::find($id);

        $initiative->stakeholders()->detach();

        foreach ((array)$leaders as $leader_id) {

            $initiative->stakeholders()->attach($leader_id, ['type' => 'Leader']);

        }

        foreach ((array)$partners as $partner_id) {

            $initiative->stakeholders()->attach($partner_id, ['type' => 'Partner']);

        }

        foreach ((array)$sponsors as $sponsor_id) {

            $initiative->stakeholders()->attach($sponsor_id, ['type' => 'Sponsor']);

        }

        $ulist = "<ul>";

        foreach ($initiative->stakeholders as $stakeholder) {

            $ulist = $ulist . "<li>" . $stakeholder->name . " (" . $stakeholder->pivot->type . ")";

        }

        $ulist = $ulist . "</ul>";

        return $ulist;

    }

}


