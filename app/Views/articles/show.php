<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="article-container">
    <div class="navigation">
        <a href="/articles">Vrati se na listu članaka</a>
    </div>
    <h2><?= $article['title'] ?></h2>
    <p><?= $article['text'] ?></p>
    <div class="images-grid">
        <?php foreach($article['images'] as $image) : ?>
            <div class="grid-item">
                <img src="<?= $image->image_path ?>" alt="Image">
            </div>
        <?php endforeach ?>
    </div>
</div>

<?= $this->endSection() ?>
