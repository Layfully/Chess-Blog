<h1 class="title">Dodawanie tagów</h1>
<form action="?task=tags&action=insert" method="post">
    <div class="field">
        <label class="label">Nazwa tagu:</label>
        <div class="control">
            <input class="input" type="text" name="name" required/>
        </div>
    </div>
    <div class="control">
        <input class="button is-info" type="submit" value="Dodaj" />
    </div>
</form>
