<!-- Page Header-->
<header class="masthead"
    style="background-image: url('<?= BASE_URL ?>/uploads/<?= $article['image_name'] . '.' . $article['image_extension'] ?>'); background-size: cover;">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1><?= $article['title'] ?></h1>
                    <span class="meta">
                        Szerző:
                        <a href="#!"><?= $article['author_name'] ?></a>
                        <?= $article['created_at'] ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Post Content-->
<article class="mb-4">
    <div class="container-fluid px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p><?= $article['content'] ?></p>
            </div>
        </div>
    </div>
</article>