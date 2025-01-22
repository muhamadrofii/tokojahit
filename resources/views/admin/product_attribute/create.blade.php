@extends('admin.layouts.layout')
@section('admin_page_title')
Create Default Attribute - Admin Panel
@endsection
@section('admin_layout')
<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">Create Default Attribute Page</h5>
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-warning alert-dismissible fade show">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
        @endif

        @if (session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            
        @endif

        <form action="{{route('attribute.create')}}" method="POST">
            @csrf
            <label for="attribute_value" class="fw-bold mb-2">Give Name of Your Attribute</label>
            <input type="text" class="form-control" name="attribute_value" placeholder="Large">
            
            <button type="submit" class="btn btn-primary w-100 mt-2">Add Attribute</button>
        </form>
    </div>
</div>
    {{-- <h3>Create Category Page</h3> --}}
@endsection