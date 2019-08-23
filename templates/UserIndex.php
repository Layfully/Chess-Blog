<?php require_once 'templates/HomeHeader.php'; ?>
<section class="section">
    <div class="container">
        <div class="columns">
            <div class="column has-text-centered">
                <h1 class="title"><?php echo $this->removeMaliciousCode($this->userData[0]['login']); ?></h1>
                <div class="level">
                    <div class="level-item">
                        <figure class="image is-128x128">
                            <img class="is-rounded"
                                 src="<?php echo $this->removeMaliciousCode($this->userData[0]['profile_image']); ?>" alt="user-profile">
                        </figure>
                    </div>
                </div>
                <h2 class="subtitle">Zmiana zdjęcia profilowego</h2>
                <form class="user-image"
                      action="?task=user&action=update&id=<?php echo $this->removeMaliciousCode($this->userData[0]['id']); ?>"
                      enctype="multipart/form-data" method="post">
                    <div class="field">
                        <div class="file">
                            <label class="file-label">
                                <input class="file-input" accept="image/*" type="file" name="profile_image">
                                <span class="file-cta">
                                <span class="file-icon">
                                    <i class="fas fa-upload"></i>
                                </span>
                                <span class="file-label">
                                    Wybierz zdjęcie
                                </span>
                            </span>
                            </label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input class="button is-info" type="submit" value="Dodaj"/>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input class="csrf" name="csrf_token" value="<?php $this->removeMaliciousCode($_SESSION['csrf_token']); ?>"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php require_once 'templates/HomeFooter.php' ?>
