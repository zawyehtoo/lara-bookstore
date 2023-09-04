<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PublishingHouse;
use App\Models\Book;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publishers=PublishingHouse::all();
        return ['publishers'=>$publishers];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $publishers=PublishingHouse::where('deleted',0)->get();
        return view('admin_dashboard.add_publisher',['publishers'=>$publishers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $publishers=new PublishingHouse();
        $publishers->name=$request->input('publisher_name');
        $publishers->save();
        return redirect('publishers/create');
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
        $filter_books['filter_books']=Book::where('publishing_house_id',$id)->get();
        return view('bookstores.filtered_author',$filter_books,$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $publisher=PublishingHouse::where('id',$id)->first();
        return view('admin_dashboard.edit_publisher',['publisher'=>$publisher]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $publisher=PublishingHouse::find($id);
        $publisher->name=$request->input('publisher_name');
        $publisher->save();
        return redirect('publishers/create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $publishers=PublishingHouse::find($id);
        $publishers->deleted=1;
        $publishers->save();
        return redirect('publishers/create');
    }
}
