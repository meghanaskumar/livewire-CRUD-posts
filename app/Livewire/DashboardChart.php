<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class DashboardChart extends Component
{
    public $postsCount;
    public $postsLovedCount;

    public function mount()
    {
        $this->postsCount = Post::count();
        $this->postsLovedCount = Post::sum('heart_count');
    }

    public function render()
    {
        return view('livewire.dashboard-chart');
    }
}
