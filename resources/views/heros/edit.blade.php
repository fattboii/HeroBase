<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../resources/css/app.css" rel="stylesheet" type="text/css"/>
    <title>edit</title>
</head>
<body style="
        display: grid;
        place-items: center;
    ">
    <h2>Edit This SuperHero</h2>
    <form action="{{ url('/heros/' .$hero->id ) }}" method="post" enctype="multipart/form-data"
    style="margin-left: 130px;">
        @csrf
        {{ method_field('PATCH')}}
        @include('heros.form')
    </form>
    <!-- returns to the home page -->
    <div style="
        display: grid;
        place-items: center;
    ">
    <button class ="return_btn"
    style="
    margin-top: 10px;
    width: 120px;
    height: 50px;
    "
    ><a href="{{ url('heros') }}" 
    style="
    text-decoration: none;
    color: black;
    ">Return</a></button>
    </div>
</body>
</html>