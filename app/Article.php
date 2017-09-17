<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Hash;
class Article extends Model
{
    protected $hidden = ['senha'];
    protected $fillable = ['nome','sobrenome','email','senha'];
    public function allArticles(){
        return self::all();
    }
    public function getArticle($id){
        $article = self::find($id);
        if(is_null($article)){
            return false;
        }
        return $article;
    }
    public function saveArticle(){
        $input = Input::all();
                    
        $input['senha'] = Hash::make($input['senha']);
        $article = new Article();
        $article->fill($input); // associação em massa
        
        $email = self::pluck('email')->all();
        foreach ($email as $key => $value) {
            if($value == $input['email']){
                return false;
            }
        }   
        return $article->save();
        
    }
    public function updateArticle($id)
    {
        $article = self::find($id);
        if(is_null($article)){
            return false;
        }
        $input = Input::all();
        if(isset($input['senha'])){
            $input['senha'] = Hash::make($input['senha']);
        }
        $article->fill($input); // associação em massa
        $article->save();
        return $article;
    }
    public function deleteArticle($id)
    {
        $article = self::find($id);
        if(is_null($article)){
            return false;
        }
        return $article->delete();
    }
    
}
