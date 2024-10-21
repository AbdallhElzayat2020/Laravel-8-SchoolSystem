<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Counter extends Component
{
    public $count = 0;
    public $search = '';
    public function increment()
    {
        $this->count++;
    }
    public function decrement()
    {
        $this->count--;
    }
    public function render()
    {
        return view('livewire.counter', [
            'users' => User::where('name', $this->search)->get(),
        ]);
        // return view('livewire.counter');
    }
}