@include('bookstores.header')
</head>
<body>
    @include('admin_dashboard.admin_navbar')
    <div class="edit-auth-view">
        <form action="{{url('publishers/'.$publisher->id)}}" method="post">
        @csrf 
        @method('PUT')
        <div class="d-flex align-items-center">
                <label class="col-sm-3 text-white" >Publisher Name-</label>
                <input type="text" name="publisher_name"  value="{{$publisher->name}}" class="rounded-pill  col-sm-3 w-25 form-control">
                
        </div>
      
        <div>
            <button class="btn btn-success edit-btn">Edit</button>
        </div>
       
        </form>
    </div>
@include('bookstores.footer')