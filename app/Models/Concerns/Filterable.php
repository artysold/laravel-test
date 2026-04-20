<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Builder;

trait Filterable
{
    public function scopeFilter(Builder $builder, array $filters): Builder
    {
        foreach ($filters as $filter) {
            $filter->apply($builder);
        }

        return $builder;
    }
}
