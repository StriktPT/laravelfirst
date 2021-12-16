@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success text-white">{{ __('You have successfully logged in') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div> Hello <b>{{ Auth::user()->name }}</b>, please <a href="{{route('tasks.index') }}">click</a> to view your task list.</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
