<?php
namespace App\Controller;
use \Core\Controller\Controller;
use \App;

class PostController extends AppController
{
  public function __construct() {
    parent::__construct();
    $this->loadModel('post');
    $this->loadModel('categorie');
  }

  public function index() {
    $posts = $this->post->last();
    $categories = $this->categorie->all();
    $this->render('articles/index', compact('posts', 'categories'));
  }

  public function categorie() {
    $categorie=$this->categorie->find([$_GET['id']]);
    if($categorie === false) {
      $this->notFound();
    }
    $articles = $this->post->lastByCategorie([$_GET['id']]);
    $this->render('articles/categorie', compact('categorie', 'articles'));
  }

  public function show() {
    $post = $this->post->find([$_GET['id']]);
    if($post === false) {
      $this->notFound();
    }
    App::getInstance()->setTitle($post->titre);
    $this->render('articles/single', compact('post'));
  }
}
