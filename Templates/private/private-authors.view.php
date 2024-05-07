<!-- Page Header-->
<header class="masthead" style="background-image: url('./public/assets/img/authors.jpg');">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Privát szerzők</h1>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container" style="height: 45rem;">
    <div class="row mt-4">
        <div class="col text-end">
            <a href="<?= BASE_URL ?>/private-create-author.php" class="btn btn-primary">Új szerző</a>
        </div>
    </div>
    <div class="row">
        <table class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Azonosító</th>
                    <th>Név</th>
                    <th>E-mail</th>
                    <th>Státusz</th>
                    <th>Hozzáadva</th>
                    <th>Műveletek</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($authors) > 0): ?>
                    <?php foreach ($authors as $author): ?>
                        <tr>
                            <td><?= $author['id'] ?></td>
                            <td><?= $author['name'] ?></td>
                            <td><?= $author['email'] ?></td>
                            <td><?= $author['status'] ?></td>

                            <td><?= date('Y.m.d H:i:s', strtotime($author['created_at'])) ?></td>
                            <td>
                                <a href="<?= BASE_URL ?>/private-edit-author.php?id=<?= $author['id'] ?>"
                                    class="btn btn-warning">Szerkesztés</a>
                                <a href="javascript:;" class="btn btn-danger"
                                    onclick="confirmDelete(<?= $author['id'] ?>)">Törlés</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Biztos vagy benne?',
            text: "A felhasználó törlése visszavonhatatlan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Igen, törlöm!',
            cancelButtonText: 'Mégsem'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '<?= BASE_URL ?>/private-destroy-author.php?id=' + id;
            }
        });
    }
</script>