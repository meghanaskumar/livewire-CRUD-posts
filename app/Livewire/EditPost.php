<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Post;

class EditPost extends Component
{
    use WithFileUploads;

    public $post;
    public $title;
    public $description;
    public $image;
    public $oldImage;

    public function mount(Post $post)
    {
        $this->title = $post->title;
        $this->description = $post->description;
        
    }

    public function render()
    {
       // dd($this->all());die;
        return view('livewire.edit-post');
    }

    public function update()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => $this->image ? 'image|max:1024' : '', // max 1MB
        ]);

        if ($this->image) {
            $imageName = $this->image->store('posts', 'public');
            $this->post->image = $imageName;
        }

        $this->post->title = $this->title;
        $this->post->description = $this->description;
        $this->post->save();

        session()->flash('message', 'Post updated successfully!');
    }
}
