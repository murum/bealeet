<?php namespace Bealeet\Users;

trait ReviewTrait {

    /**
     * Get the list of users you've reviewed.
     *
     * @return mixed
     */
    public function writtenReviews()
    {
        return $this->hasMany('\Bealeet\Users\Review', 'writer_id');
    }

    /**
     * Get the list of reviews the user has got
     *
     * @return mixed
     */
    public function reviews()
    {
        return $this->hasMany('\Bealeet\Users\Review', 'user_id');
    }

    /**
     * Get specified of recieved reviews
     *
     * @param int $count
     */
    public function getReviews($count = 3) {

        // Check if the user has less reviews than the count and if so set the count to the reviews count.
        if( $this->reviews()->count() < $count )
        {
            $count = $this->reviews()->count();
        }

        return $this->reviews()->take($count)->orderBy('created_at', 'DESC')->get();
    }

    /**
     * Get amount of reviews
     *
     * @return mixed
     */
    public function getReviewsCount() {
        return $this->reviews()->count();
    }
}