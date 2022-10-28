@extends('layouts.backend.app')

@section('title', 'AdminBoard')

@push('css')
@endpush

@section('admin-main-content')
<form class="" action="{{ route('admin.product.update') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" value="{{ $product->id }}" name="id">
    <div class="card w-100 p-3">
        <div class="card-header text-muted">
            <h3>Udpate Product</h3>
        </div>
        <div class="card-body">

        <div class="card mb-3">
            <div class="card-body">
                <div class="mb-3">
                    <label for="colUser" class="form-label">Credentials</label>
                    <input type="text" readonly name="user_role" class="form-control" id="colUser" value="{{  $product->user->role->name }}">
                    <input type="hidden" readonly name="user_id" class="form-control" id="colUser" value="{{  Auth::id() }}">
                </div>

                <div class="form-row">
                    <div class="col">
                    <input readonly type="text" value="{{ $product->user->name }}" class="form-control">
                    </div>
                    <div class="col">
                    <input readonly type="text" value="{{ $product->user->email }}" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="collectionName" class="form-label">Enter Product Title</label>
                        <input type="text" name="title" class="form-control" id="collectionName" value="{{ $product->title }}" placeholder="Product Title">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Product Description</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" placeholder="Product Description..." rows="3">{{ $product->description }}</textarea>
                    </div>
                </div>
            </div> 

            <div class="card my-3">
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputState">Select Collection</label>
                        <select id="inputState" class="form-control" name="collection_id">
                            @foreach($collections as $key => $collection)
                                <option @if($product->collection_id == $collection->id) selected @endif value="{{ $collection->id }}">{{ $collection->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="card my-3">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" name="price" class="form-control" id="price" value="{{ $product->price }}" placeholder="Price">
                        </div>
                        <div class="col">
                            <label for="comparePrice" class="form-label">Compare Price</label>
                            <input type="number" name="compare_price" class="form-control" value="{{ $product->compare_price }}" id="comparePrice" placeholder="Compare Price">
                        </div>
                        <div class="col">
                            <label for="buyPrice" class="form-label">Buy Price</label>
                            <input type="number" name="buy_price" class="form-control" id="buyPrice" value="{{ $product->buy_price }}" placeholder="Buy Price">
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
                <button type="submit" class="btn btn-primary">Update product</button>
            </div>
            
        </div>
    </div>
</form>
@endsection

@push('js')
  
@endpush