<?php

namespace App\Http\Controllers\Api\V1_0_0;

use App\Actions\Api\V1_0_0\IndexProductAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1_0_0\IndexProductRequest;
use App\Http\Resources\Api\V1_0_0\ProductResource;

class ProductController extends Controller
{
    public function index(IndexProductRequest $request, IndexProductAction $action)
    {
        return ProductResource::collection($action->handle($request));
    }
}
