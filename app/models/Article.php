<?php


class Article {
    // Attributes
    private $articleId;
    private $title;
    private $content;
    private Customer $customer;
    private Insurer $insurer;

   
    public function __construct() {
    }

    public function getArticleId() {
        return $this->articleId;
    }

    public function setArticleId($articleId) {
        $this->articleId = $articleId;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function getCustomer() {
        return $this->customer;
    }

    public function setCustomer(Customer $customer) {
        $this->customer = $customer;
    }

    public function getInsurer() {
        return $this->insurer;
    }

    public function setInsurer(Insurer $insurer) {
        $this->insurer = $insurer;
    }
}



?>