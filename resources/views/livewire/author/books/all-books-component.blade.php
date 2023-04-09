<div class="container-fluid">
    <ul class="flex ">
        <li class="mr-2"><a href="{{route('author.add_book')}}" class="btn bg-success">Add New Book</a></li>
        <li class="mr-2"><a href="{{route('author.list_of_books')}}" class="btn btn-success">Author Published Book List</a></li>
    </ul>
    @if(Session::has('message'))
    <div class="alert laert-success">{{Session::get('message')}}</div>
    @endif
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>ISBN</th>
                    <th>Price</th>
                    <th>Pages</th>
                    <th>Publish Date</th>
                    <th>Created Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($books as $book)
                <tr>
                    <td>{{$book->id}}</td>
                    <td>
                        <div>
                            <img src="{{ asset('storage/app/images/books/covers/' . $book->cover_image) }}" width="120" alt="{{$book->title}}">
                            {{$book->title}}
                        </div>
                    </td>
                    <td>{{$book->description}}</td>
                    <td>{{$book->isbn}}</td>
                    <td>{{$book->price}}</td>
                    <td>{{$book->no_of_pages}}</td>
                    <td>{{$book->publish_date}}</td>
                    <td>{{$book->created_at}}</td>
                    <td>
                        <a href="{{route('author.edit_book',['id'=>$book->id])}}" class="btn btn-info">Edit Book</a>
                        <a href="#" wire:click.prevent="deleteBook('{{$book->id}}')" class="btn btn-danger">Delete Book</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <div>No Boo Publish Yet</div>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
