@if($message->to_user == $user)
    <div class="chat">
        <div class="chat-body">
            <div class="chat-content">
                <p>{{ $message->message }}</p>
            </div>
        </div>
    </div>
@endif
@if($message->from_user == $user)
    <div class="chat chat-left">
        <div class="chat-body">
            <div class="chat-content">
                <p>{{ $message->message }}</p>
            </div>
        </div>
    </div>
@endif
