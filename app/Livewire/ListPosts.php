<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;


class ListPosts extends Component
{
    public $posts;

    public function mount()
    {
        $this->posts = Post::all();
    }

    public function deletePost($postId)
    {
        $post = Post::find($postId);
        if ($post) {
            $post->delete();
            session()->flash('message', 'Post deleted successfully.');
        }
    }

    public function increaseHeartCount($postId){
        
        $post = Post::find($postId);
        if ($post) {
            $post->update([
                'heart_count' => $post->heart_count + 1,
            ]);
        }
        $this->posts = Post::all();
    }

    public function render()
    {
        return view('livewire.list-posts');

    }
}
