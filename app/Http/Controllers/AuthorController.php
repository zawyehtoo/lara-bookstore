<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\BookController;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors=Author::all();
        return ['authors'=>$authors];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::where('deleted',0)->get();
        return view('admin_dashboard.add_auth',['authors'=>$authors]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $authors=new Author();
        $authors->author_name=$request->input('author_name');
        $authors->save();
        return redirect('authors/create');
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
        $filter_books['filter_books']=Book::where('author_id',$id)->get();
        return view('bookstores.filtered_author',$filter_books,$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $author=Author::where('id',$id)->first();
        return view('admin_dashboard.edit_auth',['author'=>$author]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $author=Author::find($id);
        $author->author_name=$request->input('author_name');
        $author->save();
        return redirect('authors/create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Author::destroy($id);
        $authors=Author::find($id);
        $authors->deleted=1;
        $authors->save();
      
        return redirect('authors/create');
    }
}
