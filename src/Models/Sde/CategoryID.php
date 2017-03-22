<?php
/**
 * User: Warlof Tutsimo <loic.leuilliot@gmail.com>
 * Date: 19/03/2017
 * Time: 13:59
 */

namespace Seat\Console\Models\Sde;


use Illuminate\Database\Eloquent\Model;

class CategoryID extends Model
{
    protected $fillable = ['categoryID', 'categoryName', 'iconID', 'published'];

    protected $primaryKey = 'categoryID';

    public $timestamps = false;

    protected $table = 'invCategories';
}
