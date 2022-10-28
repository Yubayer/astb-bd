@extends('layouts.backend.app')

@section('title', 'AdminBoard')

@push('css')
@endpush

@section('admin-main-content')
    @if(Auth::user()->avatar == 'profile.jpg' || Auth::user()->avatar == '')
    <img class="img-profile"
        src="{{asset('assets/img/undraw_profile.svg')}}"
        style="width: 300px; heigh: 350px; object-fit: cover; object-position: center;">
    @else
    <img src="/images/profile/{{ Auth::user()->avatar }}" 
        class="img-profile"
        style="width: 300px; heigh: 350px; object-fit: cover; object-position: center;">
    @endif
    <br>
    @include('component/modals/updateAdminProfileModal')
    <button class="btn " data-toggle="modal" data-target="#AdminAvatarUpdateModal">Update Avatar</button>
    <hr>
    <h1>Name: {{ Auth::user()->name }}</h1>
    <h1>Email: {{ Auth::user()->email }}</h1>
    <h1>Role: {{ Auth::user()->role->name }}</h1>
@endsection

@push('js')
  
@endpush