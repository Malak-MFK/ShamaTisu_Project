@extends('produits')

@section('content')
<div class="container m-auto my-5 justify-content-center">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col"><u></u></th>
                    <th scope="col"><u>Libelle</u></th>
                    <th scope="col"><u>Marque</u></th>
                    <th scope="col"><u>Prix</u></th>
                    <th scope="col"><u>Détails</u></th>
                    <th scope="col"><u>Modifer</u></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produits as $produit)
                <tr>

                    <td><img width="120px" src="{{asset('images/' . $produit['Image'])}}"></td>
                    <th scope="row">{{$produit->libelle}}</th>
                    <td>{{$produit->marque}}</td>
                    <td>{{$produit->prix}},- Dhs</td>
                    <td><a href="{{ route('produits.show', ['produit' => $produit->id]) }}" class="btn btn-primary">Détails</a></td>
                    <td><a href="{{ route('produits.edit', ['produit' => $produit->id]) }}" class="btn btn-success">Modifer</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
</div>
@endsection
