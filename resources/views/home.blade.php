@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1>{{ Auth::user()->name }}</h1></div>
                    <br>
                    @foreach($tasks as $task)
                        <div class="d-flex">
                            <div class="card-body">
                                <h3 class="px-lg-2">- {{$task->title}}</h3>
                                <p class="px-lg-5">{{$task->description}}</p>
                                <hr>
                            </div>
                            <div class="justify-content-center align-items-center">
                                <button class="btn btn-success px-lg-5">Edit</button>
                                <button class="btn btn-danger px-lg-5">Delete</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
