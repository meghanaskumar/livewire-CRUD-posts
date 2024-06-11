<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Post;

class CreatePost extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $image;

    public function render()
    {
        return view('livewire.create-post');
    }

    public function save()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|max:1024', // max 1MB
        ]);

        $imageName = $this->image->store('posts', 'public');

        Post::create([
            'title' => $this->title,
            'description' => $this->description,
            'image' => $imageName,
        ]);

        $this->reset();
        session()->flash('message', 'Post created successfully!');
    }
}
