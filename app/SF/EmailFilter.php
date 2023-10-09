<?php

namespace App\SF;

use App\Models\Post;
use App\Models\SortingFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class EmailFilter extends SFAbstraction
{
    public static function getDropdownCollection($id): Collection
    {
        $collection = SortingFilter::whereIn('id', [$id])->select('id', 'name', 'query_name')->get();
        $sortingFilterMethods = Post::select('id','email')->get();
        $sortingFilterMethods = $sortingFilterMethods->map(function ($item) {
            $item['name'] = $item['email'];
            unset($item['email']);
            return $item;
        });
        $sortingFilterMethods = $sortingFilterMethods->toArray();
        array_unshift($sortingFilterMethods, ['id'=>'0', 'name'=>'All']);
        $collection[0]->sorting_filter_methods = $sortingFilterMethods;
        return $collection;
    }

    public static function getQuery($id, $query): Builder
    {
        if($id == 0){
            return $query;
        }else{
            $email = Post::whereIn('id', [$id])->value('email');
            return $query->whereIn('email', [$email]);
        }
    }
}
