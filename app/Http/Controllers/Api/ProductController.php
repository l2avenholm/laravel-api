<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Method for getting list of products.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(['data' => Product::all()]);
    }

    /**
     * Method for creating a new product.
     *
     * @param ProductRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(ProductRequest $request)
    {
        $product = Product::create($request->all());

        return response()->json(['data' => $product]);
    }

    /**
     * Method for updating an existing product.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Request $request)
    {
        $product = $this->getProductByRequest($request);

        if ($title = $request->get('title')) {
            $product->title = $title;
        }

        if ($price = (float) $request->get('price')) {
            $product->price = $price;
        }

        $product->save();

        return response()->json(['data' => $product]);
    }

    /**
     * Method for removing entity by ID.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request)
    {
        $product = $this->getProductByRequest($request);

        $product->delete();

        return response()->json(['data' => $product]);
    }

    /**
     * Method for getting Product entity by ID extracted from the Request object.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    protected function getProductByRequest(Request $request)
    {
        if (!$id = $request->get('id')) {
            return response()->json([
                'error' => "Bad request: You must specify ID"
            ], 400)->throwResponse();
        }

        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'error' => "Not found: There is product with ID = " . $id,
            ], 404)->throwResponse();
        }

        return $product;
    }
}
