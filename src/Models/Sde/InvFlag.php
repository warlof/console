<?php
/**
 * User: Warlof Tutsimo <loic.leuilliot@gmail.com>
 * Date: 19/03/2017
 * Time: 13:59
 */

namespace Seat\Console\Models\Sde;


use Illuminate\Database\Eloquent\Model;

class InvFlag extends Model
{
    protected $fillable = ['flagID', 'flagName', 'flagText', 'orderID'];

    public $timestamps = false;

    protected $primaryKey = 'flagID';

    protected $table = 'invFlags';
}
