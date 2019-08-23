<?php
require_once 'templates/HomeHeader.php';
echo '
<section class="section">
    <div class="container">
        <div class="columns">
            <div class="column has-text-centered">
';
?>
<h1 class="title">Lista Artykułów</h1>

<table class="table is-bordered is-striped is-hoverable is-narrow is-fullwidth has-text-centered">
    <tbody>
    <tr>
        <td class="has-text-centered">Id</td>
        <td class="has-text-centered">Autor</td>
        <td class="has-text-centered">Data dodania</td>
        <td class="has-text-centered">Tytuł</td>
        <td class="has-text-centered">Opis</td>
        <td class="has-text-centered">Content</td>
        <td class="has-text-centered">Akcja</td>
    </tr>
    <?php
    if ($this->articlesData != null) {
        foreach ($this->articlesData as $articles) {
            echo
                '<tr>' .
                '<td class="has-text-centered">' . $this->removeMaliciousCode($articles[0]) . '</td>' .
                '<td class="has-text-centered">' . $this->removeMaliciousCode($articles[1]) . '</td>' .
                '<td class="has-text-centered">' . $this->removeMaliciousCode($articles[2]) . '</td>' .
                '<td class="has-text-centered">' . $this->removeMaliciousCode($articles[3]) . '</td>' .
                '<td class="has-text-centered">' . $this->removeMaliciousCode($articles[4]) . '</td>' .
                '<td class="has-text-centered">' . $this->removeMaliciousCode($articles[5]) . '</td>' .
                '<td class="has-text-centered">
            <a href="?task=articles&action=delete&id=' . $this->removeMaliciousCode($articles[0]) . '">Usuń</a>
            <a href="?task=articles&action=modify&id=' . $this->removeMaliciousCode($articles[0]) . '">Modyfikuj</a>
        </td>' .
                '</tr>';
        }
    }
    ?>
    </tbody>
</table>

<?php
require_once 'templates/ArticleAdd.php';
echo '
            </div>
            <div class="column has-text-centered">';
require_once 'templates/TagIndex.php';
require_once 'templates/TagAdd.php';
?>
</div>

<div class="column has-text-centered">
    <?php require_once 'templates/CitationIndex.php' ?>
    <?php require_once 'templates/CitationAdd.php' ?>
</div>
<div class="column has-text-centered">
    <?php require_once 'templates/GalleryAdd.php' ?>
</div>
</div>
</div>
</section>

<?php require_once 'HomeFooter.php'; ?>




