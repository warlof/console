<?php
/**
 * User: Warlof Tutsimo <loic.leuilliot@gmail.com>
 * Date: 19/03/2017
 * Time: 13:59
 */

namespace Seat\Console\Models\Sde;


use Illuminate\Database\Eloquent\Model;

class InvMarketGroup extends Model
{
    protected $fillable = ['marketGroupID', 'parentGroupID', 'marketGroupName', 'description', 'iconID', 'hasType'];

    protected $primaryKey = 'marketGroupID';

    public $timestamps = false;

    protected $table = 'invMarketGroups';
}
