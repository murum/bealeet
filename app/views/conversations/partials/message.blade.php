<li class="col-xs-12 conversation__message">
    <div class="row">
        <div class="conversation__message__avatar pull-left">
            <img class="img-responsive img-inline img-round" src="{{ $message->writer->present()->gravatar() }}" alt="{{ $message->writer->username }}" />
        </div>

        <div class="conversation__message__meta pull-left">
            <div class="row">
                <div class="col-xs-6">
                    {{ $message->writer->username }}
                </div>
                <div class="col-xs-6 pull-right text-right">
                    {{ $message->created_at->format('H:i:s') }}
                </div>
            </div>

        </div>
        <div class="conversation__message__content pull-right">
            <div class="conversation__message-message">
                {{ nl2br($message->message) }}
            </div>
        </div>
    </div>
</li>