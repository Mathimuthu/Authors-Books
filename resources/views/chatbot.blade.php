@extends('layout')

@section('content')
<style>
#chatResponse div {
    margin-bottom: 10px;
    padding: 8px;
    background-color: #f0f0f0;
    border-radius: 10px;
}

#chatResponse div strong {
    color: #007bff;
}
</style>
<div class="container mt-4">
    <h3 class="text-center">Chatbot</h3>
    <div class="card shadow-sm p-4">
        <div id="chatResponse" class="mb-3" style="min-height: 200px; max-height: 400px; overflow-y: auto; border: 1px solid #ddd; padding: 10px;">
            <!-- Chat responses will appear here -->
        </div>
        <div class="d-flex">
            <input type="text" id="userInput" class="form-control" placeholder="Ask something..." autocomplete="off" style="border-radius: 25px;"/>
            <button class="btn btn-primary ms-2" id="sendMessageBtn" style="border-radius: 25px;">Send</button>
            <button class="btn btn-danger ms-2" id="clearChatBtn" style="border-radius: 25px;">Clear</button>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.getElementById('userInput').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
        sendMessage();
    }
});

document.getElementById('sendMessageBtn').addEventListener('click', function() {
    sendMessage();
});

document.getElementById('clearChatBtn').addEventListener('click', function() {
    clearChat();
});

function sendMessage() {
    const userInput = document.getElementById('userInput');
    const msg = userInput.value.trim();

    if (msg === "") return;

    const chatResponseDiv = document.getElementById('chatResponse');
    chatResponseDiv.innerHTML += `<div><strong>You:</strong> ${msg}</div>`;
    chatResponseDiv.scrollTop = chatResponseDiv.scrollHeight;

    fetch('/chatbot/query', {
        method: 'POST',
        headers: {'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}'},
        body: JSON.stringify({message: msg})
    })
    .then(res => res.json())
    .then(data => {
        chatResponseDiv.innerHTML += `<div><strong>Bot:</strong> ${data.reply}</div>`;
        chatResponseDiv.scrollTop = chatResponseDiv.scrollHeight;
        userInput.value = '';
    });
}

function clearChat() {
    const chatResponseDiv = document.getElementById('chatResponse');
    chatResponseDiv.innerHTML = ''; 
}
</script>
@endsection
