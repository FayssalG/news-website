<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //

    function index(){
        return view('pages.home' , [
        'articles'=>Article::latest('date')->inRandomOrder()->Limit(10)->get() , 
        'latest'=>Article::latest('date')->Limit(4)->get(),
        'featured'=>Article::latest('date')->orderBy('view_count' , 'desc')->limit(9)->get()
        ]);
         
    }

    function indexCategory($category){
        return view('pages.category' , 
        [   'category'=>$category , 
            'articles'=>Article::latest('date')
            ->where('category' , '=' , $category)
            ->limit(9)
            ->get()
        ]);
    }

    function indexTag($tagname){
        $tag = Tag::where('tagname' , '=' , $tagname)->first();
        $articles = ArticleTag::join('articles' , 'article_tag.article_id' , '=' , 'articles.id')
        ->join('tags' , 'article_tag.tag_id' , '=' , 'tags.id')
        ->distinct('articles.*')
        ->where('tagname' , $tagname)
        ->paginate(10);
        return view('pages.tag' , ['articles'=>$articles , 'tagname'=>$tagname]);
    }



    function loadMore(){
        $articles = Article::latest('date')->paginate(10);
        return response()->json($articles);

    }
    function loadMoreCategory($category){
        $articles = Article::latest('date')->where('category' , '=' , $category)->paginate(9);
        return response()->json($articles);
    }
    function loadMoreTag($tagname){
        $tag = Tag::where('tagname' , '=' , $tagname);
        $articles = ArticleTag::join('articles' , 'article_tag.article_id' , '=' , 'articles.id')
        ->join('tags' , 'article_tag.tag_id' , '=' , 'tags.id')
        ->where('tagname' , $tagname)
        ->distinct('articles.*')
        ->paginate(10);

        return response()->json($articles);
    }

    function show($slug){
       
        $article = Article::where('slug' , '=' , $slug)->first();
        $tags = $article->tags;
        $related = Article::latest('date')
        ->inRandomOrder()
        ->where('category' , '=' , $article->category)
        ->where('slug' , '<>' , $slug)
        ->Limit(10)->get();
        
        $article->increment('view_count');
        return view('pages.show' , ['tags'=>$tags, 'related'=>$related , 'article'=>$article , 'latest'=>Article::latest('date')->Limit(4)->get()]);
    }

    
}
