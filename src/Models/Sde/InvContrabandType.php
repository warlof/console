<?php
/**
 * User: Warlof Tutsimo <loic.leuilliot@gmail.com>
 * Date: 19/03/2017
 * Time: 13:59
 */

namespace Seat\Console\Models\Sde;


use Illuminate\Database\Eloquent\Model;

class InvContrabandType extends Model
{
    protected $fillable = ['factionID', 'typeID', 'standingLoss', 'confiscateMinSec', 'fineByValue', 'attackMinSec'];

    protected $primaryKey = ['factionID', 'typeID'];

    protected $table = 'invContrabandTypes';
}
