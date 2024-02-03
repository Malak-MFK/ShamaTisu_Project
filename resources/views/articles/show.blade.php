@extends('articles')
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
        <img src="{{asset('images/' . $article->image)}}" class="card-img-top" alt="...">
    <div class="card-body">
      <h4 class="card-title">{{$article->libelle}}</h4>
      <h5>({{$article->marque}})</h5>
      <br>
      <h6 class="card-title">{{$article->prix}},- Dhs</h6>
      <p>{{$article->stock}} en stock</p>
      <div class="">
        <form action="{{ route('articles.destroy', ['article' => $article->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <a href="{{ route('articles.edit', ['article' => $article->id]) }}" class=" col-md-4 mx-4 btn btn-success">Modifer</a>
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
        if (confirm('Voulez-vous vraiement supprimer cet article ?')) {
            document.querySelector('form').submit();
        }
    }
</script>

@endsection