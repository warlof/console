<?php
/**
 * User: Warlof Tutsimo <loic.leuilliot@gmail.com>
 * Date: 19/03/2017
 * Time: 13:59
 */

namespace Seat\Console\Models\Sde;


use Illuminate\Database\Eloquent\Model;

class InvTypeMaterial extends Model
{
    protected $fillable = ['typeID', 'materialTypeID', 'quantity'];

    protected $primaryKey = ['typeID', 'materialTypeID'];

    protected $table = 'invTypeMaterials';
}
