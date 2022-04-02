<?php

namespace App\Http\Livewire\detailevent;

use App\Models\Event;
use Livewire\Component;
use App\Models\RegistrantEvent;
use Illuminate\Support\Facades\Crypt;

class DeatailEvent extends Component
{
    public $slug, $registrant, $event;
    public function mount()
    {
        if (isset($this->slug)) {
            $this->event = Event::where('slug_event', $this->slug)->firstorfail();
            $this->registrant = RegistrantEvent::where('event_id', $this->event->id)->get();
        }
    }
    public function render()
    {
        return view('dashboard.detailevent.deatail-event', [
            'registrants' => $this->registrant
        ]);
    }
    public function removeregis($idre)
    {
        $idevent = Crypt::decrypt($idre);
        $registrant = RegistrantEvent::findorfail($idevent)->delete();
    }
}
