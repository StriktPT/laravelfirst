@extends('layouts.app')

@section('content')

<div class="wrapper task-index">
    <h1>Task List</h1>
    @foreach($user->tasks as $task)
        <div class="task-item d-flex align-items-center">
            <div src="#" ><i class="fas fa-tasks"aria-hidden="true" title="task icon"></i></div>
            <h4><a >{{ $task->name }}</a></h4>
            <div class="buttons d-flex align-items-center ms-auto">
                <button onclick="mytoggler('#{{ $task->id }}')" class="btn btn-success buttonleft" aria-label="Edit"><i class="fas fa-pencil-alt" aria-hidden="true"></i></button>
                <div id="{{ $task->id }}" style="display : none" >
                    <form action="{{route('tasks.edit', $task->id ) }}" method="GET">
                        @csrf
                        <input class="editin" type="text" id="name" name="name" placeholder= "Editing: {{ $task -> name }}" autocomplete="off">
                        <button type="submit" class="btn btn-outline-success buttonleft" aria-label="Save"><i class="fas fa-save" aria-hidden="true"></i></button>
                    </form>
                </div>
                <form action="{{route('tasks.destroy', $task->id ) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger buttonright" aria-label="Delete" ><i class="fas fa-trash-alt" aria-hidden="true"></i></button>
                </form>
            </div>
        </div>
    @endforeach
    @unless(count($user->tasks) != 0)
    <h4><a >I bet you have something to do. </br> C'mon, don't be shy, add something! </a></h4>
    @endunless
    <form action="{{route('tasks.store')}}" method="POST">
        @csrf
        <input class="form-control mt-3" type="text" id="myname" name="name" placeholder="Type and hit enter to add a new task" autocomplete="off">
    </form>
</div>
<div class="d-flex justify-content-center">
    <p class="text-success fs-4 mt-1 msg">{!! session('mssg1') !!}</p>
    <p class="text-success fs-4 mt-1 msg">{!! session('mssg2') !!}</p>
    <p class="text-warning fs-4 mt-1 msg">{!! session('mssg3') !!}</p>
    <p class="text-danger fs-4 mt-1 msg">{!! session('mssg4') !!}</p>
</div>
@endsection