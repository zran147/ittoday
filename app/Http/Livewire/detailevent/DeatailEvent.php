<?php

namespace App\Http\Livewire\detailevent;

use App\Models\Event;
use App\Models\RegistrantEvent;
use Livewire\Component;

class DeatailEvent extends Component
{
    public $slug, $registrant;
    public function mount()
    {
        if (isset($this->slug)) {
            $event = Event::where('slug_event', $this->slug)->firstorfail();
            $this->registrant = RegistrantEvent::where('event_id', $event->id)->get();
        }
    }
    public function render()
    {
        return view('dashboard.detailevent.deatail-event', [
            'registrants' => $this->registrant
        ]);
    }
}
