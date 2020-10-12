@extends('layouts/app')


@section('content')
@if($edit)
@section('title', 'AdminLTE3 | Edit Data')
<div class="row">
    <div class="container bahnschrift">
        <div class="row mb-2">
        <div class="col float-left">
            <h2 class="text-info mx-5">Edit Data</h2>
        </div>
        <div class="col float-right">
            <button class="btn btn-warning" onClick="back()">Back</button>
        </div>
        </div>
        <div class="row">
            <div class="col-5 text-center">
                <img src="{{ Storage::url('img/'.$data->product_image) }}" style='max-width: 420px; height: 25em; object-fit: cover' alt="">
            </div>
            <div class="col-7 py-3 pr-5">
                <form action="../update" method="post"  enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label class="ml-2 col-2 text-capitalize col-form-label font-weight-light px-2 py-1" for="id">Product Id : </label>
                        <input type="text" id="id" name="id" class="col-8 border-0" value="{{ $data->id }}" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label class="ml-2 text-capitalize" for="title">Product Name</label>
                        <input type="text" name="title" id="title" value="{{ $data->product_title }}" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label class="ml-2" for="slug">Product Slug</label>
                        <input type="text" name="slug" id="slug" value="{{ $data->product_slug }}" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label class="ml-2 badge badge-info font-weight-light" for="slug">Created at : {{ $data->created_at ? $data->created_at : 'No create date data'}}</label>
                        <label class="ml-2 badge badge-info font-weight-light" for="slug">Updated at : {{ $data->updated_at }}</label>
                    </div>
                    <div class="form-group mb-2">
                        <label for="img" class="btn btn-outline-dark">Input Image</label>
                        <input type="file" name="img" id="img" hidden>
                    </div>
                    <input type="submit" value="Update" class="btn btn-info">
                </form>
            </div>
        </div>
    </div>
</div>
@elseif(!$edit)
@section('title', 'AdminLTE3 | Add Data')
<div class="row">
    <div class="container bahnschrift">
        <h2 class="text-info mx-5">Add Data</h2>
        <div class="row">
            <div class="col-5 text-center border-right border-dark mr-3">
                <img src="" style='max-width: 420px; height: 25em; object-fit: cover' alt="">
            </div>
            <div class="col-6 py-3 pr-5">
                <form action="../addproduct" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="ml-2 text-capitalize" for="title">Product Title</label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label class="ml-2" for="slug">Product Slug</label>
                        <input type="text" name="slug" id="slug" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label class="ml-2" for="price">Product Price</label>
                        <input type="number" name="price" id="price" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label for="img" class="btn btn-outline-dark">Input Image</label>
                        <input type="file" name="img" id="img" hidden>
                    </div>
                    <input type="submit" value="Add" class="btn btn-info">
                </form>
                <button class="btn btn-warning" onClick="back()">Back</button>
            </div>
        </div>
    </div>
</div>
@endif
@endsection