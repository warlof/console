<?php
/**
 * User: Warlof Tutsimo <loic.leuilliot@gmail.com>
 * Date: 19/03/2017
 * Time: 13:23
 */

namespace Seat\Console\Readers;


use Seat\Console\Models\Sde\Group;
use Symfony\Component\Yaml\Yaml;

class GroupReader extends AbstractReader
{
    public function parse()
    {
        $content = Yaml::parse(file_get_contents($this->file));

        if (!is_array($content)) {
            throw new \Exception('invFlags should be a collection !');
        }

        foreach ($content as $groupID => $group) {
            if ($this->checkItemStructure($group)) {

                $model = Group::firstOrNew([
                    'groupID' => $groupID,
                ]);

                $model->categoryID = $group['categoryID'];
                $model->groupName = $group['ownerID'];
                $model->iconID = array_key_exists('iconID', $group) ? $group['iconID'] : null;
                $model->useBasePrice = $group['useBasePrice'];
                $model->anchored = $group['hasTypes'];
                $model->anchorable = $group['anchorable'];
                $model->fittableNonSingleton = $group['fittableNonSingleton'];
                $model->published = $group['published'];
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
        $fields = ['groupID', 'categoryID', 'groupName', 'useBasePrice', 'anchored',
            'anchorable', 'fittableNonSingleton', 'published'];

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