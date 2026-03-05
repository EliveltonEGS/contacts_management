@extends('layouts.app')

@section('content')
    <h1>Show</h1>
    {{-- <div class="mb-3">
        <label>#: {{ $data->id }} </label>
    </div> --}}
    <div class="mb-3">
        <label>Name: {{ $data->name }}</label>
    </div>
    <div class="mb-3">
        <label>Contact: {{ $data->name }}</label>
    </div>
    <div class="mb-3">
        <label>Email: Contact: {{ $data->name }}</label>
    </div>
    <div class="mb-3 d-flex gap-2">
        <a 
        href="{{ route('contacts.edit', $data->id) }}"
        class="btn btn-warning"
        > Edit</a>
        <form action="{{ route('contacts.destroy', $data->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">Delete</button>
        </form>
    </div>
@endsection