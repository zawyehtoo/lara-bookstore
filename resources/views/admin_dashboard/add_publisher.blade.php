@include('bookstores.header')
</head>
<body>
    @include('admin_dashboard.admin_navbar')
    <div class="view mt-4" >
   <form action="{{url('publishers')}}"  method="post">
        @csrf 
        <div class="d-flex align-items-center row mx-2">
                      <label class="col-sm-2 text-dark" >Publisher Name-</label>
                      <input type="text" name="publisher_name"  class="rounded-pill  col-sm-3 w-25 form-control">
                      <button class="btn btn-success mx-1 col-sm-1 rounded-pill">create</button>
            </div>
        </form>
        <div class="auth-tbl-container ">   
            <table class="table table-striped table-hover "  id="myTable">
                <thead class="table-dark">
                    <tr>
                        <td>ID</td>
                        <td>Publishers</td>
                        <td >Actions</td>
                    </tr>

                </thead>
                <tbody>
                    @foreach($publishers as $publisher)
                    <div class="modal fade" id="exampleModal{{$publisher->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Publisher</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="{{url('publishers/'.$publisher->id)}}" method="post">
                                @csrf 
                                @method('PUT')
                                <div class="d-flex align-items-center">
                                        <label class="col-sm-4 text-dark" >Publisher Name-</label>
                                        <input type="text" name="publisher_name"  value="{{$publisher->name}}" class="rounded-pill  col-sm-4 w-50 form-control">
                                </div>
                                <button class="btn btn-success edit-btn">Edit</button>
                            </form>
                            
                        </div>
                    </div>
                    <tr >
                        <td>{{$publisher->id}}</td>
                        <td style="width:700px">{{$publisher->name}}</td>
                        <td class="d-flex  ">

                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$publisher->id}}">Edit</button>
                    
                        <form action="{{url('publishers/'.$publisher->id)}}" method="post" >
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

