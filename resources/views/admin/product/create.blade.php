@extends('layouts.backend.app')

@section('title', 'AdminBoard')

@push('css')
@endpush

@section('admin-main-content')
<form class="" action="{{ route('admin.product.create-new') }}" method="post" enctype="multipart/form-data">
@csrf
    <div class="card w-100 p-3">
        <div class="card-header text-muted">
            <h3>Create New Product</h3>
        </div>
        <div class="card-body">

        <div class="card mb-3">
            <div class="card-body">
                <div class="mb-3">
                    <label for="colUser" class="form-label">Credentials</label>
                    <input type="text" readonly name="user_role" class="form-control" id="colUser" value="{{  Auth::user()->role->name }}">
                    <input type="hidden" readonly name="user_id" class="form-control" id="colUser" value="{{  Auth::user()->id }}">
                </div>

                <div class="form-row">
                    <div class="col">
                    <input readonly type="text" value="{{ Auth::user()->name }}" class="form-control">
                    </div>
                    <div class="col">
                    <input readonly type="text" value="{{ Auth::user()->email }}" class="form-control">
                    </div>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="card my-3 border-danger">
                <div class="card-header text-danger">
                    <h4>Error Occoured, Please Resolve This Errors</h2>
                </div>
                <div class="card-body">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
        
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="collectionName" class="form-label">Enter Product Title</label>
                        <input type="text" name="title" class="form-control" value="{{old('title')}}" id="collectionName" placeholder="Product Title">
                    </div>

                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Product Description</label>
                        <textarea class="form-control" name="description"  id="exampleFormControlTextarea1" placeholder="Product Description..." rows="3">{{old('description')}}</textarea>
                    </div>

                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
            </div> 

            <div class="card my-3">
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputState">Select Collection</label>
                        <select id="inputState" class="form-control" name="collection_id">
                            @foreach($collections as $key => $collection)
                                <option value="{{ $collection->id }}">{{ $collection->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('collection_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="card my-3">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="price" class="form-label">Enter Product Title</label>
                            <input type="number" name="price" class="form-control" id="price" placeholder="Price">
                            @error('price')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="comparePrice" class="form-label">Enter Product Title</label>
                            <input type="number" name="compare_price" class="form-control" id="comparePrice" placeholder="Compare Price">
                        </div>
                        <div class="col">
                            <label for="buyPrice" class="form-label">Enter Product Title</label>
                            <input type="number" name="buy_price" class="form-control" id="buyPrice" placeholder="Buy Price">
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="collectionImage" class="form-label">Select Image</label><br>
                <input type="file" name="images[]" class="" id="collectionImage">
            </div>

            <div class="mb-3">
                <label for="collectionImage" class="form-label">Select Image</label><br>
                <input type="file" name="images[]" class="" id="collectionImage">
            </div>

            <div class="mb-3">
                <label for="collectionImage" class="form-label">Select Image</label><br>
                <input type="file" name="images[]" class="" id="collectionImage">
            </div>

            <br>

            <div class="">
                <button type="submit" class="btn btn-dark rounded-0">Create New Product</button>
            </div>
            
        </div>
    </div>
</form>
@endsection

@push('js')
  
@endpush