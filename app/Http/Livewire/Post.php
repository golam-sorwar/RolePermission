<?php

namespace App\Http\Livewire;

use App\Post as AppPost;
use Livewire\Component;

class Post extends Component
{
    public function render()
    {
        return view('livewire.post',[
            'posts' => AppPost::where('publish',1)->get()
        ]);
    }
}
