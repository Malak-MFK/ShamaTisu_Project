<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <style>
        header {
            background-image: "{{asset('images/Header.png')}}";
        }
    </style>
</head>


<header>
    <nav class="navbar navbar-expand border justify-content-center" >
        <a href="{{ route('articles.index')}}" class="col-md-4 navbar-brand">Liste des produits</a>
        <a href="{{ route('articles.create')}}" class="col-md-4 navbar-brand">Ajouter un produit</a>
    </nav>
</header>

<body>
    @yield('content')
    <img src="{{asset('images/Header.png')}}" alt="">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
