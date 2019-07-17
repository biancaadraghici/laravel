@extends('layouts/admin')

@section('content')

    <div class="container">
            <div class="jumbotron">
                <div class="jumbotron"><h1 style="text-align:center;">Edit this Category</h1></div>

                    {!! Form::open(['method'=>'PATCH', 'action'=>['AdminCategoriesController@update',$category->id]]) !!}

                    <div class="container">

                        <div class="form-group">
                            {!! Form::label('category_name', 'Category Name:') !!}
                            {!! Form::text('category_name', old('category_name',$category->category_name),['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Edit Category', ['class'=>'btn btn-primary']) !!}
                        </div>
                
                    {!! Form::close() !!}

                    {!! Form::open(['method'=> 'DELETE', 'action'=>['AdminCategoriesController@destroy', $category->id]]) !!}

                        <div class="form-group">
                            {!! Form::submit('Delete Category', ['class'=>'btn btn-warning'])!!}
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
    </div>
    @include('includes/form_err')

@endsection