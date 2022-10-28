@extends('layouts.backend.app')

@section('title', 'AdminBoard')

@push('css')
@endpush

@section('admin-main-content')
<div class="card w-75">
    <div class="card-header text-muted">
        <h3>Create New Collection</h3>
    </div>
    <div class="card-body">
    <form class="" action="{{ route('admin.collection.create-new') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="colUser" class="form-label">Credentials</label>
            <input type="text" readonly name="user_name" class="form-control" id="colUser" value="{{  Auth::user()->name }}">
            <input type="hidden" readonly name="user_id" class="form-control" id="colUser" value="{{  Auth::user()->id }}">
        </div>

        <div class="mb-3">
            <label for="collectionName" class="form-label">Enter Collection Name</label>
            <input type="text" name="name" class="form-control" value="{{old('name')}}" id="collectionName" placeholder="Collection Name">
        </div>

        @error('name')
            <div class="alert alert-danger">Error: {{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="collectionImage" class="form-label">Select Image</label><br>
            <input type="file" name="image" class="" id="collectionImage">
        </div>

        <br>

        <div class="">
            <button type="submit" class="btn btn-primary">Create New</button>
        </div>
        </form>
    </div>
</div>
@endsection

@push('js')
  
@endpush