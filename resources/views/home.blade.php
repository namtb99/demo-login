@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status')}}
                    </div>
                    @endif
                    {{ __('You are logged in!') }}<br>
                    <h1>Account List</h1>
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Name</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <!-- <td>{{ $user->name }}</td> -->
                                <td>{{ $user->email }}</td>
                                <td>
                                    {!! Form::open(['route' => ['home/update'], 'method' => 'put', 'class' => 'form-inline']) !!}
                                    {!! Form::hidden('id', $user->id) !!}
                                    {!! Form::text('name', $user->name,['class' => 'mr-1']) !!}
                                    {!! Form::submit('Update', ['class' => 'btn btn-warning btn-xs']) !!}
                                    {!! Form::close() !!}
                                </td>
                                <td>
                                    {!! Form::open(['route' => ['home/delete'], 'method' => 'delete', 'class' => 'form-inline']) !!}
                                    {!! Form::hidden('id', $user->id) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        <tbody>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
