@extends('layouts.templates.admin')

@section('title', $post->title)

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h1 class="text-capitalize">{{ $post->title }}</h1>
                <p>{{ $post->body }}</p>
            </div>
        </div>
    </div>

@endsection
