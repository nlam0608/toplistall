<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Toplistall</title>
    <link rel="stylesheet" href="fronend/fronend.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid px-0 bg-white">
    {{-- header --}}
    @include('fronend/layouts/header')

    {{-- banner --}}
    @include('fronend/layouts/banner')
    
    {{-- content --}}
        <div class="container">
            {{-- information for you --}}
            @include('fronend/contents/home/information')

            {{-- slide --}}
            @include('fronend/layouts/slide')

            {{-- keyword and category --}}
            @include('fronend/contents/home/keywordAndCategory')

            {{-- all keyword new--}}
            @include('fronend/contents/home/keyword')

            {{-- infor cty --}}
            @include('fronend/contents/home/cty')

            {{-- Popular Categories --}}
            @include('fronend/contents/home/category')

            {{-- Explore More Handy Tips --}}
            @include('fronend/contents/home/blog')
        </div>

    {{-- foodter --}}
    @include('fronend/layouts/foodter')
</div>
    

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>