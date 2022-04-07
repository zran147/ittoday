<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class ContactFormHomePage extends Component
{
    public $name_seeder, $email_seeder, $subject, $body;
    public function render()
    {
        return view('livewire.contact-form-home-page');
    }
    public function submitcontactform()
    {
        $this->validate([
            'name_seeder' => 'required',
            'email_seeder' => 'required|email',
            'subject' => 'required|min:3',
            'body' => 'required|min:5'
        ]);
        $Comment = Comment::create([
            'name_seeder' => $this->name_seeder,
            'email_seeder' => $this->email_seeder,
            'subject_seeder' => $this->subject,
            'body_seeder' => $this->body,
        ]);
        if ($Comment) {
            session()->flash('success', 'Contact form successfully sent.');
        } else {
            session()->flash('error', 'Contact form unsuccessfully sent.');
        }
        $this->resetall();
    }
    public function resetall()
    {
       $this->name_seeder = null;
       $this->email_seeder = null;
       $this->subject = null;
       $this->body = null;
    }
}
