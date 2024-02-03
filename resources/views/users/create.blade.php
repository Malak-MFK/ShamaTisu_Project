@extends('produits')

@section('content')
@php
    $state = session('state')
@endphp

<div class="container justify-content-center my-5">
    @if ($state)
        <div class="alert alert-danger">
            Réessayer ultérieurement
        </div>
    @endif

    <form class="p-4" method="POST" action="{{route('produits.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-row row m-2">
            <div class="form-group col-md-4">
                <label >Libelle</label>
                <input type="text" name="Libelle" class="form-control" required placeholder="Libelle...">
            </div>
            <div class="form-group col-md-4">
                <label >Marque</label>
                <input type="text" name="Marque" class="form-control"  required placeholder="Marque...">
            </div>
        </div>
        <div class="form-row row m-2">
            <div class="form-group col-md-4">
              <label >Prix</label>
              <input type="number" name="Prix" class="form-control" required placeholder="Prix...">
            </div>
            <div class="form-group col-md-4">
              <label >Quantité en stock</label>
              <input type="number" name="Stock" class="form-control"  required placeholder="Stock...">
            </div>
        </div>
        <br>
        <div class="mb-3">
            <label for="formFile" class="form-label">Default file input example</label>
            <input class="form-control" type="file" id="formFile" name="Image">
        </div>

            <div class="col-md-8 tjustify-content-center">
                <button type="submit" class="btn btn-primary col-md-4">Ajouter Produit</button>
            </div>

    </form>

</div>
@endsection
