<header class="masthead" style="background-image: url('./public/assets/img/articles.jpg');">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Cikk módosítása</h1>
                </div>
            </div>
        </div>
    </div>
</header>
<main class="m-5 d-flex justify-content-center">
    <div class="card justify-content-center" style="width: 30rem;">
        <form class="px-4 py-3" action='<?= BASE_URL ?>/private-update-article.php' method='post'>
            <input type="hidden" name="id" value="<?= $form['id'] ?>">
            <div class="mb-3">
                <label for="title" class="form-label">Cikk címe</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Cím"
                    value="<?= $form['title'] ?>">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Tartalom</label>
                <textarea rows="15" cols="auto" name="content" placeholder="Tartalom"
                    style="width: 100%"><?= $form['content'] ?></textarea>
            </div>
            <button type="submit" class="btn btn-success">Mentés</button>
            <a href="<?= BASE_URL ?>/private-articles.php" class="btn btn-secondary">Vissza</a>
        </form>
    </div>
</main>