@extends('admin.layouts.layout')
@section('admin_page_title')
Manage Subcategory - Admin Panel
@endsection
@section('admin_layout')
<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">All Subcategory</h5>
    </div>

    @if (session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
    
    @endif
    
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Subcategory Name</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subcategories as $subcat)
                    <tr>
                        <td>{{$subcat->id}}</td>
                        <td>{{$subcat->subcategory_name}}</td>
                        {{-- <td>{{$subcat->category->category_name}}</td> --}}
                        <td>{{$subcat->category->category_name}}</td>
                        <td>
                            <a href="{{route('show.subcat', $subcat->id)}}" class="btn btn-info">Edit</a>
                            <form action="{{route('delete.subcat', $subcat->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="btn btn-danger">Delete</button>
                            </form>
                            {{-- <a href="{{route('delete.cat', $cat->id)}}"class="btn btn-danger">Delete</a> --}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection