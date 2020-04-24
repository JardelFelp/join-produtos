<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ProductController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            return Product::with('tbCategoriaProduto')->get();
        } catch(\Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            if (!$this->validateParams($request)) {
                return response()->json(
                    ['message' => 'Paramêtros Inválidos.'], 422
                );
            }

            return Product::create(
                array_merge(
                    $request->only([
                        'nome_produto', 
                        'valor_produto', 
                        'id_categoria_produto'
                    ]),
                    ['data_cadastro' => Carbon::now()]
                )
            );
        } catch(\Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    /**
     * Validate params from request
     * 
     * @param \Illuminate\Http\Request  $request
     * @return boolean
     */
    private function validateParams(Request $request) 
    {
        return $request->validate([
            'nome_produto' => 'required|max:150',
            'id_categoria_produto' => 'required',
            'valor_produto' => 'required'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        try {
            return Product::with('tbCategoriaProduto')
                ->find($product)
                ->first();
        } catch(\Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        try {
            if (!$this->validateParams($request)) {
                return response()->json(
                    ['message' => 'Paramêtros Inválidos.'], 422
                );
            }

            $product->update(
                $request->only([
                    'nome_produto', 
                    'valor_produto', 
                    'id_categoria_produto'
                ]),
            );

            return $product;
        } catch(\Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            return $product->delete();
        } catch(\Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    /**
     * Create a exception responde
     * 
     * @param string $message
     * @param integer $code
     * @return \Illuminate\Http\Response
     */
    private function errorResponse($message, $code)
    {
        return response()->json([
            'error' => $message
        ], $code);
    }
}
