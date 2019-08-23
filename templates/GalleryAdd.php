<h1 class="title">Dodawanie zdjęć</h1>
<form action="?task=gallery&action=insert" enctype="multipart/form-data" method="post">
    <div class="field">
        <label class="label">Tytuł zdjęcia:</label>
        <div class="control">
            <input class="input" type="text" name="title" required/>
        </div>
    </div>
    <div class="field">
        <label class="label">Alternatywny tekst:</label>
        <div class="control">
            <input class="input" type="text" name="alt" required/>
        </div>
    </div>

    <div class="field">
        <div class="file">
            <label class="file-label">
                <input class="file-input" accept="image/*" type="file" name="src">
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
    </div>
    <div class="control">
        <input class="button is-info" type="submit" value="Dodaj"/>
    </div>
</form>
