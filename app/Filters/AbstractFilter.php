<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

abstract class AbstractFilter
{
    protected array $queryParams;

    public function __construct(array $queryParams = [])
    {
        $this->queryParams = $queryParams;
    }

    abstract protected function getCallbacks(): array;

    public function apply(Builder $builder): Builder
    {
        foreach ($this->queryParams as $param => $value) {
            if (empty($value)) {
                continue;
            }

            $callbacks = $this->getCallbacks();

            if (isset($callbacks[$param])) {
                $callback = $callbacks[$param];
                call_user_func($callback, $builder, $value);
            }
        }

        return $builder;
    }
}
