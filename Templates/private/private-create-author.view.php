<!-- Page Header-->
<header class="masthead" style="background-image: url('./public/assets/img/authors.jpg');">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Szerző hozzáadása</h1>
                </div>
            </div>
        </div>
    </div>
</header>
<main class="m-5 d-flex justify-content-center flex-wrap gap-5 align-items-center">
    <div class="card  justify-content-center" style="width: 30rem;">
        <form class="px-4 py-3" action='<?= BASE_URL . '/private-store-author.php' ?>' method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Név</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Jóska Pista">
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail cím</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="pista@minta.com">
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Státusz</label>
                    <select class="form-select" id="status" name="status">
                        <option value="active" <?= isset($form['status']) && $form['status'] == 'active' ? 'selected' : '' ?>>Aktív</option>
                        <option value="inactive" <?= isset($form['status']) && $form['status'] == 'inactive' ? 'selected' : '' ?>>Inaktív</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Jelszó</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Jelszó">
                </div>
                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Jelszó újra</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                        placeholder="Jelszó újra">
                </div>
                <button type="submit" class="btn btn-success" name="submit">Hozzáadás</button>
                <a href="<?= BASE_URL ?>/private-articles.php" class="btn btn-secondary">Vissza</a>
        </form>
    </div>
</main>