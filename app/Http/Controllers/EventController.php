<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistrantEvent;
use Illuminate\Support\Facades\Crypt;

class EventController extends Controller
{
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
            'slug' => $slug
        ]);
    }
}
