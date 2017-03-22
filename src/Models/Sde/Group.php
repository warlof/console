<?php
/**
 * User: Warlof Tutsimo <loic.leuilliot@gmail.com>
 * Date: 19/03/2017
 * Time: 13:59
 */

namespace Seat\Console\Models\Sde;


use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['groupID', 'categoryID', 'groupName', 'iconID', 'useBasePrice', 'anchored', 'anchorable',
        'fittableNonSingleton', 'published'];

    protected $primaryKey = 'groupID';

    protected $table = 'invGroups';
}
