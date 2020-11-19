<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="create-conatiner">
    <?php if (isset($validation)) : ?>
        <div class="validation-errors">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif ?>
    <form action="/articles/<?= $article['id'] ?>/update" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Naslov:</label>
            <input id="title" type="text" name="title" value="<?= !empty(set_value('title')) ? set_value('title') : $article['title'] ?>">
        </div>
        <div class="form-group">
            <label for="text">Tekst:</label>
            <textarea id="text" class="mytextarea" name="text" id="" cols="30" rows="10"><?= !empty(set_value('text')) ? set_value('text') : $article['text'] ?></textarea>
        </div>
        <div class="actions">
            <div class="images">
                <label for="images">Dodaj sliku:</label>
                <input id="images" type="file" name="images[]" multiple>
            </div>
            <div class="buttons">
                <a href="/articles" class="btn-orange link-btn">
                    Otkaži
                </a>
                <button type="submit" class="btn-orange">
                    Edituj članak
                </button>
            </div>
        </div>
    </form>
    <div class="edit-images-grid">
        <?php if ($article['images'] && count($article['images']) > 0) : ?>
            <?php foreach($article['images'] as $image) : ?>
                <div class="grid-item">
                    <img src="<?= $image->image_path ?>" alt="Image">
                    <form action="/images/delete/<?= $image->id ?>" method="POST">
                        <button type="submit" class="btn-orange delete-button">Obriši</button>
                    </form>
                </div>
            <?php endforeach ?>
        <?php endif ?>
    </div>
</div>
<?= $this->endSection() ?>
