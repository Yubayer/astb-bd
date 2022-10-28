@extends('layouts.backend.app')

@section('title', 'Settings')

@push('css')
@endpush

@section('admin-main-content')
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">
                Shop Settings
            </h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                        <form method="POST" action="{{ route('admin.settings.update-shop-name') }}">
                            @csrf
                            <label for="S">Shop Name</label>
                            <div class="input-group mb-3">
                                <input type="hidden" value="{{ $settings->id }}" name="id">
                                <input type="hidden" value="shop_name" name="key">
                                <input type="text" name="shop_name" value="{{ $settings->shop_name }}" class="form-control rounded-0" placeholder="Update Shop Name" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <button type="submit" class="btn btn-info rounded-0">update</button>
                            </div>
                        </form>
                        </div>
                    </div>

                    <div class="card my-3">
                        <div class="card-body">
                        <form method="POST" action="{{ route('admin.settings.update-shop-name') }}">
                            @csrf
                            <label for="S">Shop Email</label>
                            <div class="input-group mb-3">
                                <input type="hidden" value="{{ $settings->id }}" name="id">
                                <input type="hidden" value="email" name="key">
                                <input type="text" name="email" value="{{ $settings->email}}" class="form-control rounded-0" placeholder="Update Shop Email" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <button type="submit" class="btn btn-info rounded-0">update</button>
                            </div>
                        </form>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                        <form method="POST" action="{{ route('admin.settings.update-shop-name') }}">
                            @csrf
                            <label for="S">Shop Phone</label>
                            <div class="input-group mb-3">
                                <input type="hidden" value="{{ $settings->id }}" name="id">
                                <input type="hidden" value="phone" name="key">
                                <input type="tel" name="phone" value="{{ $settings->phone}}" class="form-control rounded-0" placeholder="Update Shop Phone" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <button type="submit" class="btn btn-info rounded-0">update</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6"></div>
            </div>
        </div>
    </div>
@endsection

@push('js')
  
@endpush