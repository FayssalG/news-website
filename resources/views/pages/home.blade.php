<?php 
    use Carbon\Carbon; 
    Carbon::setlocale(config('app.locale'));
    
    $translateCategory = config('global.translateCategory'); 
?>
<x-layout >
<main>
        <div>
            <section class="hero">
                <div class="wrapper">
                    <div class="hero__main ">
                        <div class="carousel__track">
                            <button class="arrow right-arrow">
                                <i class="fa-solid fa-angle-right"></i>
                            </button>
                            <button class="arrow left-arrow">
                                <i class="fa-solid fa-angle-left"></i>
                            </button>
        
                            <ul class="dots">
                                @for($i=0 ; $i<5 ; $i++) 

                                    <li data-slide-to="{{$i}}" @class(['dot-active'=> $i==0]) ></li>

                                @endfor
                            </ul>
                            <ul class="carousel__list">
                                
                                @for($i=0 ; $i<5 ; $i++)
                                   
                                    <li class="carousel__item" id="slide_{{$i}}">
                                        <a href="/article/{{$articles[$i]->slug}}">
                                            <h1>{{$articles[$i]['title']}}</h1>                            
                                            <img src="{{$articles[$i]['image_link']}}" alt="">
                                        </a>
                                    </li>
                                @endfor
        
                            </ul>
                        </div>
                      
                    </div>
        
                </div>
            </section>
           
            <section class="featured">
                <h2 class="section-title">الأكثر قراءة</h2>
                <div class="wrapper">
                    @foreach($featured as $feat)
                    <div class="card">
                        <div class="card-image">
                            <a href="/article/{{$feat->slug}}">
                                <img src="{{$feat['image_link']}}" alt="{{$feat->title}}">
                            </a>
                        </div>
                        <div class="card-body">
                            <span class="date">{{$feat->date}}</span>
                            <h2 class="title">
                                {{$feat->title}}
                            </h2>
                        </div>     
                    </div>
                   @endforeach
               
                </div>
            </section>
        

            
            <section class="articles-section">
                <h2 class="section-title">مقالات</h2>
                
                <div class="wrapper">
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
            
        </div>


        <aside>
            <div class="wrapper">
                <div class="aside__latest">
                    <h2 >أخر الأخبار</h2>
                    @foreach($latest as $lat)  
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
    
    <script src="{{asset('js/paginationHome.js')}}"></script>
</x-layout>