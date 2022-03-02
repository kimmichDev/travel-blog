@extends('layouts.master')
@section('content')
    @auth
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    <div class="d-flex p-3 justify-content-between shadow-sm">
                        <h3>Welcome <span>{{ auth()->user()->name }}</span></h3>
                        <a class="btn btn-primary px-3" href="{{ route('post.create') }}">Create</a>
                    </div>
                </div>
            </div>
        </div>
    @endauth
    <div class="container">
        @foreach ($posts as $post)
            <div class="row justify-content-center mb-3">
                <div class="col-12 col-lg-6">
                    <div class="card-cover post-card border shadow position-relative rounded-3"
                        style="background-image: url('{{ asset('storage/cover/' . $post->cover) }}')">
                        <div class="p-3 position-absolute bottom-0">
                            <div class="p-2 post-text rounded">
                                <div class=" d-flex justify-content-between align-items-start">
                                    <h3 class="fw-bold">{{ $post->title }}</h3>
                                    <img src="{{ asset('storage/misc/' . $post->user->profile_photo) }}" height="30"
                                        width="30" alt="" class="rounded-circle">
                                </div>
                                <div class="text-black-50">
                                    <i class="fas fa-calendar fw"></i>
                                    {{ $post->created_at->format('d-M-Y') }}
                                </div>
                                <p class="mb-0">
                                    {{ Str::words($post->excerpt, 20) }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
