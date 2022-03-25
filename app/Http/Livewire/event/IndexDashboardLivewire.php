<?php

namespace App\Http\Livewire\event;

use App\Models\Event;
use App\Models\RegistrantEvent;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class IndexDashboardLivewire extends Component
{
    protected $listeners = ['success' => '$refresh'];
    public function render()
    {
        return view('dashboard.event.index-dashboard-livewire', [
            'allevent' => Event::with('registrant')->get(),
        ]);
    }
    public function activeevent($idevent, $active)
    {
        // dd($idevent);
        $idevent = Crypt::decrypt($idevent);

        if ($active == 'draft') {
            $active = 'published';
        } else {
            $active = 'draft';
        }

        $event = Event::findorfail($idevent);
        $update = $event->update([
            'active' => $active
        ]);
        if ($update) {
            to_route('indexdashboardcontroller');
        }
    }
    public function deleteevent($idevent)
    {
        $idevent = Crypt::decrypt($idevent);
        $delete = Event::findorfail($idevent)->delete();
        if ($delete) {
            to_route('indexdashboardcontroller');
        }
    }
}
