<?php

namespace App\Http\Livewire\event;

use App\Models\RegistrantEvent;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class RegisEvent extends Component
{
    public $status,$event,$regis, $slug;
    protected $listeners = ['some-event' => '$refresh'];
    public function mount()
    {
       if(Auth::id()){
         $this->regis = RegistrantEvent::where('user_id',Auth::id())->where('event_id',$this->event)->first();
       }
    }

    public function render()
    {
        return view('event.regis-event');
    }
    public function regisevent()
    {
        $regis = RegistrantEvent::create([
            'user_id' => Auth::id(),
            'event_id' => $this->event
        ]);
        if($regis){
            $this->dispatchBrowserEvent('info', ['status' => 'berhasil']);
        }else{
            $this->dispatchBrowserEvent('info', ['status' => 'gagal']);
        }
        return redirect('event/detail/'.$this->slug);
    }
}
