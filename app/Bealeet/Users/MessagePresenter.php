<?php namespace Bealeet\Users;

use Laracasts\Presenter\Presenter;

class MessagePresenter extends Presenter {

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
        return ($this->read) ? 'read' : 'unread';
    }
}