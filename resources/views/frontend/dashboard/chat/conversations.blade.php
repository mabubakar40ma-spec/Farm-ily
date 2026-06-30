@extends('frontend.dashboard.index')

@section('content')
    <div class="container">
        <h4>Your Conversations</h4>
        <ul class="list-group">
            @forelse($users as $user)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $user->name }}
                    <a href="{{ route('chat.withUser.direct', ['user' => $user->id]) }}" class="btn btn-sm btn-primary">
                        Open Chat
                    </a>
                </li>
            @empty
                <li class="list-group-item">No conversations yet.</li>
            @endforelse
        </ul>
    </div>
@endsection
