<div class="container">
    @if(Session::has('message'))
    <div class="alert alert-success">{{Session::get('message')}}</div>
    @endif
    <form  wire:submit.prevent="addBook" enctype="multipart/form-data">
        <div class="row">
            <div class="form-group">
                <label for="title" class="label-control">title</label>
                <input type="text" name="title" id="title" class="form-control" wire:model="title">
                @error('title') <span class="text-danger">{{$message}}</span>@enderror
            </div>
            <div class="form-group">
                <label for="title" class="label-control">Description</label>
                <textarea name="description" id="" cols="30" rows="10" class="form-control" wire:model="description"></textarea>
                @error('description') <span class="text-danger">{{$message}}</span>@enderror
            </div>
            <div class="form-group">
                <label for="title" class="label-control">ISBN</label>
                <input type="text" name="isbn" id="isbn" class="form-control" wire:model="isbn">
                @error('isbn') <span class="text-danger">{{$message}}</span>@enderror
            </div>
            <div class="form-group">
                <label for="publish_date" class="label-control">Publish Date</label>
                <input type="date" name="publish_date" id="publish_date" class="form-control" wire:model="publish_date">
                @error('publish_date') <span class="text-danger">{{$message}}</span>@enderror
            </div>
            <div class="form-group">
                <label for="price" class="label-control">Price</label>
                <input type="text" name="price" id="price" class="form-control" wire:model="price">
                @error('price') <span class="text-danger">{{$message}}</span>@enderror
            </div>
            <div class="form-group">
                <label for="no_of_pages" class="label-control">No of Pages</label>
                <input type="text" name="no_of_pages" id="no_of_pages" class="form-control" wire:model="no_of_pages">
                @error('no_of_pages') <span class="text-danger">{{$message}}</span>@enderror
            </div>
            <div class="form-group">
                <label for="cover" class="label-control">Cover</label>
                <input type="file" name="cover" id="cover" class="form-control" wire:model="cover">
                @error('cover') <span class="text-danger">{{$message}}</span>@enderror
                @if($cover)
                <img src="{{$cover->temporaryUrl()}}" width="120" alt="">
                @endif
            </div>
            <div class="form-group">
                <button type="submit" class="btn bg-success">Add</button>
            </div>
        </div>
    </form>
</div>
