@include('bookstores.header')
</head>
<body>
    @include('admin_dashboard.admin_navbar')
    <div class="view">
        <table class="table table-striped table-hover" id="myTable">
        <thead class="table-dark "  >
            <tr >
                <td>Title</td>
                <td>Price</td>
                <td>Author</td>
                <td>Genre</td>
                <td>Publishing house</td>
                <td>Actions</td>
            </tr>  

        </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
                <td>{{$book->title}}</td>
                <td>{{$book->price}}</td>
                <td>{{$book->author->author_name}}</td>
                <td>{{$book->genre->genre_name}}</td>
                <td>{{$book->publishingHouse->name}}</td>
                <td class="d-flex col">
                    <form action="{{url('books/'.$book->id.'/edit')}}" method="get">
                        @csrf
                        <button class="btn btn-primary ">Update</button>
                    </form>
                   
                    <form action="{{url('books/'.$book->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button> 
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
      
    </div>
@include('bookstores.footer')