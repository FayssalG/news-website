
<?php
    
    $translateCategory = [
        'societe'=>'مجتمع',
        'politique'=>'سياسة',
        'economie'=>'اقتصاد',
        'sport'=>'رياضة',
        'culture'=>'ثقافة',
        'international'=>'دولية',
        'faits-divers'=>'حوادث'
    ];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrftoken" content="{{ csrf_token() }}">
    <title>Document</title>

    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <script defer type="module" src="{{asset('js/script.js')}}" ></script>
    
    <script src="https://kit.fontawesome.com/c1b8c56909.js" crossorigin="anonymous"></script>

</head>
<body>
    <x-header />
    {{$slot}}
</body>
</html>