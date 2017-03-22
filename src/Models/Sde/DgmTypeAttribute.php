<?php
/**
 * User: Warlof Tutsimo <loic.leuilliot@gmail.com>
 * Date: 19/03/2017
 * Time: 13:59
 */

namespace Seat\Console\Models\Sde;


use Illuminate\Database\Eloquent\Model;

class DgmTypeAttribute extends Model
{
    protected $fillable = ['typeID', 'attributeID', 'valueInt', 'valueFloat'];

    protected $primaryKey = ['typeID', 'attributeID'];

    public $timestamps = false;

    protected $table = 'dgmTypeAttributes';
}
