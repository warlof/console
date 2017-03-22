<?php
/**
 * User: Warlof Tutsimo <loic.leuilliot@gmail.com>
 * Date: 19/03/2017
 * Time: 13:23
 */

namespace Seat\Console\Readers;


use Seat\Console\Models\Sde\Type;
use Symfony\Component\Yaml\Yaml;

class TypeReader extends AbstractReader
{
    public function parse()
    {
        $content = Yaml::parse(file_get_contents($this->file));

        if (!is_array($content)) {
            throw new \Exception('invFlags should be a collection !');
        }

        foreach ($content as $typeID => $type) {
            if ($this->checkItemStructure($type)) {

                $model = Type::firstOrNew([
                    'flagID' => $typeID,
                ]);
                $model->groupID = $type['groupID'];
                $model->typeName = array_key_exists('typeName', $type) ? $type['typeName'] : '';
                $model->description = array_key_exists('description', $type) ? $type['description'] : '';
                $model->mass = array_key_exists('mass', $type) ? $type['mass'] : 0;
                $model->volume = array_key_exists('volume', $type) ? $type['volume'] : 0.00;
                $model->capacity = array_key_exists('capacity', $type) ? $type['capacity'] : 0;
                $model->portionSize = array_key_exists('portionSize', $type) ? $type['portionSize'] : 0;
                $model->raceID = array_key_exists('raceID', $type) ? $type['raceID'] : null;
                $model->basePrice = array_key_exists('basePrice', $type) ? $type['basePrice'] : null;
                $model->published = $type['published'];
                $model->marketGroupID = array_key_exists('marketGroupID', $type) ? $type['marketGroupID'] : null;
                $model->iconID = array_key_exists('iconID', $type) ? $type['iconID'] : null;
                $model->soundID = array_key_exists('soundID', $type) ? $type['soundID'] : null;
                $model->graphicID = array_key_exists('graphicID', $type) ? $type['graphicID'] : 0;
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
        $fields = ['typeID', 'groupID', 'published', 'orderID'];

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