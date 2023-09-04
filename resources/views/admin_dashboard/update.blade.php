@include('bookstores.header')
</head>
<body>
    @include('admin_dashboard.admin_navbar')
    <div class="update-view " >
        <form action="{{url('books/'.$books->id)}}" method="post" style="padding-left:10px;" enctype="multipart/form-data">  
        @csrf
        @method('PUT')
                    <div class="d-flex align-items-center mb-4">
                        <label class="text-white col-sm-2">Book Cover</label>
                        <img class="col-sm-2 rounded" src="{{asset('storage/images/'.$books->image)}}" height="250" alt="">
                    </div>
                    <div class="row mb-4">
                        <label class="text-white col-sm-2" >Code No:</label>
                        <input type="text" class="col-sm-10 w-25 rounded border-0" value="{{$books->code_number}}" name="code_num" >
                    </div>
                    <div class="row mb-4">
                        <label class="text-white col-sm-2" for="author" >Title</label>
                        <input type="text"  class="col-sm-10 w-50 rounded border-0"  value="{{$books->title}}" name="title">
                    </div>
                    <div class="row mb-4">
                        <label class="text-white col-sm-2" >Author:</label>
                        <select  class="col-sm-10 w-25 rounded border-0"  name="select_author">
                            @foreach($authors as $author)
                                @php $selected_author=($author->id==$books->author_id)? "selected" : "" @endphp
                                
                                <option value="{{$author->id}}" {{$selected_author}}>{{$author->author_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row mb-4">
                        <label class="text-white col-sm-2" >Genre:</label>
                        <select  class="col-sm-10 w-25 rounded border-0" name="select_genre">
                            @foreach($genres as $genre)
                            @php $selected_genre=($genre->id==$books->genre_id)? "selected" : "" @endphp
                                <option value="{{$genre->id}}" {{$selected_genre}}>{{$genre->genre_name}}</option>
                            @endforeach
                        </select>
                    </div>   
                    <div class="row mb-4">
                        <label class="text-white col-sm-2" >Publisher:</label>
                        <select  class="col-sm-10 w-25 rounded border-0" name="select_publisher">
                            @foreach($publishers as $publisher)
                            @php $selected_publisher=($publisher->id==$books->publishing_house_id)? "selected" : "" @endphp
                                <option value="{{$publisher->id}}" {{$selected_publisher}}>{{$publisher->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row mb-4">
                        <label class="text-white col-sm-2"  >Description:</label>
                        <textarea class="col-sm-10 rounded border-0" rows="5"  name="description">{{$books->description}}</textarea>
                    </div>
                    <div class="row mb-4">
                        <label class="text-white col-sm-2" >Price:</label>
                        <input type="text" value="{{$books->price}}" name="price" class="col-sm-2 rounded border-0">
                    </div>
                    <div class="row mb-4">
                        <label class="text-white col-sm-2" >Book Cover:</label>
                        <input  type="file"  class="form-control w-50 rounded border-0"  name="image" >
                    </div>
                    <button class="btn btn-success">Edit</button>
            
        </form>
    </div>
                

@include('bookstores.footer')