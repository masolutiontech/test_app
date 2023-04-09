<?php

namespace App\Http\Livewire\Author\Books;

use Livewire\Component;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Carbon\Carbon;
class EditBookComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $description;
    public $isbn;
    public $cover;
    public $publish_date;
    public $price;
    public $no_of_pages;
    public $book_id;
    public $new_cover;
    protected $rules=[
        'title'=>'required',
        'description'=>'required',
        'isbn'=>'required',
        'price'=>'required|numeric',
        'no_of_pages'=>'required|integer'
    ];
    public function mount($id)
    {
        $this->book_id=$id;
        $book=Book::findorFail($this->book_id);
        $this->title=$book->title;
        $this->description=$book->description;
        $this->isbn=$book->isbn;
        $this->price=$book->price;
        $this->no_of_pages=$book->no_of_pages;
        $this->publish_date=$book->publish_date;
        $this->cover=$book->cover_image;
    }
    public function updateBook()
    {
        $this->validate();
        try{
            $book=Book::findorFail($this->book_id);
            $book->title=$this->title;
            $book->description=$this->description;
            $book->isbn=$this->isbn;
            $book->price=$this->price;
            $book->no_of_pages=$this->no_of_pages;
            $book->publish_date=$this->publish_date;
            $book->author_id=Auth::user()->id;
            if($this->new_cover)
            {
                $imageName=Carbon::now()->timestamp.'.'.$this->new_cover->extension();
                $this->new_cover->storeAs('images/books/covers',$imageName);
                $book->cover_image=$imageName;
                unlink('storage/app/images/books/covers/'.$this->cover);
            }
            $book->save();
            session()->flash('message','Book has been updated Successfully');
            
        }catch(\Exception $e)
        {
            session()->flash('message',$e->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.author.books.edit-book-component')->layout('layouts.author');
    }
}
