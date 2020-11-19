<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="login-container">
    <div class="login-form-conatainer">
        <form class="login-form" action="/login" method="POST">
            <?php if (isset($validation)): ?>
                <div class="validation-errors">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif; ?>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="" name="email" id="email" value="<?= !empty(set_value('email')) ? set_value('email') : '' ?>">
            </div>
            <div class="form-group">
                <label for="password">Lozinka:</label>
                <input type="password" class="" name="password" id="password" value="">
            </div>
            <div class="actions">
                <button type="submit" class="btn-orange">Pristupi</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>