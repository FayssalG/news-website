<?php
    use Carbon\Carbon;
    Carbon::setlocale(config('app.locale'));

    $translateCategory = config('global.translateCategory'); 
?>
<x-layout>
<main class="category__main">
        <div class="wrapper">
            <h1>{{$translateCategory[$category]}}</h1>
            <div class="category--articles">
                @foreach($articles as $article)
                    <div class="card">
                        <div class="card-image">
                            <a href="/article/{{$article->slug}}">
                                <img src="{{$article['image_link']}}" alt="{{$article->title}}">
                            </a>
                        </div>
                        <div class="card-body">
                            <span class="date">{{$article->date}}</span>
                            <h2 class="title">{{$article->title}}</h2>
                        </div>
                    
                    </div>
                @endforeach        

            </div>
            <button class="moreBtn">المزيد</button>        
            
            
        </div>
        <aside></aside>
        
    </main>

    <script src="{{asset('js/paginationCategory.js')}}"></script>
</x-layout>