<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = self::getProducts();

        return view('pages.product.index', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        try {

            DB::beginTransaction();

            Product::create($request->validated());

            DB::commit();

            return response()->json([
                'message' => 'Product created successfully.',
                'products' => self::getProducts()
            ], 201);

        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'message' => 'Failed to create product.',
                'error' => $e->getMessage()
            ], 500);

        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($productId)
    {
        try {

            $product = Product::findOrFail(Crypt::decrypt($productId));

            return response()->json([
                'product' => $product
            ], 200);

        } catch (\Exception $e) {

            return response()->json([
                'message' => 'Failed to retrieve product.',
                'error' => $e->getMessage()
            ], 500);

        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, $productId)
    {
        try {

            DB::beginTransaction();

            $product = Product::findOrFail(Crypt::decrypt($productId));

            $product->update($request->validated());

            DB::commit();

            return response()->json([
                'message' => 'Product updated successfully.',
                'products' => self::getProducts()
            ], 200);

        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'message' => 'Failed to update product.',
                'error' => $e->getMessage()
            ], 500);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($productId)
    {
        try {

            DB::beginTransaction();

            $product = Product::findOrFail(Crypt::decrypt($productId));

            $product->delete();

            DB::commit();

            return response()->json([
                'message' => 'Product deleted successfully.',
                'products' => self::getProducts()
            ], 200);

        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'message' => 'Failed to delete product.',
                'error' => $e->getMessage()
            ], 500);

        }
    }

    public static function getProducts()
    {
        $product = Product::orderBy('id', 'desc')
            ->paginate(10)
            ->through(function ($product) {

                $product->encrypted_id = Crypt::encrypt($product->id);
                $product->created_at_formatted = $product->created_at->format('Y-m-d H:i:s');
 
                $product->id = null;

                return $product;

            });
            return $product;
    }
}