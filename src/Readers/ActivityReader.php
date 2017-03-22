<?php
/**
 * User: Warlof Tutsimo <loic.leuilliot@gmail.com>
 * Date: 19/03/2017
 * Time: 13:23
 */

namespace Seat\Console\Readers;


use Seat\Console\Models\Sde\RamActivity;
use Symfony\Component\Yaml\Yaml;

class ActivityReader extends AbstractReader
{
    public function parse()
    {
        $content = Yaml::parse(file_get_contents($this->file));

        if (!is_array($content)) {
            throw new \Exception('invFlags should be a collection !');
        }

        foreach ($content as $activity) {
            if ($this->checkItemStructure($activity)) {

                $model = RamActivity::firstOrNew([
                    'activityID' => $activity['activityID'],
                ]);

                $model->activityName = $activity['activityName'];
                $model->iconNo = array_key_exists('iconNo', $activity) ? $activity['iconNo'] : null;
                $model->description = $activity['description'];
                $model->published = $activity['published'];
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
        $fields = ['activityID', 'activityName', 'description', 'published'];

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