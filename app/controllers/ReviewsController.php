<?php

use Bealeet\Forms\ReviewForm;
use Bealeet\Review\CreateReviewCommand;

class ReviewsController extends BaseController {

	/**
	 * @var ReviewForm
	 */
	private $reviewForm;

	public function __construct(ReviewForm $reviewForm)
	{
		$this->reviewForm = $reviewForm;
	}

    public function store($user_id)
    {
		$input = array_add(Input::only('review'), 'user_id', $user_id);
		$input = array_add($input, 'writer_id', Auth::user()->id);

		$this->reviewForm->validate( $input );

		$this->execute(CreateReviewCommand::class, $input);

		Flash::success('Your review were posted');

		return Redirect::back();
    }

}
