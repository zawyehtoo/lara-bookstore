@extends('layouts.app')
@section('content')
@include('bookstores.header')

@include('bookstores.navbar')
@include('bookstores.slider')
<div class="container-xxl mt-3">
         <!-- accordion -->
         <div class="row ">
            <div class="col-md-3 ">
               @include('bookstores.accordion') 
            </div>
             <!-- card -->
            <div class="col-md-9">
                <div class="row row-cols-1 row-cols-md-3 g-4 mx-2">
                    @foreach($filter_books as $filter_book)
                    <div class="col">
                        <div class="card h-100">
                        <img src="{{asset('storage/images/'.$filter_book->image)}}" height="420" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$filter_book->title}}</h5>
                            <p class="card-text">Price- <span>{{$filter_book->price}}</span></p>
                            <p >Genre- <span>{{$filter_book->genre->genre_name}}</span></p>
                            <p >Author- <span>{{$filter_book->author->author_name}}</span></p>
                            <p>Publisher- <span>{{$filter_book->publishingHouse->name}}</span></p>
                            <a href="{{url('bookdetail/'.$filter_book->id)}}" class="btn btn-primary">Details</a>
                        </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
        </div>
    </div>

@include('bookstores.footer')
@stop