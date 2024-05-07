<!-- Page Header-->
<header class="masthead" style="background-image: url('./public/assets/img/authors.jpg');">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Szerző adatok módosítása</h1>
                </div>
            </div>
        </div>
    </div>
</header>
<main class="m-5 d-flex justify-content-center">
    <div class="card justify-content-center" style="width: 30rem;">
        <form class="px-4 py-3" action='<?= BASE_URL ?>/private-status-author.php' method='post'>
            <input type="hidden" name="id" value="<?= $form['id'] ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Név</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Név"
                    value="<?= $form['name'] ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $form['email'] ?>">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Státusz</label>
                <select class="form-select" id="status" name="status">
                    <option value="active" <?= $form['status'] == 'active' ? 'selected' : '' ?>>Aktív</option>
                    <option value="inactive" <?= $form['status'] == 'inactive' ? 'selected' : '' ?>>Inaktív</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Mentés</button>
            <a href="<?= BASE_URL ?>/private-authors.php" class="btn btn-secondary">Vissza</a>
        </form>
    </div>
</main>