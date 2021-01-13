<?php

class Articles extends Controller 
{
    public function index()
    {
        $this->loadModel("Article");
        $articles = $this->Article->getAll();

        // $this->render('index', ['articles' => $articles]);
        $this->render("index", compact('articles'));
    }

    // les fonctions ici, c'est les pages 

    public function show(string $slug)
    {
        $this->loadModel('Article');
        $article = $this->Article->findBySlug($slug);
        $this->render("show", compact("article"));
    }

    public function update()
    {
        $this->loadModel("Article");
        $this->Article->id = null;
        $article = $this->Article->getOne();
        $this->render("update", compact("article"));
        
    }
}
