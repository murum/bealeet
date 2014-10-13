<?php namespace Bealeet\Users;

use Laracasts\Commander\Events\EventGenerator;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Laracasts\Presenter\PresentableTrait;

class Message extends Eloquent {

    use EventGenerator, PresentableTrait;

    /**
     * Which fields may be mass assigned?
     *
     * @var array
     */
    protected $fillable = ['message', 'read'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'messages';


    protected $presenter = 'Bealeet\Users\MessagePresenter';

	/**
     * The sender User of the message
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sender() {
       return $this->belongsTo('\Bealeet\Users\User', 'sender_id', 'id');
    }

	/**
     * The reciever User of the message
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reciever() {
        return $this->belongsTo('\Bealeet\Users\User', 'reciever_id', 'id');
    }

}