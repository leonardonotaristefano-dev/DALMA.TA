<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function homepage(){ 
        
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(8)->get(); 
        return view('welcome', compact('articles'));
    }

    public function searchArticles(Request $request){
        $categoriesIt = [
            'Abbigliamento',
            'Accessori',
            'Animali Domestici',
            'Casa e Giardinaggio',
            'Elettronica',
            'Salute e Bellezza',
            'Sport',
            'Giocattoli',
            'Motori',
            'Libri e Riviste'
        ];

        $categoriesEn = [
            'Clothing',
            'Accessories',
            'Pets',
            'Home and Garden',
            'Electronics',
            'Health and Beauty',
            'Sports',
            'Toys',
            'Motors',
            'Books and Magazines'
        ];

        $categoriesPt = [
            'Roupas',
            'Acessórios',
            'Animais de Estimação',
            'Casa e Jardim',
            'Eletrônicos',
            'Saúde e Beleza',
            'Esportes',
            'Brinquedos',
            'Motores',
            'Livros e Revistas'
        ];

        if($request->input('query') != null){
            $query = $request->input('query');
            if(in_array($query, $categoriesIt)||in_array($query, $categoriesEn)||in_array($query, $categoriesPt)){
            
                if(session('locale') == 'it'){
                    $query = array_search($query, $categoriesIt);
                } elseif(session('locale') == 'en'){
                    $query = array_search($query, $categoriesEn);
                } elseif(session('locale') == 'pt'){
                    $query = array_search($query, $categoriesPt);
                }
            }
        }
        $query = $request->input('query');
        $articles = Article::search($query)->where('is_accepted', true)->paginate(8);
        return view('article.searched', ['articles' => $articles, 'query' => $query]);
    }

    public function setLanguage($lang){

        session()->put('locale', $lang);
        return redirect()->back();
    }
}
