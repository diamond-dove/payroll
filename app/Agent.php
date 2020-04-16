<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    //
    protected $fillable = [
        'user_name',
        'agent_id',
        'current_user_group',
        'most_recent_user_group',
        'calls',
        'time',
        'pause',
        'pauseavg',
        'wait',
        'waitavg',
        'talk',
        'talkavg',
        'dispo',
        'dispoavg',
        'dead',
        'deadavg',
        'customer',
        'custavg',
        'a',
        'b',
        'callbk',
        'dc',
        'dec',
        'dnc',
        'front',
        'frontf',
        'frontn',
        'n',
        'ni',
        'nomed',
        'np',
        'pu',
        'sale',
        'slam',
        'xfer'
    ];

    protected $cell_count = 0;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->cell_count = count($this->fillable);
    }

    public function getCellCount()
    {
        return $this->cell_count;
    }

    public function fill(array $attributes)
    {
        if ($this->cell_count === count($attributes)) {
            $data = [];
            foreach ($attributes as $c => $cell) {
                $data[$this->fillable[$c]] = $cell;
            }
            return parent::fill($data);
        }

        return $this;

    }

}
