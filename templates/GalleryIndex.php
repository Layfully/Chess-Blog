<?php require_once 'templates/HomeHeader.php'?>
<section class="section has-background-primary has-text-centered">
    <h1 class="title"> Galeria </h1>
    <div class="container">
        <div class="columns is-multiline">
            <?php
                foreach ($this->imagesData as $image){
                    echo '
                        <div class="column is-one-quarter-desktop is-half-tablet">
                            <div class="gallery card">
                                <div class="gallery-image-container card-image">
                                      <span class="gallery-tag is-family-monospace is-size-6 has-text-centered has-text-weight-bold has-text-white">
                                       '.$this->removeMaliciousCode($image["title"]).
                                      '</span>
                                    <figure class="gallery-image image is-3by2">'."<img class='gallery-image' src='".$this->removeMaliciousCode($image['src'])."' alt='".$this->removeMaliciousCode($image['alt'])."'> ".
                                    '</figure>
                                </div>
                            </div>
                        </div>
                    ';
                }
            ?>
        </div>
    </div>
</section>
<?php require_once 'templates/HomeFooter.php'?>
