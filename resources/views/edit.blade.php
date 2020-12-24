@extends('layout')
@section('content')
    <div class="col-md-6 offset-md-3">
        <div class="row">
                <form action="{{ route('posts.update', $post->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $post->name }}"/>
                    </div>
                    <div class="form-group">
                        <label>Detail</label>
                        <textarea name="detail" class="form-control" placeholder="Detail">{{ $post->detail }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Author</label>
                        <input type="text" name="author" class="form-control" placeholder="Author" value="{{ $post->author }}">
                    </div>
                    <button type="submit" class="btn btn-warning">Update</button>
                    <a href="{{ route('posts.index') }}" class="btn btn-default">Back</a>
                </form>
        </div>
    </div>
@endsection
