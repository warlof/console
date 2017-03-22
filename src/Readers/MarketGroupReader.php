<?php
/**
 * User: Warlof Tutsimo <loic.leuilliot@gmail.com>
 * Date: 19/03/2017
 * Time: 13:23
 */

namespace Seat\Console\Readers;


use Seat\Console\Models\Sde\InvMarketGroup;
use Symfony\Component\Yaml\Yaml;

class MarketGroupReader extends AbstractReader
{
    public function parse()
    {
        $content = Yaml::parse(file_get_contents($this->file));

        if (!is_array($content)) {
            throw new \Exception('invFlags should be a collection !');
        }

        foreach ($content as $marketGroup) {
            if ($this->checkItemStructure($marketGroup)) {

                $model = InvMarketGroup::firstOrNew([
                    'marketGroupID' => $marketGroup['marketGroupID'],
                ]);
                $model->parentGroupID = array_key_exists('parentGroupID', $marketGroup) ? $marketGroup['itemName'] : null;
                $model->marketGroupName = $marketGroup['ownerID'];
                $model->description = array_key_exists('description', $marketGroup) ? $marketGroup['description'] : null;
                $model->iconID = array_key_exists('iconID', $marketGroup) ? $marketGroup['flagID'] : null;
                $model->hasTypes = $marketGroup['hasTypes'];
                $model->save();

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
        $fields = ['marketGroupID', 'marketGroupName', 'hasTypes'];

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