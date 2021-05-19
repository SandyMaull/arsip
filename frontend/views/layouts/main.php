<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\assets\FontAwesomeAsset;
use frontend\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
FontAwesomeAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'e-Arsip Inaktif <i class="fa fa-folder-open"></i>',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            $menuItems = [
                ['label' => 'Home', 'url' => ['/site/index']],
            ];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'About', 'url' => ['/site/about']];
                $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {
                $menuItems[] = ['label' => 'Referensi', 'items' => [
                    ['label' => 'Pola Klasifikasi', 'url' => ['/pola-klasifikasi/index']],
                    ['label' => 'Unit Pengolah', 'url' => ['/unit-pengolah/index']],
                //    ['label' => 'Jenis Media', 'url' => ['/jenis-media/index']],
                    ['label' => 'Lokasi Ruang', 'url' => ['/lok-ruang/index']],
                    ['label' => 'Lokasi Rak/Rol', 'url' => ['/lok-rak-rol/index']],
                ]];
                $menuItems[] = ['label' => 'Arsip', 'items' => [
                    ['label' => 'Registrasi', 'url' => ['/arsip-inaktif/create']],
                    ['label' => 'Pencarian', 'url' => ['/arsip-inaktif/cari']],
                    ['label' => 'Kelola', 'url' => ['/arsip-inaktif/index']]
                ]];
                $menuItems[] = ['label' => 'Laporan', 'url' => ['/arsip-inaktif/laporan']];
                $menuItems[] = ['label' => 'User Profil', 'url' => ['/profile/view']];
                $menuItems[] = [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
        ?>

        <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
        <p class="pull-left">&copy; Sub Bagian Arsip dan Ekspedisi Biro Umum <?= date('Y') ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
