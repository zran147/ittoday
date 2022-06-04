<?php

namespace App\Http\Livewire\event;

use App\Models\Event;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class CreateDashboardLivewire extends Component
{
    use WithFileUploads;
    public $id_event;
    public $action;
    public $name_event, $start_event, $finish_event, $desc_event, $registrant_event, $thumbnail_event, $category, $keterangan_event;
    public function mount()
    {
        if (!is_null($this->id_event)) {
            $event = Event::findorfail($this->id_event);
            $this->name_event = $event->name_event;
            $this->start_event = $event->start_event;
            $this->finish_event = $event->finish_event;
            $this->desc_event = $event->description_event;
            $this->registrant_event = $event->registrant_event;
            $this->thumbnail_event = $event->thumbnail_event;
            $this->keterangan_event = $event->keterangan;
        } else {
            $this->resetall();
        }
    }
    public function render()
    {
        return view('dashboard.event.create-dashboard-livewire',[
            'categories' => Category::all(),
        ]);
    }
    public function Store()
    {
        $this->validate([
            'name_event' => 'required|unique:events,name_event|max:100|string',
            'start_event' => 'required|date',
            'finish_event' => 'required|date',
            'desc_event' => 'required|string',
            'registrant_event' => 'required|integer',
            'thumbnail_event' => 'required|image|mimes:jpg,png',
            'category' => 'required|integer',
            'keterangan_event' => 'required',
        ]);
        $thumbnail_event = $this->thumbnail_event->store('thumbnail_event');
        $name_event = ucwords($this->name_event);
        Event::create([
            'name_event' => $name_event,
            'slug_event' => str(strtolower($this->name_event))->slug('-'),
            'start_event' => $this->start_event,
            'finish_event' => $this->finish_event,
            'description_event' =>  $this->desc_event,
            'registrant_event' => $this->registrant_event,
            'thumbnail_event' => $thumbnail_event,
            'category_id' => $this->category,
            'keterangan' => $this->keterangan_event
        ]);

        to_route('indexdashboardcontroller');
    }
    public function resetall()
    {
        $this->name_event = null;
        $this->start_event = null;
        $this->finish_event = null;
        $this->desc_event = null;
        $this->registrant_event = null;
        $this->thumbnail_event = null;
    }

    public function Update()
    {
        $this->validate([
            'name_event' => 'required|max:100|string|unique:events,name_event,' . $this->id_event,
            'start_event' => 'required|date',
            'finish_event' => 'required|date',
            'desc_event' => 'required|string',
            'registrant_event' => 'required|integer',
        ]);
        $name_event = ucwords($this->name_event);
        Event::findorfail($this->id_event)->update([
            'name_event' => $name_event,
            'slug_event' => str(strtolower($this->name_event))->slug('-'),
            'start_event' => $this->start_event,
            'finish_event' => $this->finish_event,
            'description_event' =>  $this->desc_event,
            'registrant_event' => $this->registrant_event,
            'thumbnail_event' => $this->thumbnail_event,
            'keterangan' => $this->keterangan_event
        ]);
        to_route('indexdashboardcontroller');
    }
}
