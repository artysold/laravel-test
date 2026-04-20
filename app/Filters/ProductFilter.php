<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{
    protected function getCallbacks(): array
    {
        return [
            'q' => [$this, 'q'],
            'price_from' => [$this, 'priceFrom'],
            'price_to' => [$this, 'priceTo'],
            'category_id' => [$this, 'categoryId'],
            'rating_from' => [$this, 'ratingFrom'],
        ];
    }

    public function q(Builder $builder, string $value): void
    {
        $builder->whereFullText('name', $value);
    }

    public function priceFrom(Builder $builder, int $value): void
    {
        $builder->where('price', '>=', $value);
    }

    public function priceTo(Builder $builder, int $value): void
    {
        $builder->where('price', '<=', $value);
    }

    public function categoryId(Builder $builder, int $value): void
    {
        $builder->where('category_id', $value);
    }

    public function ratingFrom(Builder $builder, float $value): void
    {
        $builder->where('rating', '>=', $value);
    }
}
