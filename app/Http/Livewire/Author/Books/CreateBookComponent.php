<?php

namespace App\Http\Livewire\Author\Books;

use Livewire\Component;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class CreateBookComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $description;
    public $isbn;
    public $cover;
    public $publish_date;
    public $price;
    public $no_of_pages;
    protected $rules=[
        'title'=>'required',
        'description'=>'required',
        'isbn'=>'required',
        'cover'=>'mimes:jpeg,jpg,png,gif|required|max:10000',
        'price'=>'required|numeric',
        'no_of_pages'=>'required|integer'
    ];
    public function addBook()
    {
        $this->validate();
        try{
            $book=new Book();
            $book->title=$this->title;
            $book->description=$this->description;
            $book->isbn=$this->isbn;
            $book->price=$this->price;
            $book->no_of_pages=$this->no_of_pages;
            $book->publish_date=$this->publish_date;
            $book->author_id=Auth::user()->id;
            if($this->cover)
            {
                $imageName=Carbon::now()->timestamp.'.'.$this->cover->extension();
                $this->cover->storeAs('images/books/covers',$imageName);
                $book->cover_image=$imageName;
            }
            $book->save();
            session()->flash('message','Book has been added Successfully');
            $this->reset();
        }catch(\Exception $e)
        {
            session()->flash('message',$e->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.author.books.create-book-component')->layout('layouts.author');
    }
}
