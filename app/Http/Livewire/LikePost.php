<?php

namespace App\Http\Livewire;

use Livewire\Component;

// Como el de Components q maneja la logica y la data
class LikePost extends Component
{
    public function render()
    {
        return view('livewire.like-post');
    }
}
