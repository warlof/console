<?php
/**
 * User: Warlof Tutsimo <loic.leuilliot@gmail.com>
 * Date: 19/03/2017
 * Time: 13:23
 */

namespace Seat\Console\Readers;


use Seat\Console\Models\Sde\StaStation;
use Symfony\Component\Yaml\Yaml;

class StationReader extends AbstractReader
{
    public function parse()
    {
        $content = Yaml::parse(file_get_contents($this->file));

        if (!is_array($content)) {
            throw new \Exception('invFlags should be a collection !');
        }

        foreach ($content as $station) {
            if ($this->checkItemStructure($station)) {

                StaStation::updateOrCreate([
                    'stationID' => $station['stationID'],
                ], [
                    'security' => $station['security'], 'dockingCostPerVolume' => $station['dockingCostPerVolume'],
                    'maxShipVolumeDockable' => $station['maxShipVolumeDockable'],
                    'officeRentalCost' => $station['officeRentalCost'],
                    'operationID' => $station['operationID'], 'stationTypeID' => $station['stationTypeID'],
                    'corporationID' => $station['corporationID'], 'solarSystemID' => $station['solarSystemID'],
                    'constellationID' => $station['constellationID'], 'regionID' => $station['regionID'],
                    'stationName' => $station['stationName'], 'x' => $station['x'], 'y' => $station['y'], 'z' => $station['z'],
                    'reprocessingEfficiency' => $station['reprocessingEfficiency'],
                    'reprocessingStationsTake' => $station['reprocessingStationsTake'],
                    'reprocessingHangarFlag' => $station['reprocessingHangarFlag']
                ]);

                $this->success++;
            } else {
                $this->error++;
            }
        }
    }

    /**
     * Allow to check the structure of an item from the collection
     *
     * @param array $item The item from which the structure must be checked
     * @return bool True if the structure has been successfully checked
     */
    protected function checkItemStructure($item) : bool
    {
        $fields = [
            'stationID', 'security', 'dockingCostPerVolume', 'maxShipVolumeDockable', 'officeRentalCost',
            'operationID', 'stationTypeID', 'corporationID', 'solarSystemID', 'constellationID', 'regionID',
            'stationName', 'x', 'y', 'z', 'reprocessingEfficiency', 'reprocessingStationsTake', 'reprocessingHangarFlag'
        ];

        if (!is_array($item)) {
            return false;
        }

        foreach ($fields as $field) {
            if (!array_key_exists($field, $item)) {
                return false;
            }
        }

        return true;
    }
}