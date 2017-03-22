<?php
/**
 * User: Warlof Tutsimo <loic.leuilliot@gmail.com>
 * Date: 19/03/2017
 * Time: 13:59
 */

namespace Seat\Console\Models\Sde;


use Illuminate\Database\Eloquent\Model;

class InvTypeReaction extends Model
{
    protected $fillable = ['reactionTypeID', 'input', 'typeID', 'quantity'];

    protected $primaryKey = ['reactionTypeID', 'input', 'typeID'];

    protected $table = 'invTypeReactions';
}
