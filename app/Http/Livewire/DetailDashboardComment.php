<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DetailDashboardComment extends Component
{
    public $comment;
    public function render()
    {
        return view('dashboard.contact.detail-dashboard-comment');
    }
}
