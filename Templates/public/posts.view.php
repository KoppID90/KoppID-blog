<!-- Page Header-->
<header class="masthead" style="background-image: url('./public/assets/img/home.jpg');">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Utazó Blog</h1>
                    <span class="subheading">A világ legjobb úticéljai egy helyen</span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->
<?php if (!empty($articles)): ?>
    <?php foreach ($articles as $article): ?>
        <div class="container-fluid px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <!-- Post preview-->
                    <div class="d-flex">
                        <img class="img-fluid me-3" style="max-width: 250px; max-height: auto; object-fit: cover;"
                            src="<?= BASE_URL ?>/uploads/<?= $article['image_name'] . '.' . $article['image_extension'] ?>"
                            class="card-img-top" alt="<?= $article['image_name'] ?>">

                        <div class="post-preview">
                            <a href="<?= BASE_URL ?>/post.php?id=<?= $article['id'] ?>">
                                <h2 class="post-title"><?= $article['title'] ?></h2>
                                <h3 class="post-subtitle"><?= substr($article['content'], 0, 100) . '...' ?></h3>
                            </a>
                            <p class="post-meta">
                                Szerző:
                                <a href="#!"><?= $article['author_name'] ?></a>
                                <?= $article['created_at'] ?>
                            </p>
                        </div>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>