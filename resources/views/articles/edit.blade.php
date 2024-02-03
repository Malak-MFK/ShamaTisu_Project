@extends('articles')
@section('content')

<div class="container justify-content-center my-5">

    <form class="p-4" method="POST" action="{{route('articles.update', ['article' => $article->id])}}">
        @csrf
        @method('PUT')
        <div class="form-row row m-2">
            <div class="form-group col-md-4">
                <label >Libelle</label>
                <input type="text" name="Libelle" class="form-control" value="{{$article->libelle}}" required placeholder="Libelle...">
            </div>
            <div class="form-group col-md-4">
                <label >Marque</label>
                <input type="text" name="Marque" class="form-control"  value="{{$article->marque}}" required placeholder="Marque...">
            </div>
        </div>
        <div class="form-row row m-2">
            <div class="form-group col-md-4">
              <label >Prix</label>
              <input type="number" name="Prix" class="form-control" value="{{$article->prix}}" required placeholder="Prix...">
            </div>
            <div class="form-group col-md-4">
              <label >Quantité en stock</label>
              <input type="number" name="Stock" class="form-control"  value="{{$article->stock}}" required placeholder="Stock...">
            </div>
        </div>
        <div class="forw-row row m-2">
            <div class="mb-3">
                <label for="formFile" class="form-label">Default file input example</label>
                <input class="form-control" type="file" id="formFile" name="Image">
            </div>
        </div>
        <br>

            <div class="col-md-8 tjustify-content-center">
                <button type="submit" class="btn btn-primary col-md-4">Modifier</button>
            </div>

    </form>

</div>
@endsection
