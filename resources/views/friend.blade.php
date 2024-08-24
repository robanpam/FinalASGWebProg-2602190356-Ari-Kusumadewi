@extends('layout.navbar')

@section('title', 'Friend')
@section('activeFriend', 'active')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="container">
        <div class="row">
            @foreach ($dataFriend as $user)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('storage/' . $user->profile_path) }}" alt="{{ $user->name }}'s profile"
                            class="card-img-top img-fluid" style="object-fit: cover; height: 250px;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $user->name }}</h5>
                            <p class="card-text">{{ $user->hobbies }}</p>
                            <a href="{{ route('message.show', $user->id) }}"
                                class="btn btn-primary w-100 mb-2">
                                <i class="bi bi-chat-dots"></i> Message
                            </a>
                            <a href="https://zoom.us/j/ZOOM_MEETING_ID" class="btn btn-success w-100" target="_blank">
                                <i class="bi bi-camera-video"></i> Video Call
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
