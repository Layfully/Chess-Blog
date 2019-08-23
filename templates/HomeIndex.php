<?php
require_once 'templates/HomeHeader.php';
require_once 'templates/ArticleLink.php';
?>
<section class="section">
    <div class="container">
        <div class="tile box is-ancestor">
            <div id="citation" class="tile is-parent is-vertical has-text-centered">
                <h1 class="title is-size-5 citation"><?php echo $this->removeMaliciousCode($this->citationData[0]['citation']); ?></h1>
                <p class="subtitle is-size-6 citation"><?php echo $this->removeMaliciousCode($this->citationData[0]['autor']); ?></p>
            </div>
        </div>


        <div class="slider-container box">
            <figure class="image slider-figure" id="slider">
                <img class="slider-image" src="<?php echo $this->removeMaliciousCode($this->sliderData[0]['src']); ?>" alt="<?php echo $this->removeMaliciousCode($this->sliderData[0]['alt']); ?>">
            </figure>
        </div>

        <script src="js/Ajax.js"></script>

        <div class="articles-rows">
            <?php
            $data = $this->get('articlesData');
            for($i = 0; $i < count($data); $i++){
                $article = new ArticleLink($data[$i]);
                $article->render();
            }
            ?>
        </div>
    </div>
</section>

<?php
require_once 'templates/HomeFooter.php';
?>

