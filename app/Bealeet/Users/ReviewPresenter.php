<?php namespace Bealeet\Users;

use Laracasts\Presenter\Presenter;

class ReviewPresenter extends Presenter {

    public function getPreview($length = '80') {
        $text = $this->review;

        if (strlen($text) > $length) {
            $text = substr($text, 0, $length);
            $text = substr($text,0,strrpos($text," "));
            $etc = " ...";
            $text = $text.$etc;
        }

        return $text;
    }
}