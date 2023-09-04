<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Book;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\BookController;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres=Genre::all();
        return ['genres'=>$genres];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres=Genre::where('deleted',0)->get();
        return view('admin_dashboard.add_genre',['genres'=>$genres]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $genres=new Genre();
        $genres->genre_name=$request->input('genre_name');
        $genres->save();
        return redirect('genres/create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $authorController=new AuthorController();
        $author_data=$authorController->index();

        $genreController=new GenreController();
        $genre_data=$genreController->index();

        $publisherController=new PublisherController();
        $publisher_data=$publisherController->index();
        
        $bookController=new BookController();
        $bookController=$bookController->index();

        $data = array_merge($author_data, $genre_data, $publisher_data,$bookController);   
        $filter_books['filter_books']=Book::where('genre_id',$id)->get();
        return view('bookstores.filtered_author',$filter_books,$data);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $genre=Genre::where('id',$id)->first();
        return view('admin_dashboard.edit_genre',['genre'=>$genre]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $genre=Genre::find($id);
        $genre->genre_name=$request->input('genre_name');
        $genre->save();
        return redirect('genres/create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $genres=Genre::find($id);
        $genres->deleted=1;
        $genres->save();

        return redirect('genres/create');
    }
}
