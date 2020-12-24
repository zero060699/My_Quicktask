@extends('layout')
@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            @if ($message = Session::get('danger'))
                <div class="alert alert-danger">
                    <p>{{ $message }}</p>
        </div>
            @endif
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input class="form-control" type="text" name="name" placeholder="Name"/>
                </div>
                <div class="form-group">
                    <label for="">Detail</label>
                    <textarea class="form-control" name="detail" placeholder="Detail"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Author</label>
                    <input class="form-control" type="text" name="author" placeholder="Author"/>
                </div>
                <button type="submit" class="btn btn-success">Add</button>
            </form>
        </div>
    </div>
@endsection
