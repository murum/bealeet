<li class="col-xs-12 conversation__message">
    <div class="row">
        <div class="col-xs-12 col-sm-1">
            <div class="text-smaller conversation__message-writer">
                {{ $message->created_at->format('H:i:s') }}
            </div>
        </div>
        <div class="col-xs-4 col-sm-2">
            <div class="text-smaller conversation__message-writer">
                {{ $message->writer->username }}
            </div>
        </div>
        <div class="col-xs-8 col-sm-9">
            <div class="conversation__message-message">
                {{ $message->message }}
            </div>
        </div>
    </div>
</li>