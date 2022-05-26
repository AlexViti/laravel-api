@extends('layouts.templates.admin')

@section('title', 'Post!')

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
                {{-- Form to create post --}}
                <h1>Create Post</h1>
                <form action="{{ route('admin.posts.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="title" class="col-form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="slug" class="col-form-label">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}">
                        <input type="button" class="btn btn-primary" id="slug-btn" value="Create Slug">
                    </div>
                    @error('slug')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="category" class="col-form-label">Category</label>
                        <select class="form-select" id="category" name="category_id">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}
                                >
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('category')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea class="form-control" id="body" name="body" rows="10"></textarea>
                    </div>
                    @error('body')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="tags" class="col-form-label">Tags</label>
                        <input type="text" class="form-control" id="tags" name="tags">
                    </div>

                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>

@endsection
