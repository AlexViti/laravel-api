@extends('layouts.templates.admin')

@section('title', $post->title . ' | Edit')

@section('content')
    <div class="container">
        @include('layouts.partials.dashNav')
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                {{-- Form to edit post --}}
                <h1>Edit Post</h1>
                <form action="{{ route('admin.posts.update', $post->slug) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}">
                    </div>
                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea class="form-control" id="body" name="body" rows="10">{{ old('body', $post->body) }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
        <form action="{{ route('admin.posts.destroy', $post->slug) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>

@endsection
