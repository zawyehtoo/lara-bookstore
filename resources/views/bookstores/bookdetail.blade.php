@extends('layouts.app')
@section('content')
@include('bookstores.header')
@include('bookstores.navbar')

<div class="container bg-light ">
<h3  class="mb-3">Book Details</h3>
    <div class="d-flex">
        <div class="col-md-6 " >
            <img src="{{asset('storage/images/'.$book->image)}}" style="padding-left:100px" width="500" height="550" alt="book cover">
        </div>
        <div class="col-md-6 p-5">
            <h1>{{$book->title}}</h1>
            <p>Author- {{$book->author->author_name}}</p>
            <p>Genre- {{$book->genre->genre_name}}</p>
            <p>Publisher- {{$book->publishingHouse->name}}</p>
            <h4 >Price- {{$book->price}}  MMK</h4>
            <p style="border-bottom:1px solid black;width:100px;">Description </p>
            <p>{{$book->description}}</p>
        </div>
    </div>
  
</div>
<div class="related-book container mt-4">
    <h3 class="mx-5">Related Books</h3>
    <div class="col-md-9">
           <div class="row row-cols-1 row-cols-md-3 g-4 mx-2">
               @foreach($related as $book)
                <div class="col">
                   <div class="card h-100 "  >
                        <img src="{{asset('storage/images/'.$book->image)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title" style="  max-width: 270px;white-space: nowrap; overflow: hidden;text-overflow: ellipsis;">{{$book->title}}</h5>
                            <p >Genre- <span>{{$book->genre->genre_name}}</span></p>
                            <p >Author- <span >{{$book->author->author_name}}</span></p>
                            <p>Publisher- <span>{{$book->publishingHouse->name}}</span></p>
                            <a href="{{url('bookdetail/'.$book->id)}}" class="btn btn-primary">Details</a>
                        </div>
                   </div>
               </div>
               @endforeach
           </div>
       </div>
</div>
@include('bookstores.footer')
@stop