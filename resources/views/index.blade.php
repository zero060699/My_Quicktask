@extends('layout')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <h1>{{ trans('label.crud') }}</h1>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('posts.create') }}" class="btn btn-primary">{{ trans('label.add') }}</a>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>{{ trans('label.no') }}</th>
                <th>{{ trans('lable.name') }}</th>
                <th>{{ trans('lable.detail') }}</th>
                <th>{{ trans('lable.author') }}</th>
            </tr>
        </thead>
        <tbody>
            @php
               $count = 1;
            @endphp
            @foreach ($posts as $post)
                <th>{{ $count++ }}</th>
                <th>{{ $post->name }}</th>
                <th>{{ $post->detail }}</th>
                <th>{{ $post->author }}</th>
                <td>
                    <form action="{{ route('posts.destroy', $post->id) }}">
                        <a href="#" class="btn btn-info">{{ trans('lable.comment') }}</a>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">{{ trans('lable.detail') }}</a>
                        <button type="submit" class="btn btn-danger">{{ trans('label.delete') }}</button>
                    </form>
                </td>
            @endforeach
        </tbody>
    </table>
@endsection
