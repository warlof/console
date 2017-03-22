<?php
/**
 * User: Warlof Tutsimo <loic.leuilliot@gmail.com>
 * Date: 19/03/2017
 * Time: 13:59
 */

namespace Seat\Console\Models\Sde;


use Illuminate\Database\Eloquent\Model;

class StaStation extends Model
{
    protected $fillable = [
        'stationID', 'security', 'dockingCostPerVolume', 'maxShipVolumeDockable', 'officeRentalCost',
        'operationID', 'stationTypeID', 'corporationID', 'solarSystemID', 'constellationID', 'regionID', 'stationName',
        'x', 'y', 'z', 'reprocessingEfficiency', 'reprocessingStationsTake', 'reprocessingHangarFlag'];

    protected $primaryKey = 'stationID';

    protected $table = 'staStations';
}
