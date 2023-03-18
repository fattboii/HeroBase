<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="../resources/css/app.css" rel="stylesheet" type="text/css"/>
    <link href="../resources/css/home.css" rel="stylesheet" type="text/css"/>
    <title>Home</title>
</head>
<body>
    <div class ="start">
    <h5>Upload A Hero To The DataBase</h5>
    <button><a href="{{ url('heros/create') }}">Upload Hero</a></button>
    </div>
    <table class = "table table-dark table-bordered border-light align-middle">
        <thead class = "table-light table-bordered border-dark">
            <tr>
                <th>#</th>
                <th>SuperHero Name</th>
                <th>Real Name</th>
                <th>Comments</th>
                <th>Photo</th>
                <th>Update</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $heroes as $hero )
            <tr>
                <td>{{ $hero -> id }}</td>
                <td>{{ $hero -> super_hero_name }}</td>
                <td>{{ $hero -> real_name }}</td>
                <td>{{ $hero -> comments }}</td>
                <td>
                    <img src="{{ asset('storage').'/'.$hero -> photo }}" alt="{{ $hero -> super_hero_name . ' Photo'}}" width = "100" height="100">
                </td>
                <td>
                    <button><a href="{{ url ('/heros/'.$hero->id.'/edit') }}">Edit</a></button>
                    <br>
                    <form action="{{ url ('/heros/'.$hero->id) }}" method ="post">
                    @csrf
                    {{ method_field('DELETE') }}
                        <input type="submit" onclick="return confirm('Do you want to DELETE this hero?')"
                        value = "Delete" class ="del_btn">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>