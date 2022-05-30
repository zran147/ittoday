<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class ContactFormHomePage extends Component
{
    public $name, $email, $subject, $message;
    public function render()
    {
        return view('livewire.contact-form-home-page');
    }
    public function submitcontactform()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required|min:3',
            'message' => 'required|min:5'
        ]);
        $Comment = Comment::create([
            'name_seeder' => $this->name,
            'email_seeder' => $this->email,
            'subject_seeder' => $this->subject,
            'body_seeder' => $this->message,
        ]);
        if ($Comment) {
            session()->flash('success', 'Message Successfully Sent.');
        }
        $this->resetall();
    }
    public function resetall()
    {
       $this->name = null;
       $this->email = null;
       $this->subject = null;
       $this->message = null;
    }
}
