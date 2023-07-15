<?php
    $translateCategory = config('global.translateCategory'); 
?>
<x-layout>

        <main>
            <section class="articles-section">
                <div class="wrapper">

                    <h2 class="tagname">#{{$tagname}}</h2>
                    
                        <div class="articles">
                            @foreach($articles as $article )
                                <div class="articles--card">
                                    <a href="/article/{{$article->slug}}"><img src="{{$article['image_link']}}" alt=""></a>
                                    <div class="body">
                                        <a href=""><span class="category">{{$translateCategory[$article->category]}}</span></a>
                                        <p class="title"><a href="">{{$article['title']}}</a></p>
                                        <p class="date">{{$article->date}}</p>
                                    </div>
                                </div>
                            @endforeach
                            
                        </div>
                        
                        <button class="moreBtn">المزيد</button>

                </div>
            </section>
        </main> 

    <script src="{{asset('js/paginationTag.js')}}"></script>
</x-layout>