<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Session;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class CreateArticleForm extends Component
{
    use WithFileUploads;
    
    #[Validate('required|min:5')]
    public $title;
    #[Validate('required|min:10')]
    public $description;
    #[Validate('required|numeric')]
    public $price;
    #[Validate('required')]
    public $category = 2;
    public $article;
    
    public $images = [];
    public $temporary_images;
    
    public function store(){
        $this->validate();
        $this->article = Article::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category,
            'user_id' => Auth::id()
        ]);
        
        $this->reset();
        
        return redirect()->route('homepage')->with('message', 'Articolo creato correttamente');
    }
    
    public function updatedTemporaryImages(){
        if($this->validate([
            'temporary_images.*' => 'image|max:1024',
            'temporary_images' => 'max:6'
            ])) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }   
    }
        
        
    public function render()
        {
            return view('livewire.create-article-form');
    }
}
    