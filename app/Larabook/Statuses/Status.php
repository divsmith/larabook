<?php namespace Larabook\Statuses; 

use Eloquent;
use Larabook\Statuses\Events\StatusWasPublished;
use Laracasts\Commander\Events\EventGenerator;

class Status extends Eloquent {

    use EventGenerator;

    /**
     * Fillable fields for a new status.
     * @var array
     */
    protected $fillable = ['body'];

    /**
     * A status has one user
     *
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo('Larabook\Users\User');
    }

    /**
     * Publish a new status
     *
     * @param $body
     * @return static
     */
    public static function publish($body)
    {
        $status = new static(compact('body'));

        $status->raise(new StatusWasPublished($body));

        return $status;
    }
} 