@extends('layouts.backend.app')

@section('title', 'AdminBoard')

@push('css')
    <!-- Custom styles for this page -->
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@inject('carbon', 'Carbon\Carbon')

@section('admin-main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Product Title</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Compare Price</th>
                            <th>Create At</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($products as $key => $product)
                            <tr>
                                <td>{{ $product->title }}</td>
                                <td>
                                    @if(count($product->images) > 0)
                                        <img src="/images/product/{{ $product->images[0]->url }}" width="50px">
                                    @endif
                                </td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->compare_price }}</td>
                                <td>{{ $carbon::parse($product->created_at)->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('admin.product.delete', ['id' => $product->id]) }}" title="Delete" class="btn btn-sm btn-danger rounded-0">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <a href="{{ route('admin.product.edit', ['handle' => $product->handle]) }}" title="Edit" class="btn btn-sm btn-info rounded-0">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('product.index', ['handle' => $product->handle]) }}" title="Show" class="btn btn-sm btn-primary rounded-0">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <!-- Page level plugins -->
    <script src="{{asset('assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('assets/js/demo/datatables-demo.js')}}"></script>
@endpush