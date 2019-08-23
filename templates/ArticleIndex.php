<?php require_once 'templates/HomeHeader.php'; ?>
<?php require_once 'templates/TagLink.php'; ?>

    <section class="hero has-background-white">
        <div class="hero-body">
            <div class="columns">
                <div class="column is-centered">
                    <div class="container is-centered has-text-centered ">
                        <h1 class="title  is-size-1 is-marginless">
                            <?php echo $this->removeMaliciousCode($this->articlesData[0]["title"]); ?>
                        </h1>
                        <p class=" article-author is-size-5 is-inline-block has-text-weight-bold"><?php echo $this->removeMaliciousCode($this->articlesData[0][1]) ?>
                            ,</p>
                        <p class="is-size-5 is-inline-block"
                              style="margin-top:10px; margin-bottom:30px"> <?php echo $this->removeMaliciousCode($this->articlesData[0][2]); ?></p>
                        <?php
                        $tag = new TagLink($this->articlesData[0]["GROUP_CONCAT(TG.name)"], "is-centered");
                        $tag->render();
                        ?>

                        <p>
                            <?php echo $this->articlesData[0]["content"]; ?>
                        </p>

                        <?php
                        if (isset($_SESSION['logged']) && $_SESSION['logged']) {
                            echo '<article class="media article-comment-form">
                            <figure class="media-left">
                                <p class="image is-64x64">
                                    <img src="'. $this->removeMaliciousCode($this->userData[0]['profile_image']).'" alt="user profile">
                                </p>
                            </figure>
                            <div class="media-content">
                                <form action="?task=comments&action=insert&id=' . $this->removeMaliciousCode($this->articlesData[0]['id']) . '" method="post">
                                    <div class="field">
                                        <p class="control">
                                            <textarea name="content" class="textarea" placeholder="Wpisz komentarz..."></textarea>
                                        </p>
                                    </div>
                                    <nav class="level">
                                        <div class="level-left">
                                        </div>
                                        <div class="level-right">
                                            <div class="level-item">
                                                <input type="submit" class="button is-info" value="Dodaj">
                                            </div>
                                        </div>
                                    </nav>
                                     <div class="field">
                                        <input class="csrf" type="text" name="csrf_token" value="'. $this->removeMaliciousCode($_SESSION['csrf_token']). '">    
                                    </div> 
                                </form>
                            </div>
                        </article> ';
                        }
                        ?>

                        <?php
                        $userModel = $this->loadModel('User');

                        if($this->commentsData != NULL){
                            foreach ($this->commentsData as $comment) {
                                $user = $userModel->getOne($comment['user_id']);

                                echo '<div class="media">
                                      <figure class="media-left">
                                        <p class="image is-64x64">
                                          <img src="'; echo $this->removeMaliciousCode(($user[0]['profile_image'] == NULL ? 'https://bulma.io/images/placeholders/128x128.png"' : $user[0]['profile_image'])) .'" alt="user profile">
                                        </p>
                                      </figure>
                                      <div class="media-content">
                                        <div class="content">
                                          <p>
                                            <strong>'.$this->removeMaliciousCode($comment['username']).' </strong>
                                            <br>'.
                                    $this->removeMaliciousCode($comment["content"]).
                                    '<br><small>'.$this->removeMaliciousCode($comment['date_add']).'</small></p>
                                        </div>

                                      </div>
                                      <div class="media-right">';
                                if(isset($_SESSION['logged'])&& $_SESSION['logged'] && $comment['user_id'] == $_SESSION['id']){
                                    echo '<a href="?task=comments&action=delete&id='. $this->removeMaliciousCode($comment["id"]).'&article_id='.$this->removeMaliciousCode($this->articlesData[0]['id']).' &csrf_token='.$_SESSION['csrf_token'].'"class="delete"></a>';
                                }
                                echo '</div>
                                    </div>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php require_once 'templates/HomeFooter.php' ?>