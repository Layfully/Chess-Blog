<?php require_once 'templates/HomeHeader.php'; ?>
    <section class="section">
        <div class="container">
            <h1 class="title">Modyfikacja tagu</h1>
            <form action="?task=tags&action=update&id=<?php echo $this->removeMaliciousCode($this->tagData[0]['id']); ?>" method="post">
                <div class="field">
                    <label class="label">Nazwa tagu:</label>
                    <div class="control">
                        <input class="input" type="text" name="name" value="<?php echo $this->removeMaliciousCode($this->tagData[0]['name']); ?>"
                               required/>
                    </div>
                </div>
                <div class="control">
                    <input class="button is-info" type="submit" value="Modyfikuj"/>
                </div>
            </form>
        </div>
    </section>
<?php require_once 'templates/HomeFooter.php'; ?>