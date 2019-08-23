<?php require_once 'HomeHeader.php'?>
<section class="section">
    <div class="container">
        <h1 class="title">Modyfikacja artykułu (Pola wypełnione będą zmodyfikowane, pozostałe nie)</h1>
        <form action="?task=articles&action=update&id=<?php echo $this->removeMaliciousCode($this->articleData[0]["id"]); ?>" enctype="multipart/form-data" method="post">
            <div class="field">
                <label class="label">Autor:</label>
                <div class="control">
                    <input class="input" type="text" name="autor" value="<?php echo $this->removeMaliciousCode($this->articleData[0]['autor']); ?>"/>
                </div>
            </div>
            <div class="field">
                <label class="label">Data dodania:</label>
                <div class="control">
                    <input class="input" type="date" name="date_add" value="<?php echo $this->removeMaliciousCode(substr($this->articleData[0]['date_add'],0, 10)); ?>"/>
                </div>
            </div>
            <div class="field">
                <label class="label">Tytuł:</label>
                <div class="control">
                    <input class="input" type="text" name="title" value="<?php echo $this->removeMaliciousCode($this->articleData[0]['title']); ?>"/>
                </div>
            </div>
            <div class="field">
                <label class="label">Opis:</label>
                <div class="control">
                    <input class="input" type="text" name="description" value="<?php echo $this->removeMaliciousCode($this->articleData[0]['description']); ?>"/>
                </div>
            </div>
            <div class="field">
                <label class="label">Zawartość:</label>
                <div class="control">
                    <textarea class="input" name="content" cols="40">
                     <?php echo $this->removeMaliciousCode($this->articleData[0]['content']); ?>
                    </textarea>
                </div>
            </div>
            <div class="field">
                <label class="label">Tagi</label>
                <?php
                if ($this->tagsData != null) {
                    foreach ($this->tagsData as $tag) {
                        echo '<label class="checkbox"><input type="checkbox" name="tag[]" value="' . $this->removeMaliciousCode($tag['id']) . '"/> ' . $this->removeMaliciousCode($tag['name']) . '</label><br>';
                    }
                }
                ?>
            </div>
            <div class="file">
                <label class="file-label">
                    <input class="file-input" accept="image/*" type="file" name="thumbnail">
                    <span class="file-cta">
                    <span class="file-icon">
                        <i class="fas fa-upload"></i>
                    </span>
                    <span class="file-label">
                        Wybierz plik
                    </span>
                </span>
                </label>
            </div>
            <input type="hidden" value="<?php echo $this->removeMaliciousCode($this->articleData[0]['thumbnail']);?>" name="thumbnail_old">
            <div class="control">
                <input class="button is-info" type="submit" value="Dodaj"/>
            </div>
        </form>
    </div>
</section>
<?php require_once 'HomeFooter.php'?>