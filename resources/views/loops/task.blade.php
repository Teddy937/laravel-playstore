@extends('layouts.app')

@section('content')
    <task-component save-url="{{ route('task.store') }}" fetch-url="{{ route('tasks.fetch') }}"></task-component>
@endsection
