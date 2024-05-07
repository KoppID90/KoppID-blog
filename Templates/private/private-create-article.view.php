<header class="masthead" style="background-image: url('./public/assets/img/articles.jpg');">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Új cikk</h1>
                </div>
            </div>
        </div>
    </div>
</header>
<main class="m-5 d-flex justify-content-center">
    <div class="card justify-content-center" style="width: 60rem;">
        <form class="px-4 py-3" action="<?= BASE_URL . '/private-store-article.php' ?>" method="post"
            enctype="multipart/form-data">
            <label for="author" class="form-label">Szerző</label>
            <select class="form-select" id="author" name="author">
                <option value="">Válassz szerzőt...</option>
                <?php foreach ($authors as $author): ?>
                    <option value="<?= $author['id'] ?>"><?= $author['name'] ?></option>
                <?php endforeach; ?>
            </select>
            <div class="mb-3">
                <label for="title" class="form-label">Cikk címe</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Cím">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Tartalom</label>
                <textarea rows="15" cols="auto" name="content" placeholder="Tartalom" style="width: 100%"></textarea>
            </div>
            <label for="image" class="form-label">Kép hozzáadása</label>
            <input class="mb-3" type="file" name="image" accept="image/*">
            <br>
            <button type="submit" class="btn btn-success">Küldés</button>
            <a href="private-articles.php" class="btn btn-secondary">Vissza</a>
        </form>
    </div>
</main>