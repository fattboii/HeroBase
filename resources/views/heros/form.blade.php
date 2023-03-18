<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="../resources/css/form.css" rel="stylesheet" type="text/css"/>
    <title>Create</title>
</head>
<body>
    <form action="{{ url('/heros') }}" method="post" enctype="multipart/form-data">
        <!-- security key -->
        @csrf
        <!-- user inputs -->
        <div style="
        display: grid;
        place-items: center;
    ">
            <div class="form">
            <label for="super_hero_name">SuperHero Name</label> <br>
            <input type="text" name="super_hero_name" value = "{{ isset($hero->super_hero_name)?$hero->super_hero_name:'' }}" id="super_hero_name"> <br><br>
            <label for="real_name">Real Name</label> <br>
            <input type="text" name="real_name" value = "{{ isset($hero->real_name)?$hero->real_name:'' }}" id="real_name"> <br><br>
            <label for="comments">Comments</label> <br>
            <input type="text" name="comments" value = "{{ isset($hero->comments)?$hero->comments:'' }}" id="comments"> <br><br>

            <!-- buttons -->
            <label for="photo">Picture</label><br>
            @if(isset($hero->photo))
            <img src="{{ asset('storage').'/'.$hero -> photo }}" alt="{{ $hero -> super_hero_name . ' Photo'}}" width = "100" height="100">
            @endif
            <br>
            <input type="file" name="photo" id="photo"><br><br> 
            <input type="submit" value="Save" class="send_btn" 
            style="
            border-color: black;
            width: 120px;
            height: 50px; ">
            </div>
        </div>
    </form>
</body>
</html>