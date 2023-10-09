<?php

namespace App\SF;

use App\Models\SortingFilter;
use App\Models\SortingFilterMethod;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class DateSorting extends SFAbstraction
{
    public static function getDropdownCollection($id): Collection
    {
        return SortingFilter::whereIn('id', [$id])->select('id', 'name', 'query_name')->with('sortingFilterMethods')->get();
    }

    public static function getQuery($id, $query): Builder
    {
        $src = SortingFilterMethod::whereIn('id', [$id])->value('src');
        return self::$src($query);
    }

    private static function newerFirstMethod($query): Builder
    {
        info('newerfirst');
        return $query->orderBy('updated_at', 'DESC');
    }

    private static function olderFirstMethod($query): Builder
    {
        info('olderfirst');
        return $query->orderBy('updated_at', 'ASC');
    }
}
