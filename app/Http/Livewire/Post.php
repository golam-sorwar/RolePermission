<?php

namespace App\Http\Livewire;

use App\Post as AppPost;
use Livewire\Component;

class Post extends Component
{
    public $id, $title, $description, $publish;

    public $editPost = false;

    public function mounted()
    {
        AppPost::created(function () {
            $this->refresh();
        });

        AppPost::updated(function () {
            $this->refresh();
        });

        AppPost::deleted(function () {
            $this->refresh();
        });
    }

    public function addPost()
    {
        $this->validate([
            'title' => 'required|max:20',
            'description' => 'required|max:300'
        ]);

        AppPost::create([
            'title' => $this->title,
            'description' => $this->description,
            'urlToImage' => 'https://lorempixel.com/350/200/?'. $this->title,
            'publish' => $this->publish
        ]);

        $this->title = $this->description = $this->publish = '';
    }

    public function editPost($id)
    {
        $post= AppPost::find($id);
        $this->id = $post->id;
        $this->title=$post->title;
        $this->description = $post->description;

        $this->editPost = true;
    }

    public function updatePost($id)
    {
        $post = AppPost::find($id);
        $post->title=$this->title;
        $post->description=$this->description;
        $post->save();

        $this->editPost=false;
        $this->title=$this->description='';
    }

    public function deletePost($id)
    {
        AppPost::find($id)->delete();
    }

    public function render()
    {
        return view('livewire.post', [
            'posts' => AppPost::all()
        ]);
    }
}
