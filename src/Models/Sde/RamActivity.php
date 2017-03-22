<?php
/**
 * User: Warlof Tutsimo <loic.leuilliot@gmail.com>
 * Date: 19/03/2017
 * Time: 13:59
 */

namespace Seat\Console\Models\Sde;


use Illuminate\Database\Eloquent\Model;

class RamActivity extends Model
{
    protected $fillable = ['activityID', 'activityName', 'iconNo', 'description', 'published'];

    protected $primaryKey = 'activityID';

    public $timestamps = false;

    protected $table = 'ramActivities';
}
