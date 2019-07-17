@extends('layouts/admin')

@section('content')

<div class="row">
    <div class="col-sm-6">
            
                    
                        <h1 style="text-align:center;">Create a Category</h1>
                        {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}
                        
                            <div class="form-group">
                                {!! Form::label('category_name', 'Category Name:') !!}
                                {!! Form::text('category_name', null,['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
                            </div>
                      
                        {!! Form::close() !!}
                    
            
            @include('includes/form_err')
    </div>
    <div class="col-sm-6">
            <h1>Categories</h1>

            <table class="table" >
                    <thead>
                        <tr>
                        <th style="text-align:center;" scope="col">ID</th>
                        <th style="text-align:center;" scope="col">Category Name</th>
                        <th style="text-align:center;" scope="col">Created</th>
                        <th style="text-align:center;" scope="col">Updated</th>
                        </tr>
                    </thead>
                    <tbody style="text-align:center;">
                        
                        @if($categories)
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td><a href="{{route('admin-category-edit',$category->id)}}">{{$category->category_name}}</a></td>
                                    <td>{{$category->created_at->diffForHumans()}}</td>
                                    <td>{{$category->updated_at->diffForHumans()}}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
            </table>
    </div>
</div>


@endsection