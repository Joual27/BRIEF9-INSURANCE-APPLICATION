<?php





class ArticleServiceImp implements ArticleServiceI{
    private Database $db ;


    public function __construct(Database $db){
       $this->db = $db;
    } 

    public function getAllArticles(){
       $fetchArticlesQuery = "SELECT * FROM article JOIN customer ON article.customerId = customer.customerId JOIN insurer ON article.insurerId = insurer.insurerId";
       $this->db->query($fetchArticlesQuery);
       try{
         return $this->db->fetchMultipleRows();
       }

       catch(PDOException $e){
        die($e->getMessage());
       }
    }
    public function addArticle(Article $article){
        $addArticleQuery = "INSERT INTO article VALUES(:id , :title , :content , :customerId , :insurerId)";
        $this->db->query($addArticleQuery);
        $this->db->bind(":id",$article->getArticleId());
        $this->db->bind(":title",$article->getTitle());
        $this->db->bind(":content",$article->getContent());
        $this->db->bind(":customerId",$article->getCustomer()->getCustomerId());
        $this->db->bind(":insurerId",$article->getInsurer()->getInsurerId());

        try{
            $this->db->execute();
        }
        catch(PDOException $e){
            die($e->getMessage());
        }

    }
    public function updateArticle(Article $article){
        $updateArticleQuery = "UPDATE article set title = :title , content = :content WHERE articleId = :id";
        $this->db->query($updateArticleQuery);
        $this->db->bind(":title", $article->getTitle());
        $this->db->bind(":content", $article->getContent());
        $this->db->bind(":id", $article->getArticleId());
        try{
            $this->db->execute();
        }
        catch(PDOException $e){
            die($e->getMessage());
        }
    }
    public function deleteArticle($articleId){
        $deleteArticleQuery = "DELETE FROM article WHERE articleId = :id";
        $this->db->query($deleteArticleQuery);
        $this->db->bind(":id" ,$articleId);
        try{
            $this->db->execute();
        }
        catch(PDOException $e){
            die($e->getMessage());
        }
    }
}

?>