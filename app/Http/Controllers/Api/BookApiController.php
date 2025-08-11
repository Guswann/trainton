<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
class BookApiController extends Controller
{
    //function indexnya 
    public function index()
    {
        $buku = Book::all();

        return response()->json([
            'msg'=>true, 
            'data'=>$buku
        ]);
    }

    // Fungsi untuk menghapus data buku
    public function destroy($id)
    {
        $buku = Book::find($id);
        if (!$buku) {
            return response()->json([
                'msg' => false,
                'error' => 'Data tidak ditemukan'
            ], 404);
        }

        $buku->delete();

        return response()->json([
            'msg' => true,
            'message' => 'Data berhasil dihapus'
        ]);
    }
}
