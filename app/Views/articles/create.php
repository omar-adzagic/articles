<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="create-conatiner">
    <?php if (isset($validation)) : ?>
        <div class="validation-errors">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif ?>
    <form action="/articles" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Naslov:</label>
            <input id="title" type="text" name="title" value="<?= set_value('title') ?>">
        </div>
        <div class="form-group">
            <label for="text">Tekst:</label>
            <textarea id="text" class="mytextarea" name="text" id="" cols="30" rows="10"><?= set_value('text') ?></textarea>
        </div>
        <div class="actions">
            <div class="images">
                <label for="images">Dodaj sliku:</label>
                <input id="images" type="file" name="images[]" multiple>
            </div>
            <div class="buttons">
                <a href="/articles" class="btn-orange link-btn cancel-button">
                    Otkaži
                </a>
                <button type="submit" class="btn-orange">
                    Dodaj članak
                </button>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection() ?>