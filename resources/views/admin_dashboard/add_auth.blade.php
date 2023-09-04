@include('bookstores.header')
</head>
<body>
    @include('admin_dashboard.admin_navbar')
    <div class="view mt-4">
        <form action="{{url('authors')}}"  method="post">
        @csrf 
        <div class="d-flex align-items-center row mx-2">
                      <label class="col-sm-2 text-dark" >Author Name-</label>
                      <input type="text" name="author_name"  class="rounded-pill  col-sm-3 w-25 form-control">
                      <button class="btn btn-success mx-1 col-sm-1 rounded-pill">create</button>
        </div>
       
            
        </form>
        <div class="auth-tbl-container ">   
            <table class="table table-striped table-hover " id="myTable">
                <thead class="table-dark">
                    <tr>
                        <td>ID</td>
                        <td>Authors</td>
                        <td >Actions</td>
                    </tr>

                </thead>
                <tbody>
                    @foreach($authors as $author)
                    <div class="modal fade" id="exampleModal{{$author->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Author</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="{{url('authors/'.$author->id)}}" method="post">
                                @csrf 
                                @method('PUT')
                                <div class="d-flex align-items-center">
                                        <label class="col-sm-4 text-dark" >Author Name-</label>
                                        <input type="text" name="author_name"  value="{{$author->author_name}}" class="rounded-pill  col-sm-3 w-25 form-control">
                                </div>
                                <button class="btn btn-success edit-btn">Edit</button>
                            </form>
                        </div>
                    </div>
                    <tr >
                        <td>{{$author->id}}</td>
                        <td style="width:700px">{{$author->author_name}}</td>
                        <td class="d-flex  ">
                       
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$author->id}}">Edit</button>

                        <form action="{{url('authors/'.$author->id)}}" method="post" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button> </td>
                        </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
  

@include('bookstores.footer')
