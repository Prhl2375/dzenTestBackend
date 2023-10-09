<?php

namespace App\SF;

use App\Models\Post;
use App\Models\SortingFilter;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class NameFilter extends SFAbstraction
{
    public static function getDropdownCollection($id): Collection
    {
        $collection = SortingFilter::whereIn('id', [$id])->select('id', 'name', 'query_name')->get();
        $sortingFilterMethods = Post::select('id','name')->get()->toArray();
        array_unshift($sortingFilterMethods, ['id'=>'0', 'name'=>'All']);
        $collection[0]->sorting_filter_methods = $sortingFilterMethods;
        return $collection;
    }

    public static function getQuery($id, $query): Builder
    {
        if($id == 0){
            return $query;
        }else{
            $name = Post::whereIn('id', [$id])->value('name');
            return $query->whereIn('name', [$name]);
        }
    }
}
