<?php

namespace App\Http\Controllers\User;

use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authenticatedUser = auth()->user();
        $categories = $authenticatedUser->categories()->get();
        return Inertia::render('User/Category/Index',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $authenticatedUser = auth()->user();
        $authenticatedUser->categories()->create($request->validated());
        return redirect()->route('user.category.index')
        ->with('message', ['message' => 'Category added successfully', 'type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $authenticatedUser = auth()->user();
        $category = $authenticatedUser->categories()->find($id);
        $category->delete();

        return redirect()->back()
        ->with('message', ['message' => 'Category deleted successfully', 'type' => 'success']);

    }
}
