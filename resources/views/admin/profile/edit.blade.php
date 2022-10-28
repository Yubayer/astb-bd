@extends('layouts.backend.app')

@section('title', 'AdminBoard')

@push('css')
@endpush

@section('admin-main-content')
    <h1>{{ Auth::user()->name }}</h1>
@endsection

@push('js')
  
@endpush