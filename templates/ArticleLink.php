<?php
require_once 'templates/TagLink.php';

class ArticleLink
{
    public $articleData;

    function __construct($articleData)
    {
        $this->articleData = $articleData;
    }
    function removeMaliciousCode($input)
    {
        return htmlentities($input, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    }
    function render()
    {
        echo '
        <div class="section article-one">
            <div class="container container-article">
                <div class="card has-background-warning container-article">
                    <a href="?task=articles&action=index&id=' . $this->removeMaliciousCode($this->articleData[0]) . '">' .
            '<div class="card-image">
                        <figure class="image is-2by1">
                            <img src="' . $this->removeMaliciousCode($this->articleData['thumbnail']) . '" alt="Thumbnail" class="thumbnail">
                        </figure>
                    </div>
                    </a>
                    <div class="card-content">
                        <div class="media">
                                <p class="title is-3">' . $this->removeMaliciousCode($this->articleData['title']) . '</p>
                        </div>  
                        
                        <div class="content">
                            <p>' . $this->removeMaliciousCode($this->articleData['description']) . '</p>';

        $tag = new TagLink($this->articleData["GROUP_CONCAT(TG.name)"]);
        $tag->render();

        echo '
                            <time class="is-size-7" datetime="' .$this->removeMaliciousCode($this->articleData['date_add']) .'">Data dodania: ' . $this->removeMaliciousCode($this->articleData['date_add']) . '</time>
                            <p class="is-size-7">Autor:' . $this->removeMaliciousCode($this->articleData['autor']) . '</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                ';
    }
}

?>
