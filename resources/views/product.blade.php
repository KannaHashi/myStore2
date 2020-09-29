@extends('layouts.app')

@section('content')
<div class="row">
    <div class="container">
        <div class="row">
        @if($multi)
        @foreach($data as $datas)
            <div class="col-4 text-center p-3">
                <div class="card border-0 p-0 box">
                    <div class="card-body pb-0">
                        <a href="product/{{ $datas->product_slug }}" class="text-center">
                            <div class="text-left p-0 m-0" style="background: url({{ Storage::url('img/'.$datas->product_image) }}); height: 150px; background-size: contain; background-repeat: no-repeat; background-position: center">
                                <div class="badge badge-light shadow px-2">Id : {{ $datas->id }}</div>
                            </div>
                        </a>
                        <hr>
                        <div class="row justify-content-between pb-3">
                            <div class="col-9 text-left">
                                <div class="badge badge-light shadow px-2">Id : {{ $datas->id }}</div>
                                <h4 class="mt-2 font-weight-bold text-capitalize">{{ $datas->product_title }}</h4>
                                <p style='font-size: 14px' class="font-weight-light">Product Slug : {{ $datas->product_slug }}</p>
                                <p class="badge badge-info my-1 font-weight-light py-1 px-2">Created at : {{ $datas->created_at ? $datas->created_at : 'none' }}</p><br>
                                <p class="badge badge-info my-1 font-weight-light py-1 px-2">Updated at : {{ $datas->updated_at ? $datas->updated_at : 'none' }}</p>
                            </div>
                            <div class="col-2 mx-1">
                                <div class="text-center">
                                    <a href="{{ url('action/'.$datas->id) }}">
                                        <button class="btn btn-outline-info px-2 py-4 mb-2" style='font-size: 15px' onClick="">Edit</button>
                                    </a>
                                    <button class="btn btn-outline-danger px-2 py-4">Del</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @elseif(!$multi)
            <div class="col-5 text-center">
                <div class="card" style="background: url({{ Storage::url('img/'.$data->product_image) }}); max-width: 420px; height: 25em; background-size: cover, contain; background-repeat: no-repeat">
                </div>
            </div>
            <div class="col-7 py-3 pr-5">
                <div class="form-group row mb-3">
                    <label class="ml-2 col-2 text-capitalize col-form-label font-weight-light px-2 py-1" for="id">Id : {{ $data->id }}</label>
                </div>
                <div class="form-group mb-3">
                    <h3 class="text-capitalize">{{ $data->product_title }}</h3>
                </div>
                <div class="form-group mb-3">
                    <label class="ml-2" for="slug">Product Slug : <span class="font-weight-light">{{ $data->product_slug }}</span></label>
                </div>
                <div class="form-group mb-3">
                    <label class="ml-2 badge badge-info font-weight-light" for="slug">Created at : {{ $data->created_at ? $data->created_at : 'No create date data'}}</label>
                    <label class="ml-2 badge badge-info font-weight-light" for="slug">Updated at : {{ $data->updated_at }}</label>
                </div>
                <button class="btn btn-warning" onClick="back()">Back</button>
            </div>
        @endif
        </div>
    </div>
</div>
@endsection