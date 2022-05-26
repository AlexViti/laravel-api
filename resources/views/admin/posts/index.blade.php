@extends('layouts.templates.admin')

@section('title', 'Posts')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('layouts.partials.dashNav')
            <div class="col-md-10">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                {{-- Table with posts --}}
                <h1>Posts</h1>
                <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Add Post</a>
                {{ $posts->links() }}
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Author</th>
                            <th scope="col">Category</th>
                            <th scope="col">Tags</th>
                            <th scope="col">Created</th>
                            <th scope="col">Updated</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <th scope="row">{{ $post->id }}</th>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->user->name }}</td>
                                <td>@if ($post->category) {{ $post->category->name }} @endif</td>
                                <td>@if ($post->tags) {{ $post->tags->pluck('name')->join(', ') }} @endif</td>
                                <td>{{ $post->created_at }}</td>
                                <td>{{ $post->updated_at }}</td>
                                <td class="d-flex align-items-start">
                                    <a href="{{ route('admin.posts.show', $post->slug) }}" class="btn btn-primary">Show</a>
                                    @if (auth()->id() == $post->user_id)
                                        <a href="{{ route('admin.posts.edit', $post->slug) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('admin.posts.destroy', $post->slug) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
