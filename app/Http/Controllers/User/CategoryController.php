<?php

namespace App\Http\Controllers\User;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $authenticatedUser = Auth::user();
        $authenticatedUser->categories()->create($request->all());
        return redirect()->route('user.category.index')
        ->with('message', ['message' => 'Category added successfully', 'type' => 'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
