@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">

<div class="card">
    <div class="card-header" >{{ __('Завантажити зображення')}}

<form action="{{route('image.store')}}" method="POST" enctype="multipart/form-data" ><br>
    @csrf
    <input type="file"  name="images[]" multiple/>
    <button type="submit" class="btn-download">Завантажити </button>
</form>
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
</div>
@endsection
