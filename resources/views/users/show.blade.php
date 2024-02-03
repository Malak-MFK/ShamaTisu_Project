@extends('produits')
@section('content')
@php
    $state = session('state')
@endphp


<center>
    @if ($state)
        <div class="alert alert-success">
            Produit crée avec succés
        </div>
    @endif

    <div class="card col-md-5 m-4">
        <img src="{{asset('images/' . $produit->image)}}" class="card-img-top" alt="...">
    <div class="card-body">
      <h4 class="card-title">{{$produit->libelle}}</h4>
      <h5>({{$produit->marque}})</h5>
      <br>
      <h6 class="card-title">{{$produit->prix}},- Dhs</h6>
      <p>{{$produit->stock}} en stock</p>
      <div class="">
        <form action="{{ route('produits.destroy', ['produit' => $produit->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <a href="{{ route('produits.edit', ['produit' => $produit->id]) }}" class=" col-md-4 mx-4 btn btn-success">Modifer</a>
            <input type="button" class=" col-md-4 mx-4 btn btn-danger" value="Supprimer" onclick=confirmDelete() />
        </form>
        </div>
        <div class="my-4 card-footer">
            <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
        </div>
    </div>
</div>
</center>

<script>
    const confirmDelete = () => {
        if (confirm('Voulez-vous vraiement supprimer ce produit ?')) {
            document.querySelector('form').submit();
        }
    }
</script>

@endsection