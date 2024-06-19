<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discussion;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show($categorySlug)
    {
        $category = Category::where('slug', $categorySlug)->first();

        if (!$category) {
            return abort(404);
        }

        $discussions = Discussion::with(['user', 'category'])
            ->where('category_id', $category->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString();

        return response()->view('pages.discussions.index', [
            'discussions' => $discussions,
            'categories' => Category::all(),
            'withCategory' => $category,
        ]);
    }
}
