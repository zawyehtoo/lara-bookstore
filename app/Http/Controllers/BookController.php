<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;
use App\Models\PublishingHouse;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PublisherController;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books=Book::all();
        return ['books'=>$books];
    }
    public function get_all(){
        $books=Book::all();
        return view('admin_dashboard.book_list',['books'=>$books]);
    }
    public function books_for_ui()
    {
        $authorController=new AuthorController();
        $authors=$authorController->index();

        $genreController=new GenreController();
        $genres=$genreController->index();
        
        $publisherController=new PublisherController();
        $publishers=$publisherController->index();
        
        $bookController=new BookController();
        $books=$bookController->index();

        $data=array_merge($authors,$genres,$publishers,$books);

        return view('bookstores.index',$data);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::where('deleted',0)->get();
        $genres = Genre::where('deleted',0)->get();
        $publishingHouses = PublishingHouse::where('deleted',0)->get();
        $books=Book::all();
        return view('admin_dashboard.add_book',['authors'=>$authors,  'genres' => $genres,
        'publishingHouses' => $publishingHouses,'books'=>$books]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $books=new Book();
        $books->code_number=$request->input('code_num');
        $books->title=$request->input('title');
        $books->price=$request->input('price');
        $books->description=$request->input('description');
        $books->author_id=$request->input('select_author');
        $books->genre_id=$request->input('select_genre');
        $books->publishing_house_id=$request->input('select_publisher');
        if($request->hasFile('image')){
            $destination_path='public/images';
            $image=$request->file('image');
            $image_name=$image->getClientOriginalName();
            $path=$request->file('image')->storeAs($destination_path,$image_name);
            $books->image=$image_name;
        }
        $books->save();
        return redirect()->route('booklist');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {                       
       
    }   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $authorController=new AuthorController();
        $author_data=$authorController->index();

        $genreController=new GenreController();
        $genre_data=$genreController->index();

        $publisherController=new PublisherController();
        $publisher_data=$publisherController->index();
        $data = array_merge($author_data, $genre_data, $publisher_data); 
        $data1['books']=Book::where('id',$id)->first();
        return view('admin_dashboard.update',$data1,$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $books=Book::find($id);
        $books->code_number=$request->input('code_num');
        $books->title=$request->input('title');
        $books->price=$request->input('price');
        $books->description=$request->input('description');
        $books->author_id=$request->input('select_author');
        $books->genre_id=$request->input('select_genre');
        $books->publishing_house_id=$request->input('select_publisher');
        if($request->hasFile('image')){
            $destination_path='public/images';
            $image=$request->file('image');
            $image_name=$image->getClientOriginalName();
            $path=$request->file('image')->storeAs($destination_path,$image_name);
            $books->image=$image_name;
        }
        $books->save();
        return redirect()->route('booklist');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Book::destroy($id);
        return redirect()->route('booklist');
    }
    public function details($id)
    {
        $book=Book::find($id);
        $relatedbooks=Book::where('author_id',$book->author->id)->where('id','<>', $id)->get();
        return view('bookstores.bookdetail',['book'=>$book,'related'=>$relatedbooks]);
    }
  
}
