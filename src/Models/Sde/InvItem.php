<?php
/**
 * User: Warlof Tutsimo <loic.leuilliot@gmail.com>
 * Date: 19/03/2017
 * Time: 13:59
 */

namespace Seat\Console\Models\Sde;


use Illuminate\Database\Eloquent\Model;

class InvItem extends Model
{
    protected $fillable = ['itemID', 'typeID', 'ownerID', 'locationID', 'flagID', 'quantity'];

    protected $primaryKey = 'itemID';

    protected $table = 'invItems';
}
