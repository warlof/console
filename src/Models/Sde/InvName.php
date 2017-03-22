<?php
/**
 * User: Warlof Tutsimo <loic.leuilliot@gmail.com>
 * Date: 19/03/2017
 * Time: 13:59
 */

namespace Seat\Console\Models\Sde;


use Illuminate\Database\Eloquent\Model;

class InvName extends Model
{
    protected $fillable = ['itemID', 'itemName'];

    protected $primaryKey = 'itemID';

    protected $table = 'invNames';
}
