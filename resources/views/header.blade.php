extends('articles')
@section('header')

<header>
    <nav class="navbar navbar-expand border navbar-light bg-light justify-content-center ">
        <a href="{{ route('articles.index')}}" class="col-md-4 navbar-brand">Liste des produits</a>
        <a href="{{ route('articles.create')}}" class="col-md-4 navbar-brand">Ajouter un produit</a>
    </nav>
</header>

@endsection