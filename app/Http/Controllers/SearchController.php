<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;
use App\Models\PublishingHouse;

class SearchController extends Controller
{
    public function search_input(Request $request)
    {
        $authors=Author::all();
        $genres=Genre::all();
        $publishers=PublishingHouse::all();
        $search_input=$request->input('search_input');
        $books = Book::where('title', 'like', "%$search_input%")
        ->orWhereHas('author', function ($query) use ($search_input) {
            $query->where('author_name', 'like', "%$search_input%");
        })
        ->orWhereHas('genre', function ($query) use ($search_input) {
            $query->where('genre_name', 'like', "%$search_input%");
        })
        ->orWhereHas('publishingHouse', function ($query) use ($search_input) {
            $query->where('name', 'like', "%$search_input%");
        })
        ->get();
        
        return view('bookstores.index',['books'=>$books,'genres'=>$genres,'publishers'=>$publishers,'authors'=>$authors]);
    }
}
