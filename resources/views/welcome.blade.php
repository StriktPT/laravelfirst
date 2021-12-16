@extends('layouts.app')

@section('content')
    <div class="content txtcolor">
        <div class="title m-b-md ">
            Welcome to the taskmanager!
        </div>
        @guest
            <div class="fs-3"> 
            Please, <a href="{{ route('login') }}" class="text-decoration-none">login</a> 
            or <a href="{{ route('register') }}" class="text-decoration-none">register</a>.
        </div>
        @else
            <div class="text-muted"> Hi <b>{{ Auth::user()->name }}</b>, want to check on <a href="{{route('tasks.index') }}"class="text-muted"> your tasks</a> again?</div>
        @endguest
    </div>
@endsection