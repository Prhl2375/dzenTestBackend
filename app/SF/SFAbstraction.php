<?php

namespace App\SF;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

abstract class SFAbstraction
{
    abstract static public function getDropdownCollection($id): Collection;
//    abstract public function getProcessedData(): Collection;
    abstract static public function getQuery($id, $query): Builder;
}
