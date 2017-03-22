<?php
/**
 * User: Warlof Tutsimo <loic.leuilliot@gmail.com>
 * Date: 19/03/2017
 * Time: 13:59
 */

namespace Seat\Console\Models\Sde;


use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = ['typeID', 'groupID', 'typeName', 'description', 'mass', 'volume', 'capacity', 'portionSize',
        'raceID', 'basePrice', 'published', 'marketGroupID', 'iconID', 'soundID', 'graphicID'];

    protected $primaryKey = 'typeID';

    public $timestamps = false;

    protected $table = 'invTypes';
}
