<?php

namespace App\Http\Controllers;

use App\Handlers\CreateProductHandler;
use App\Handlers\ProductListHandler;
use App\Handlers\ShowProductHandler;
use App\Handlers\UpdateProductHandler;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use Illuminate\Http\JsonResponse;

/**
 * Class ProductController
 */
class ProductController extends Controller
{
    /**
     * @param \App\Handlers\ProductListHandler $handler
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function list(ProductListHandler $handler): JsonResponse
    {
        $list = $handler->handle();

        return $this->response('List products', new ProductResource($list));
    }

    /**
     * @param int                              $id
     * @param \App\Handlers\ShowProductHandler $handler
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id, ShowProductHandler $handler): JsonResponse
    {
        return $this->response('Show product', new ProductResource($handler->handle($id)));
    }

    /**
     * @param \App\Http\Requests\CreateProductRequest $request
     * @param \App\Handlers\CreateProductHandler      $handler
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(CreateProductRequest $request, CreateProductHandler $handler): JsonResponse
    {
        $products = $handler->handle($request->getDto());

        return $this->response('Create product', $products);
    }

    /**
     * @param int                                     $id
     * @param \App\Http\Requests\UpdateProductRequest $request
     * @param \App\Handlers\UpdateProductHandler      $handler
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(int $id,UpdateProductRequest $request, UpdateProductHandler $handler): JsonResponse
    {
        $products = $handler->handle($id, $request->getDto());

        return $this->response('Update product', $products);
    }

    public function delete(int $id, DeleteProductHandler $handler): JsonResponse
    {
        $products = $handler->handle($id);

        return $this->response('Delete product', $products);
    }
}
