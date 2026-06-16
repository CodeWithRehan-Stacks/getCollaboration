<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\UserMatch;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class ChatComponent extends Component
{
    public $match;
    public $messages = [];
    public $newMessage = '';
    public $otherUser;

    public function mount(UserMatch $match)
    {
        $user = Auth::user();

        if ($match->creator->user_id !== $user->id && $match->investor->user_id !== $user->id) {
            abort(403);
        }

        $this->match = $match;
        $this->otherUser = $user->role === 'creator' ? $match->investor->user : $match->creator->user;

        $this->loadMessages();
    }

    public function loadMessages()
    {
        $this->messages = Message::where(function ($query) {
            $query->where('sender_id', Auth::id())
                  ->where('receiver_id', $this->otherUser->id);
        })->orWhere(function ($query) {
            $query->where('sender_id', $this->otherUser->id)
                  ->where('receiver_id', Auth::id());
        })->orderBy('created_at', 'asc')->get();
    }

    public function sendMessage()
    {
        $this->validate([
            'newMessage' => 'required|string|max:1000',
        ]);

        Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $this->otherUser->id,
            'message' => $this->newMessage,
        ]);

        $this->newMessage = '';
        $this->loadMessages();
        $this->dispatch('messageAdded');
    }

    public function acceptCollaboration()
    {
        $this->match->update(['status' => 'connected']);
        $this->loadMessages(); // Re-render
    }

    public function render()
    {
        return view('livewire.chat-component')
            ->layout('layouts.app'); // using breeze app layout
    }
}
