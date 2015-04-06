@extends('app')

@section('categories')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Categories</div>
                    <div class="panel-body">
                        @include('errors.show_errors')
                        <h2>Categories</h2>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Category</th>
                                <th>Delete Category</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($categories as $index => $category)
                                <tr>
                                    <td>{!! ($index + 1) !!}</td>
                                    <td>
                                        {!! ucFirst($category->name) !!}
                                        {!! Form::open(['method' => 'DELETE', 'route' => 'admin.categories.destroy', $category->id]) !!}
                                        {!! Form::hidden('id', $category->id) !!}
                                    </td>
                                    <td>
                                        {!! Form::submit('Delete', ['class'=>'btn btn-default']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <h2>Create new Category</h2>
                        <hr>
                        {!! Form::open(['route'=>'admin.categories.store', 'class'=>'form-horizontal', 'role'=>'form']) !!}
                        <div class="form-group">
                            {!! Form::label('name', '', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('name', '', ['class'=>'form-control', 'value'=>'category']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@stop