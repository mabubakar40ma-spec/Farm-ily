@extends('frontend.dashboard.index')

@section('content')
    <h2>AI Farming Chatbot</h2>
    <div id="chat-box"></div>

    <input type="text" id="message" placeholder="Ask something..." style="width: 80%;">
    <button onclick="sendMessage()">Send</button>
@endsection

@push('scripts')
    <script>
        const csrf = '{{ csrf_token() }}';

        function sendMessage() {
            const msg = document.getElementById('message').value;
            const chatBox = document.getElementById('chat-box');

            chatBox.innerHTML += `<div class="user"><strong>You:</strong> ${msg}</div>`;

            fetch("{{ route('chatbot.respond') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrf
                    },
                    body: JSON.stringify({
                        message: msg
                    })
                })
                .then(res => {
                    return res.json().catch(() => {
                        throw new Error("Invalid JSON: " + res.status);
                    });
                })
                .then(data => {
                    if (data.error) {
                        alert("Chatbot failed: " + data.message);
                        console.error("Bot Error: ", data.message);
                    } else {
                        chatBox.innerHTML += `<div class="bot"><strong>AI Bot:</strong> ${data.response}</div>`;
                        document.getElementById('message').value = '';
                        chatBox.scrollTop = chatBox.scrollHeight;
                    }
                })
                .catch(err => {
                    alert("Chatbot failed: " + err.message);
                });
        }
    </script>
@endpush
