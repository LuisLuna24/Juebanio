<?php

use App\Models\Category;
use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/category', function (Request $request) {
    $query = Category::select('id', 'name')
        ->when($request->input('search'), function ($query, $search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%'.$search.'%');
            });
        })
        ->when(
            $request->filled('selected'),
            fn ($query) => $query->whereIn('id', $request->input('selected', [])),
            fn ($query) => $query->limit(10)
        )
        ->orderBy('name');

    return response()->json($query->get());
})->name('api.category.index');

Route::get('/seasons', function (Request $request) {
    $query = Season::select('id', 'name')
        ->when($request->input('search'), function ($query, $search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%'.$search.'%');
            });
        })
        ->when(
            $request->filled('selected'),
            fn ($query) => $query->whereIn('id', $request->input('selected', [])),
            fn ($query) => $query->limit(10)
        )
        ->orderBy('name');

    return response()->json($query->get());
})->name('api.season.index');