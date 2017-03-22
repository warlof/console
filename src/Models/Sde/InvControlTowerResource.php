<?php
/**
 * User: Warlof Tutsimo <loic.leuilliot@gmail.com>
 * Date: 19/03/2017
 * Time: 13:59
 */

namespace Seat\Console\Models\Sde;


use Illuminate\Database\Eloquent\Model;

class InvControlTowerResource extends Model
{
    protected $fillable = ['controlTowerTypeID', 'resourceTypeID', 'purpose', 'quantity',
        'minSecurityLevel', 'factionID'];

    protected $primaryKey = ['controlTowerTypeID', 'resourceTypeID'];

    public $timestamps = false;

    protected $table = 'invControlTowerResources';
}
