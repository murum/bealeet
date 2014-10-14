<?php namespace Bealeet\Users;

use Laracasts\Commander\Events\EventGenerator;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Laracasts\Presenter\PresentableTrait;

class Review extends Eloquent {

    use EventGenerator, PresentableTrait;

    /**
     * Which fields may be mass assigned?
     *
     * @var array
     */
    protected $fillable = ['writer_id', 'user_id', 'review'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'reviews';


    protected $presenter = 'Bealeet\Users\ReviewPresenter';

    /**
     * The writer of the review
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function writer() {
        return $this->belongsTo('\Bealeet\Users\User', 'writer_id', 'id');
    }

    /**
     * The reviewed user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo('\Bealeet\Users\User', 'user_id', 'id');
    }

}