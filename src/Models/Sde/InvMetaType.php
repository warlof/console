<?php
/**
 * User: Warlof Tutsimo <loic.leuilliot@gmail.com>
 * Date: 19/03/2017
 * Time: 13:59
 */

namespace Seat\Console\Models\Sde;


use Illuminate\Database\Eloquent\Model;

class InvMetaType extends Model
{
    protected $fillable = ['typeID', 'parentTypeID', 'metaGroupID'];

    protected $primaryKey = 'typeID';

    protected $table = 'invMetaTypes';
}
