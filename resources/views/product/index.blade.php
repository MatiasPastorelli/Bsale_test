@extends('layouts.presentacion.app')

@section('title', 'Bsale')

@section('meta')

@endsection

@section('css')
<link href="{{ asset('css/select2/css/select2-bootstrap.css') }}" />
<link href="{{ asset('css/select2/css/select2.min.css') }}" rel="stylesheet" />
<style>
    #paginador{
        display: table;
        margin-right: auto;
        margin-left: auto;"
    }

</style>
@endsection

@section('content')
<div class="container" style="margin-top: 60px">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <hr>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <form action="{{ asset('/')}}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Name<span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" >
                            </div>

                            <div class="form-group col-md-4">
                                <label>Categoria<span class="text-danger">*</span></label>
                                <select class="form-control custom-select" name="category">
                                    <option value="">Seleccionar</option>
                                    @foreach ($categorys as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <li class="list-inline-item">
                                <br>
                                <button type="submit" class="btn btn-success btn-sm" >buscar</button>
                            </li>

                        </div>

                    </form>
                </ol>
            </nav>
            <div class="row">
                @foreach($products as $pro)
                    <div class="col-lg-3">
                        <div class="card" style="margin-bottom: 20px; height: auto;">
                            <img src="{{ $pro->url_image }}"
                                 class="card-img-top mx-auto"
                                 style="height: 140px; width: 150px;display: block;"
                                 alt="{{ $pro->url_image }}">
                            <div class="card-body">
                                <a href=""><h6 class="card-title">{{ $pro->name }}</h6></a>
                                <p>${{ $pro->price }}</p>
                                <div class="card-footer" style="background-color: white;">
                                        <div class="row">
                                        <button class="btn btn-secondary btn-sm"  title="add to cart">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-check" viewBox="0 0 16 16">
                                                <path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                                                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                                </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>

@jquery
@toastr_js
@toastr_render
@endsection

@section('modals')

@endsection

@section('scripts')




@endsection
