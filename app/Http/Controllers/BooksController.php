<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use Validator;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'data' => Books::all(),
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'judul' => ['required', 'min:4', 'max:100'],
            'harga' => ['required', 'numeric', 'min:1000',],
            'category_id' => ['required', 'numeric'],
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validasi gagal.',
                'errors' => $validator->errors()
            ], 401);
        }

        $validate = $validator->validated();
        try {
            $data = Books::create($validate);
            return response()->json([
                'message' => 'buku berhasil dibuat. ',
                'data' => $data
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'buku gagal dibuat. ',
                'error' => $e->getMessage()
            ], 401);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(books $books)
    {

        return response()->json([
            'data' => $books,
        ], 200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, books $books)
    {
        $rules = [
            'judul' => ['min:4', 'max:100'],
            'harga' => ['numeric', 'min:1000',],
            'category_id' => ['numeric'],
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validasi gagal.',
                'errors' => $validator->errors()
            ], 401);
        }

        $validate = $validator->validated();
        try {
            $data = $books->update($validate);
            return response()->json([
                'message' => 'buku berhasil diupdate. ',
                'data' => $data
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'buku gagal diupdate. ',
                'error' => $e->getMessage()
            ], 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(books $books)
    {
        try {
            $books->delete();
            return response()->json([
                'message' => 'buku berhasil dihapus. ',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'buku gagal dihapus. ',
                'error' => $e->getMessage()
            ], 401);
        }

    }
    public function search(Request $request)
{
    // dd('hello');
    $request->validate([
        'judul' => 'nullable|string',
        'kategori' => 'nullable|string',
    ]);

    $query = Books::with('kategori');

    if ($request->has('judul')) {
        $query->where('judul', 'like', '%' . $request->judul . '%');
    }

    if ($request->has('kategori')) {
        $query->whereHas('kategori', function ($q) use ($request) {
            $q->where('category_name', 'like', '%' . $request->kategori . '%');
        });
    }

    $books = $query->get();

    return response()->json($books, 200);
}

}
