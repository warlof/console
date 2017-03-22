<?php
/**
 * User: Warlof Tutsimo <loic.leuilliot@gmail.com>
 * Date: 19/03/2017
 * Time: 13:59
 */

namespace Seat\Console\Models\Sde;


use Illuminate\Database\Eloquent\Model;

class InvControlTowerResourcePurpose extends Model
{
    protected $fillable = ['purpose', 'purposeText'];

    protected $primaryKey = 'purpose';

    protected $table = 'invControlTowerResourcePurposes';
}
