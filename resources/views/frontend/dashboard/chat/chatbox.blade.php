@extends('frontend.dashboard.index')

@section('content')
    <div class="container">
        {{-- <h4>Chat with {{ $receiver->name }} (from listing: {{ $listing->title }})</h4> --}}
        <h4>
            Chat with {{ $receiver->name }}
            {{ $listing?->title ? '(from listing: ' . $listing->title . ')' : '' }}
        </h4>


        <div id="chat-box" style="height:300px; overflow-y:scroll; border:1px solid #ccc; padding: 10px;"></div>

        <form id="chat-form">
            @csrf
            <input type="hidden" id="to_user_id" name="to_user_id" value="{{ $receiver->id }}">
            <input type="hidden" id="listing_id" name="listing_id" value="{{ $listing?->id }}">

            {{-- <input type="hidden" id="listing_id" name="listing_id" value="{{ $listing->id }}"> --}}
            <div class="input-group mt-2">
                <input type="text" id="message" name="message" class="form-control" placeholder="Type a message">
                <button class="btn btn-primary">Send</button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function loadMessages() {
            $.get(`/chat/messages/${$('#to_user_id').val()}`, function(data) {
                $('#chat-box').html('');
                data.forEach(function(msg) {
                    $('#chat-box').append(
                        `<div><strong>${msg.from_user_id == {{ auth()->id() }} ? 'You' : 'Them'}:</strong> ${msg.message}</div>`
                    );
                });
                $('#chat-box').scrollTop($('#chat-box')[0].scrollHeight);
            });
        }

        $('#chat-form').on('submit', function(e) {
            e.preventDefault();
            $.post("{{ route('chat.send') }}", $(this).serialize(), function() {
                $('#message').val('');
                loadMessages();
            });
        });

        setInterval(loadMessages, 5000);
        loadMessages();
    </script>
@endpush
