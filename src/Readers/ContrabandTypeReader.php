<?php
/**
 * User: Warlof Tutsimo <loic.leuilliot@gmail.com>
 * Date: 19/03/2017
 * Time: 13:23
 */

namespace Seat\Console\Readers;


use Seat\Console\Models\Sde\InvContrabandType;
use Symfony\Component\Yaml\Yaml;

class ContrabandTypeReader extends AbstractReader
{
    public function parse()
    {
        $content = Yaml::parse(file_get_contents($this->file));

        if (!is_array($content)) {
            throw new \Exception('invFlags should be a collection !');
        }

        foreach ($content as $contrabandType) {
            if ($this->checkItemStructure($contrabandType)) {

                InvContrabandType::updateOrCreate([
                    'factionID' => $contrabandType['factionID'],
                    'typeID' => $contrabandType['typeID'],
                ], [
                    'standingLoss' => $contrabandType['standingLoss'],
                    'confiscateMinSec' => $contrabandType['confiscateMinSec'],
                    'fineByValue' => $contrabandType['fineByValue'],
                    'attackMinSec' => $contrabandType['attackMinSec'],
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
        $fields = ['factionID', 'typeID', 'standingLoss', 'confiscateMinSec', 'fineByValue', 'attackMinSec'];

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