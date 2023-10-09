<?php

namespace App\SF;

use App\Models\SortingFilter;
use http\QueryString;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;

class SF
{
public static function getDropdownsArray(): array{
    $data = new Collection();
    $sortingFilters = SortingFilter::all()->toArray();
    foreach ($sortingFilters as $sortingFilter){
        $class = $sortingFilter['src'];
        $data = $data->merge($class::getDropdownCollection($sortingFilter['id']));
    }
    return $data->toArray();
}

public static function getSortingFilterQueryBuilder($query, $data): \Illuminate\Database\Eloquent\Builder{
    foreach (array_keys($data) as $sortingMethod){
        $query = SortingFilter::whereIn('query_name', [$sortingMethod])->value('src')::getQuery($data[$sortingMethod], $query);
    }
    return $query;
}
}
