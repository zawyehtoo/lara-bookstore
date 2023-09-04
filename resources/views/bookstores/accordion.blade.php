<div class="accordion" id="accordionExample ">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Authors
                    </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                            <ul class="list-unstyled filter">
                                @foreach ($authors as $author)
                                <li><a href="{{url('authors/'.$author->id)}}">{{$author->author_name}}</a></li>
                                @endforeach
                            </ul>
                    </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Genres
                    </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul class="list-unstyled filter">
                            @foreach($genres as $genre)
                                <li><a href="{{url('genres/'.$genre->id)}}" >{{$genre->genre_name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Publishers
                    </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul class="list-unstyled filter">
                            @foreach($publishers as $publisher)
                                <li><a href="{{url('publishers/'.$publisher->id)}}" >{{$publisher->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    </div>
                </div>
            </div>

