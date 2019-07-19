@extends('layouts/blog-home')

@section('content')
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            

            <!-- Blog Posts -->
            @if(count($posts)>0)
                @foreach($posts as $post)
                    <h2>
                        <a href="{{route('admin.post',$post->id)}}">{{$post->title}}</a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php">{{$post->user->name}}</a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>
                    <hr>
                    <img class="img-responsive" src="http://placehold.it/800x160" alt="">
                    <hr>
                    <p>{!!str_limit($post->body,340)!!}</p>
                    <a class="btn btn-primary" href="{{route('admin.post',$post->id)}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                    <hr>
                @endforeach
            @else 
                <h1>There are no posts at the moment</h1>
            @endif
            <!-- Pagination -->
            {{-- <ul class="pager">
                <li class="previous">
                    <a href="#">&larr; Older</a>
                </li>
                <li class="next">
                    <a href="#">Newer &rarr;</a>
                </li>
            </ul> --}}
            <div class="row">
                <div class="col-sm-6 col-sm-offset-5">
        
                {{$posts->render()}}
        
        
                </div>
            </div>
        

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Blog Search Well -->
            <div class="well">
                <h4>Blog Search</h4>
                <div class="input-group">
                    <input type="text" class="form-control">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <span class="glyphicon glyphicon-search"></span>
                    </button>
                    </span>
                </div>
                <!-- /.input-group -->
            </div>

            <!-- Blog Categories Well -->
           
            @if(count($categories)>0)
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                @foreach ($categories as $category)
                                    <li><a href="#">{{$category->category_name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif 

            <!-- Side Widget Well -->
            <div class="well">
                <h4>Side Widget Well</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
            </div>

        </div>

    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; Your Website 2014</p>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </footer>

</div>
    
@endsection