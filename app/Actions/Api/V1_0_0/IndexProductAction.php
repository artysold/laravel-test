<?php

namespace App\Actions\Api\V1_0_0;

use App\Filters\ProductFilter;
use App\Http\Requests\Api\V1_0_0\IndexProductRequest;
use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;

class IndexProductAction
{
    public function handle(IndexProductRequest $request): LengthAwarePaginator
    {
        return Product::query()
            ->with('category')
            ->filter([
                app()->make(ProductFilter::class, ['queryParams' => array_filter($request->validated())]),
            ])
            ->orderBy(...$this->orderBy($request))
            ->paginate();
    }

    private function orderBy(IndexProductRequest $request): array
    {
        return match ($request->input('sort')) {
            'price_asc' => ['price', 'asc'],
            'price_desc' => ['price', 'desc'],
            'rating_desc' => ['rating', 'desc'],
            'newest' => ['created_at', 'desc'],

            default => ['id', 'asc'],
        };
    }
}
