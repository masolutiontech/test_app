<?php

namespace App\Http\Livewire\Author\Books;

use Livewire\Component;
use App\Models\Book;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
class AllBooksComponent extends Component
{
    use WithPagination;
    public function delete($id)
    {
        $book=Book::findorFail($id);
        $book->delete();
        session()->flash('message','Book has been deleted successfully');
    }
    public function render()
    {
       $books=Book::where('author_id',Auth::user()->id)->paginate(12);
        return view('livewire.author.books.all-books-component',['books'=>$books])->layout('layouts.author');
    }
}
