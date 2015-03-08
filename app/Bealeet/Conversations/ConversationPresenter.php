<?php namespace Bealeet\Conversations;

use Laracasts\Presenter\Presenter;

class ConversationPresenter extends Presenter {

    use ConversationRepository;

    public function getMessagePreview($length = '80') {
        $text = $this->message;

        if (strlen($text) > $length) {
            $text = substr($text, 0, $length);
            $text = substr($text,0,strrpos($text," "));
            $etc = " ...";
            $text = $text.$etc;
        }

        return $text;
    }

    public function readClass() {
        $conversation = Conversation::find($this->id);
        return ($conversation->hasUnreadMessages()) ? 'unread' : 'read';
    }

    public function lastActiveGravatar() {
        $conversation = Conversation::find($this->id);
        $last_message = $conversation->messages->last();
        return $last_message->writer->present()->gravatar();
    }

    public function lastActiveTime() {
        $conversation = Conversation::find($this->id);
        $last_message = $conversation->messages->last();
        return $last_message->created_at;
    }
}