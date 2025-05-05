<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PublicController extends Controller
{
    public function homepage(){ 
        
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(4)->get(); 
        return view('welcome', compact('articles'));
    }
    
    public function searchArticles(Request $request){
        $categoriesIt = [
            'Elettronica',
            'Abbigliamento',
            'Salute e Bellezza',
            'Casa e Giardinaggio',
            'Giocattoli',
            'Sport',
            'Animali Domestici',
            'Libri e Riviste',
            'Accessori',
            'Motori',            
        ];
        
        $categoriesEn = [
            'Electronics',
            'Clothing',
            'Health and Beauty',
            'Home and Garden',
            'Toys',
            'Sports',
            'Pets',
            'Books and Magazines',
            'Accessories',
            'Motors'
        ];
        
        $categoriesPt = [
            'Eletrônicos',
            'Roupas',
            'Saúde e Beleza',
            'Casa e Jardim',
            'Brinquedos',
            'Esportes',
            'Animais de Estimação',
            'Livros e Revistas',
            'Acessórios',
            'Motores'
        ];
        
        $query = $request->input('query');
        if($query != null){
            $category = ucfirst($query);

            $index = 0;
            if(in_array($category, $categoriesIt)){
                $index = array_search($category, $categoriesIt);                
                $category = $categoriesIt[$index];
            } elseif (in_array($category, $categoriesEn)){
                $index = array_search($category, $categoriesEn);                
                $category = $categoriesIt[$index];
            } elseif (in_array($category, $categoriesPt)){        
                $index = array_search($category, $categoriesPt);
                $category = $categoriesIt[$index];
            }           
        }
        if ($category != $query) {
            $articles = Article::search($category)->where('is_accepted', true)->paginate(4);            
        } else {
            $articles = Article::search($query)->where('is_accepted', true)->paginate(4);
        }
        return view('article.searched', ['articles' => $articles, 'query' => $query]);
    }
    
    public function setLanguage($lang){
        
        session()->put('locale', $lang);
        App::setLocale($lang);

        return redirect()->back();
    }
}
