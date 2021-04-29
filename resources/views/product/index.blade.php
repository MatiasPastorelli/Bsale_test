
<!-- vista que extiende del Header -->
@extends('layouts.presentacion.app')

@section('title', 'Bsale')

@section('meta')

@endsection

@section('css')
<style>
    #paginador{
        display: table;
        margin-right: auto;
        margin-left: auto;"
    }

    .slider-form {
    left: 15%;
    position: static;
    right: 15%;
    top: 35%;
}

</style>
@endsection

@section('content')


<div class="slider-form inner-page-form" style="margin-top: 90px">
    <div class="container">
       <h1 class="text-center mb-5">Busca tu producto</h1>
       <!--
            Formulario que busca los productos 
        -->   
       <form action="{{ asset('/')}}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="row no-gutters">
             <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                <div class="input-group">
                   <div class="input-group-addon"></div>
                   <input type="text" name="name" class="form-control" placeholder="Nombre producto">
                </div>
             </div>
             <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                <div class="input-group">
                   <div class="input-group-addon"></div>
                   <select class="form-control custom-select" name="category">
                    <option disabled="" value="" selected>Todas las Categorias</option>
                    <!--
                        Lista categorias <array[]> categorys
                    -->
                    @foreach ($categorys as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                    </select>
                </div>
             </div>

             <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                <div class="input-group"><button type="submit" class="btn btn-success btn-block no-radius font-weight-bold">Buscar</button>  </div>
             </div>
          </div>
       </form>
    </div>
</div>


<div class="container" style="margin-top: 60px">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="row">
                <!--
                    Lista de productos  <array[]> products
                -->   
                @foreach($products as $pro)
                    <div class="col-lg-3">
                        <div class="card" style="margin-bottom: 20px; height: auto;">
                            <img src="{{ $pro->url_image }}"
                                 class="card-img-top mx-auto"
                                 style="height: 140px; width: 150px;display: block;"
                                 alt="{{ $pro->url_image }}">
                            <div class="card-body">
                                <p><h6 class="card-title">{{ $pro->name }}</h6></p>
                                <p>${{ $pro->price }}</p>
                                <div class="card-footer" style="background-color: white;">
                                        <div class="row">
                                            <!-- Agrega productos al carro 
                                                @param {id} idProducto
                                            -->
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
<!--
Libreria para alertas!
-->
@toastr_js
@toastr_render
@endsection

@section('modals')

@endsection

@section('scripts')




@endsection
