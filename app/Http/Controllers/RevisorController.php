<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Mail\BecomeRevisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index(){
        $article_to_check = Article::where('is_accepted', null)->first();
        $last_article = Article::where('is_accepted', !null)->where('editor_id',Auth::id())->latest()->first();
        return view('revisor.index', compact('article_to_check', 'last_article'));
    }

    public function accept(Article $article){
        $article->setAccepted(true, now(), Auth::id());
        return redirect()
        ->back()
        ->with('message', "Hai accettato l'articolo $article->title");
    }

    public function reject(Article $article){
        $article->setAccepted(false, now(), Auth::id());
        return redirect()
        ->back()
        ->with('message', "Hai rifiutato l'articolo $article->title");
    }

    public function undo(Article $article){
        $article->setAccepted(null, null, null);
        return redirect()
        ->back()
        ->with('message', "Hai annullato la revisione dell'articolo $article->title");
    }

    public function becomeRevisor(){
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->route('homepage')->with('message', 'Hai richiesto di diventare revisore');
    }

    public function makeRevisor(User $user){
        Artisan::call('app:make-user-revisor', ['email' => $user->email]);
        return redirect()->back();
    }

}
