<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="articles">
    <div class="articles-container">
        <?php if (session()->get('isLoggedIn')) : ?>
            <div class="actions-container">
                <h3 class="text-orange">Dobrodošao <?= session()->get('first_name') . ' ' . session()->get('last_name') ?>,</h3>
                <a class="link-btn btn-orange" href="/articles/create">Dodaj novi članak</a>
            </div>
        <?php endif ?>
        <?php foreach ($articles as $article) : ?>
            <?php if (session()->get('isLoggedIn')) : ?>
                <?= view_cell('\App\Libraries\Article::articleItem', ['article' => $article]) ?>
            <?php else : ?>
                <?= view_cell('\App\Libraries\Article::articleItemAuthUser', ['article' => $article]) ?>
            <?php endif ?>
        <?php endforeach; ?>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <?php if ($pager) : ?>
<!--                        --><?php //$pagi_path='/articles'; ?>
<!--                        --><?php //$pager->setPath($pagi_path); ?>
                        <?= $pager->links('custom', 'custom_pagination') ?>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>