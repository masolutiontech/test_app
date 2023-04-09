<div class="container-fluid">
   
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
                            {{$book->author->name}}
                        </div>
                    </td>
                    <td>{{$book->description}}</td>
                    <td>{{$book->isbn}}</td>
                    <td>{{$book->price}}</td>
                    <td>{{$book->no_of_pages}}</td>
                    <td>{{$book->publish_date}}</td>
                    <td>{{$book->created_at}}</td>
                  
                </tr>
                @empty
                <tr>
                    <div>No Boo Publish Yet</div>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{$books->links()}}
    </div>
</div>
