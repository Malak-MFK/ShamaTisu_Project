@extends('articles')

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
                @foreach ($articles as $article)
                <tr>

                    <td><img width="120px" src="{{asset('images/' . $article['Image'])}}"></td>
                    <th scope="row">{{$article->libelle}}</th>
                    <td>{{$article->marque}}</td>
                    <td>{{$article->prix}},- Dhs</td>
                    <td><a href="{{ route('articles.show', ['article' => $article->id]) }}" class="btn btn-primary">Détails</a></td>
                    <td><a href="{{ route('articles.edit', ['article' => $article->id]) }}" class="btn btn-success">Modifer</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
</div>
@endsection
