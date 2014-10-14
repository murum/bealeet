<?php namespace Bealeet\Review;

use Laracasts\Commander\CommandHandler;
use Bealeet\Users\UserRepository;
use Bealeet\Users\User;
use Laracasts\Commander\Events\DispatchableTrait;

class CreateReviewCommandHandler implements CommandHandler {

    use DispatchableTrait;

    /**
     * @var UserRepository
     */
    protected $repository;

    /**
     * @param UserRepository $repository
     */
    function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $user = $this->repository->findById($command->user_id);
        $writer = $this->repository->findById($command->writer_id);

        if( $this->repository->alreadyReviewed($writer, $user) )
        {
            $this->repository->removeReviews($writer, $user);
        }

        $this->repository->addReview($command->review, $writer, $user);

        return $user;
    }

}