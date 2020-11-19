<div class="articles-list">
    <!--    <h3>--><?//= $article['title'] ?><!--</h3>-->
    <div class="article">
        <div class="title">
            <p><?= $article['title'] ?></p>
        </div>
        <div class="actions">
            <a href="/articles/<?= $article['id'] ?>/edit">
                <i class="fas fa-pen edit-icon"></i>
            </a>
            <a href="/articles/delete/<?= $article['id'] ?>">
                <i class="fas fa-minus-circle delete-icon"></i>
            </a>
        </div>
    </div>
    <hr>
</div>