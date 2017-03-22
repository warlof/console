<?php
/**
 * User: Warlof Tutsimo <loic.leuilliot@gmail.com>
 * Date: 19/03/2017
 * Time: 13:23
 */

namespace Seat\Console\Readers;


use Seat\Console\Models\Sde\InvItem;
use Symfony\Component\Yaml\Yaml;

class ItemReader extends AbstractReader
{
    public function parse()
    {
        $content = Yaml::parse(file_get_contents($this->file));

        if (!is_array($content)) {
            throw new \Exception('invFlags should be a collection !');
        }

        foreach ($content as $item) {
            if ($this->checkItemStructure($item)) {

                InvItem::updateOrCreate([
                    'itemID' => $item['itemID'],
                ], [
                    'typeID' => $item['itemName'],
                    'ownerID' => $item['ownerID'],
                    'locationID' => $item['locationID'],
                    'flagID' => $item['flagID'],
                    'quantity' => $item['quantity']
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
        $fields = ['itemID', 'typeID', 'ownerID', 'locationID', 'flagID', 'quantity'];

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