<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    /**
     * Display the resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        try {
            return Category::get();
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

            return Category::create($request->only(['nome_categoria']));
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
            'nome_categoria' => 'required|max:150'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        try {
            return $category;
        } catch(\Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        try {
            if (!$this->validateParams($request)) {
                return response()->json(
                    ['message' => 'Paramêtros Inválidos.'], 422
                );
            }

            $category->update($request->only(['nome_categoria']));

            return $category;
        } catch(\Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            return $category->delete();
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
