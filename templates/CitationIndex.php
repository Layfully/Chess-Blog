<h1 class="title">Lista cytatów</h1>

<table class="table is-bordered is-striped is-hoverable is-narrow is-fullwidth">
    <tbody>
    <tr>
        <td class="has-text-centered">Id</td>
        <td class="has-text-centered">Cytat</td>
        <td class="has-text-centered">Autor</td>
        <td class="has-text-centered">Akcja</td>
    </tr>
    <?php
    if ($this->citationsData != null) {
        foreach ($this->citationsData as $citations) {
            echo
                '<tr>' .
                '<td class="has-text-centered">' . $this->removeMaliciousCode($citations['id']) . '</td>' .
                '<td class="has-text-centered">' . $this->removeMaliciousCode($citations['citation']) . '</td>' .
                '<td class="has-text-centered">' . $this->removeMaliciousCode($citations['autor']) . '</td>' .
                '<td class="has-text-centered">
                <a href="?task=citations&action=delete&id=' . $this->removeMaliciousCode($citations['id']) . '">Usuń</a>
                <a href="?task=citations&action=modify&id=' . $this->removeMaliciousCode($citations['id']) . '">Modyfikuj</a>
            </td>' .
                '</tr>';
        }
    }
    ?>
    </tbody>
</table>