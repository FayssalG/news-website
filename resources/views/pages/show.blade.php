<?php 
    use Carbon\Carbon; 
    Carbon::setlocale(config('app.locale'));

    $translateCategory = config('global.translateCategory'); 

?>
<x-layout>
<main>
        <!-- Main content -->
        <div>
            <section class="top-section">
                <div class="wrapper">
    
                    <div class="article">
                        <div class="title">
                            <span class="tag">{{$translateCategory[$article->category]}}</span>
                            <h1>{{$article->title}}</h1>
                        </div>
                        <div class="image">
                            <img src="{{$article['image_link']}}" alt="" />
                        </div>
                        <div class="body">  

                            <span class="date">{{$article->date}}</span>
                            <div class="content">
                                {!! $article->content !!}
                            </div>
                        
                            <div class="tags">
                                @foreach($tags as $tag)
                                    <a href="/tag/{{$tag->tagname}}"><span class="tag">#{{$tag->tagname}}</span></a>
                                @endforeach
                            </div>
                        
                            <!--- <p class="source"><span>المصدر </span>{{$article->source}}</p> -->
                        </div>

                       
                    </div>
                </div>
            </section>
            
            <section class="related-section">
                <div class="wrapper">
                    <h2>ذاة صلة</h2>

                    @foreach($related as $rel)
                        <div class="related--card">
                     
                            <a href="/article/{{$rel->slug}}"><img src="{{$rel['image_link']}}" alt=""></a>                            
                            <div class="body">
                                <span class="category">{{$translateCategory[$rel->category]}}</span>
                                <p class="title"><a href="/article/{{$rel->slug}}">{{$rel->title}}</a></p>
                                <span class="date">{{$rel->date}}</span>
                            </div>    
                        </div>
                    
                    @endforeach
                </div>
            </section>
           
        </div>


        <!-- Aside -->
        <aside>
            <div class="wrapper">
                <div class="latest">
                    <h2>أخر الأخبار</h2>

                    @foreach($latest as $lat )
                        <div class="news">
                        @php
                            $timeAgo = Carbon::parse($lat->getRawOriginal('date'))->ago();
                        @endphp

                        <p><a href="/article/{{$lat->slug}}">{{$lat->title}}</a></p>
                            <span>{{$timeAgo}}</span>
                        </div>
                    @endforeach
           
                </div>
    
            </div>
        </aside>

    </main>

</x-layout>