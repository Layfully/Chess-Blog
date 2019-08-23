<h1 class="title">Dodawanie cytatów</h1>
<form action="?task=citations&action=insert" method="post">
    <div class="field">
        <label class="label">Cytat</label>
        <div class="control">
            <input class="input" type="text" name="citation" required/>
        </div>
    </div>
    <div class="field">
        <label class="label">Autor</label>
        <div class="control">
            <input class="input" type="text" name="autor"/>
        </div>
    </div>
    <div class="control">
        <input class="button is-info" type="submit" value="Dodaj" />
    </div>
</form>
