<?php

interface ArticleServiceI{
    public function getAllArticles();
    public function addArticle(Article $article);
    public function updateArticle(Article $article);
    public function deleteArticle($articleId);
}


?>