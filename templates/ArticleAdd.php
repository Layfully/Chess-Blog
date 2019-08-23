<h1 class="title">Dodawanie artykułów</h1>
<form action="?task=articles&action=insert" enctype="multipart/form-data" method="post">
    <div class="field">
        <label class="label">Autor:</label>
        <div class="control">
            <input class="input" type="text" name="autor" required/>
        </div>
    </div>
    <div class="field">
        <label class="label">Data dodania:</label>
        <div class="control">
            <input class="input" type="date" name="date_add" required/>
        </div>
    </div>
    <div class="field">
        <label class="label">Tytuł:</label>
        <div class="control">
            <input class="input" type="text" name="title" required/>
        </div>
    </div>
    <div class="field">
        <label class="label">Opis:</label>
        <div class="control">
            <input class="input" type="text" name="description" required/>
        </div>
    </div>
    <div class="field">
        <label class="label">Zawartość:</label>
        <div class="control">
            <textarea class="input" rows="4" cols="50" name="content" required> </textarea>
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
    <div class="control">
        <input class="button is-info" type="submit" value="Dodaj"/>
    </div>
</form>
</body>
</html>
