<?php
namespace App\Http\Controllers;
use App\Article;
use Response;
class ArticlesController extends Controller
{
    public function __construct(Article $article){
        header('Access-Control-Allow-Origin: *'); 
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    	$this->article = $article;
    }
    public function allarticles()
    {
    	return Response::json($this->article->allarticles(),200);
    }
    public function getarticle($id)
    {
    	$article = $this->article->getarticle($id);
    	if(!$article){
    		return Response::json(['response'=>"Registro não encontrado!"], 400);
    	}
    	return Response::json($article,200);
    }
    public function savearticle()
    {
    	
        $article = $this->article->savearticle();
    	if(!$article){
    		return Response::json(['response'=>"Registro não adicionado!"], 400);
    	}
    	return Response::json(['response'=>"Registro adicionado!"],200);
    }
    public function updatearticle($id)
    {
    	$article = $this->article->updatearticle($id);
    	if(!$article){
    		return Response::json(['response'=>"Registro não encontrado!"], 400);
    	}
    	return Response::json($article,200);
    }
    public function deletearticle($id)
    {
    	if($this->article->deletearticle($id)){
    		return Response::json("Registro deletado com sucesso!",200);
    	}
    	return Response::json("Erro ao deletar registro!",400);
    	
    }
}