<h1 class="title">Lista tagów</h1>

<table class="table is-bordered is-striped is-hoverable is-narrow is-fullwidth">
    <tbody>
    <tr>
        <td class="has-text-centered">Id</td>
        <td class="has-text-centered">Nazwa</td>
        <td class="has-text-centered">Akcja</td>
    </tr>
    <?php
    if ($this->tagsData != null) {
        foreach ($this->tagsData as $tags) {
            echo
                '<tr>' .
                '<td class="has-text-centered">' . $this->removeMaliciousCode($tags[0]) . '</td>' .

                '<td class="has-text-centered">' . $tags[1] . '</td>' .
                '<td class="has-text-centered">
                <a href="?task=tags&action=delete&id=' . $this->removeMaliciousCode($tags[0]) . '">Usuń</a>
                <a href="?task=tags&action=modify&id=' . $this->removeMaliciousCode($tags[1]) . '">Modyfikuj</a>
            </td>' .
                '</tr>';
        }
    }
    ?>
    </tbody>
</table>