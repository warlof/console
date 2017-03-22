<?php
/**
 * User: Warlof Tutsimo <loic.leuilliot@gmail.com>
 * Date: 19/03/2017
 * Time: 13:59
 */

namespace Seat\Console\Models\Sde;


use Illuminate\Database\Eloquent\Model;

class InvMetaGroup extends Model
{
    protected $fillable = ['metaGroupID', 'metaGroupName', 'description', 'iconID'];

    protected $primaryKey = 'metaGroupID';

    public $timestamps = false;

    protected $table = 'invMetaGroups';
}
