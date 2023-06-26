@extends('layouts.app')

@section('title', 'Edit Task')

@section('styles')
<style>
    .error-message {
        color: red;
        font-size: 0.8rem;
    }
</style>
@endsection

@section('content')
    <form method="PUT" action="{{ route ('tasks.store') }}">
    @csrf
    @method('PUT')
    <div>
        <label for="title">
            Title
        </label>
        <input text="text" name="title" id="title"/>
        @error('title')
            <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="description"> Description</label>
        <textarea name="description" id="description" rows="5"></textarea>
        @error('description')
            <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="long_Description">Long Description</label>
        <textarea name="long_Description" id="long_Description" rows="10"></textarea>
        @error('long_Description')
            <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <button type="submit">Add Task</button>
    </div>
    </form>
@endsection
