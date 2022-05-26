<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Carbon;

class EventController extends Controller
{
    public function index()
    {
        return view('event.indexcontroller',[
            'event' => Event::where('active','published')->with('registrant','category')->get()
        ]);
    }
    public function show($slug)
    {
        $event = Event::where('slug_event', $slug)->where('active','published')->with('registrant','category')->first();
        if ( empty($event) ) {
            return redirect('/event');
        }
        return view('event.showcontroller',[
            'event' => $event
        ]);
    }
    public function indexdashboard()
    {

        return view('dashboard.event.indexdashboardcontroller');
    }
    public function createdashboard()
    {
        return view('dashboard.event.createdashboardcontroller', [
            'action' => 'Store',
            'id_event' => null,
        ]);
    }
    public function editdashboard($idevent)
    {
        $idevent = Crypt::decrypt($idevent);
        return view('dashboard.event.createdashboardcontroller', [
            'action' => 'Update',
            'id_event' => $idevent,
        ]);
    }
    public function registranteventdashboard($slug)
    {
        return view('dashboard.detailevent.indexdetailbyslugcontroller',[
            'name_event' => str_replace("-", " ", $slug),
            'slug' => $slug,
        ]);
    }

}
