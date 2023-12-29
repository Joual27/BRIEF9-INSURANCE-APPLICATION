<?php


class Claim
{
    private $claimId;
    private $description;
    private Article $article;

    public function __construct()
    {
    }

    public function getClaimId()
    {
        return $this->claimId;
    }

    public function setClaimId($claimId)
    {
        $this->claimId = $claimId;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getArticle()
    {
        return $this->article;
    }

    public function setArticle(Article $article)
    {
        $this->article = $article;
    }
}



?> 