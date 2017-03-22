<?php
/**
 * User: Warlof Tutsimo <loic.leuilliot@gmail.com>
 * Date: 19/03/2017
 * Time: 13:59
 */

namespace Seat\Console\Models\Sde;


use Illuminate\Database\Eloquent\Model;

class InvPosition extends Model
{
    protected $fillable = ['itemID', 'x', 'y', 'z', 'yaw', 'pitch', 'roll'];

    protected $primaryKey = 'itemID';

    public $timestamps = false;

    protected $table = 'invPositions';
}
