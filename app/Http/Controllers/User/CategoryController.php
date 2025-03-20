<?php

namespace App\Http\Controllers\User;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authenticatedUser = Auth::user();
        $categories = $authenticatedUser->categories()->get();
        return Inertia::render('User/Category/Index',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $authenticatedUser = Auth::user();
        $authenticatedUser->categories()->create($request->validated());
        return redirect()->route('user.category.index')
        ->with('message', ['message' => 'Category added successfully', 'type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $authenticatedUser = Auth::user();
        $category = $authenticatedUser->categories()->find($id);
        $category->delete();

        return redirect()->back()
        ->with('message', ['message' => 'Category deleted successfully', 'type' => 'success']);

    }
}
