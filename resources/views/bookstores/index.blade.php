@extends('layouts.app')
@section('content')
@include('bookstores.header')
</head>
<body>
    @include('bookstores.navbar')
    @include('bookstores.slider')
    <div class="container-xxl mt-3" >
    
    <div class="row ">
       <div class="col-md-3 ">
       @include('bookstores.accordion')
           
       </div>
      
       <div class="col-md-9">
           <div class="row row-cols-1 row-cols-md-3 g-4 mx-2">
               @foreach($books as $book)
                <div class="col">
                   <div class="card h-100">
                   <img src="{{asset('/storage/images/'.$book->image)}}" height="420" class="card-img-top" alt="...">
                   <div class="card-body">
                       <h4 class="card-title" style="  max-width: 270px;white-space: nowrap; overflow: hidden;text-overflow: ellipsis;">{{$book->title}}</h4>
                       <p >Genre- <span >{{$book->genre->genre_name}}</span></p>
                       <p >Author- <span>{{$book->author->author_name}}</span></p>
                       <p>Publisher- <span>{{$book->publishingHouse->name}}</span></p>
                    
                       <a href="{{url('bookdetail/'.$book->id)}}" class="btn btn-primary">Details</a>
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
