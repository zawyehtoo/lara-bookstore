@include('bookstores.header')
</head>
<body>
    @include('admin_dashboard.admin_navbar')
    <div class="update-view" >
        <form action="{{url('books')}}" method="post" enctype="multipart/form-data">  
            @csrf 
            <div class="row mb-3">
                <label  class="col-sm-2 text-white">Code No:</label>
                <input type="text"  class="col-sm-10  w-25 form-control rounded border-0" name="code_num">
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 text-white" >Title</label>
              <input class="col-sm-10 w-25 form-control rounded border-0" type="text" name="title">
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 text-white" >Author:</label><br>
                <select class="col-sm-10  w-25 rounded border-0"   name="select_author" >   
                    @foreach($authors as $author)
                   <option value="{{$author->id}}">{{$author->author_name}}</option>
                   @endforeach
                </select>
            </div>
           <div class="row mb-3">
                <label class="col-sm-2 text-white" >Genre:</label><br>
                <select class="col-sm-10  w-25 rounded border-0"   name="select_genre"  >
                @foreach($genres as $genre)
                   <option value="{{$genre->id}}">{{$genre->genre_name}}</option>
                   @endforeach
                </select>
           </div>
            <div class="row mb-3">
                <label class="col-sm-2 text-white" >Publisher:</label><br>
                <select class="col-sm-10  w-25 rounded border-0"  name="select_publisher" >
                @foreach($publishingHouses as $publishingHouse)
                   <option value="{{$publishingHouse->id}}">{{$publishingHouse->name}}</option>
                   @endforeach
                </select>
            </div>
            <div class="row mb-3">
                    <label   class="col-sm-2 text-white">Description:</label>
                    <textarea class="col-sm-10  rounded border-0" rows="5" name="description"></textarea>
                </div>
      
            <div class="row mb-3">
                      <label class="col-sm-2 text-white" >Price</label>
                      <input type="text" name="price"  class="col-sm-3 w-25 form-control rounded border-0">
            </div>
            <div class="row mb-3">
                    <label  class="col-sm-2 text-white">Book Cover:</label>
                    <input  type="file" class=" col-sm-10 text-white" name="image">
            </div>
            <button class="btn btn-success">Create</button>
            
        </form>
    </div>
@include('bookstores.footer')