<?php namespace Bealeet\Review;

class CreateReviewCommand {

    public $writer_id;

    public $user_id;

    public $review;

    function __construct($writer_id, $user_id, $review)
    {
        $this->writer_id = $writer_id;
        $this->user_id = $user_id;
        $this->review = $review;
    }

}