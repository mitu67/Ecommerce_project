<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function parent()
    {
    	return $this->belongsTo(Category::class , 'parent_id');

    }


public static function listForSelect()
{
	$arr = [];
	$categories = Category::all();
	foreach ($categories as $category) {
		$arr[$category->id] = $category->name;
	}
	

	return $arr;
  }
}

