@extends('layouts.app')

@section('content')
    <h1>Edit</h1>
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('success') }}
        </div>
    @endif
    <form action="{{ route('contacts.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <input
                type="text"
                name="name"
                id="name"
                class="form-control"
                value="{{ old('name', $data->name) }}"
            >

            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label>Contact:</label>
            <input 
                type="text" 
                name="contact" 
                class="form-control" 
                value="{{ old('contact', $data->contact) }}"
            >
            @error('contact')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label>Email: </label>
            <input 
                type="text" 
                name="email"
                class="form-control"  
                value="{{ old('email', $data->email) }}"
            >
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
@endsection