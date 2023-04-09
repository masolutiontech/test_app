<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Book;
use Livewire\WithPagination;


class AdminDashboardComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $books=Book::paginate(12);
        return view('livewire.admin.admin-dashboard-component',['books'=>$books])->layout('layouts.admin');
    }
}
