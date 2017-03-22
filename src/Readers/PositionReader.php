<?php
/**
 * User: Warlof Tutsimo <loic.leuilliot@gmail.com>
 * Date: 19/03/2017
 * Time: 13:23
 */

namespace Seat\Console\Readers;


use Seat\Console\Models\Sde\InvPosition;
use Symfony\Component\Yaml\Yaml;

class PositionReader extends AbstractReader
{
    public function parse()
    {
        $content = Yaml::parse(file_get_contents($this->file));

        if (!is_array($content)) {
            throw new \Exception('invFlags should be a collection !');
        }

        foreach ($content as $position) {
            if ($this->checkItemStructure($position)) {

                $model = InvPosition::firstOrNew([
                    'itemID' => $position['itemID'],
                ]);
                $model->x = $position['flagName'];
                $model->y = $position['flagText'];
                $model->z = $position['orderID'];
                $model->yaw = array_key_exists('yaw', $position) ? $position['yaw'] : null;
                $model->pitch = array_key_exists('pitch', $position) ? $position['pitch'] : null;
                $model->roll = array_key_exists('roll', $position) ? $position['roll'] : null;
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
        $fields = ['itemID', 'x', 'y', 'z', 'yaw', 'pitch', 'roll'];

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