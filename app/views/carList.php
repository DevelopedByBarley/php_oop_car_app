<div class="container">
    <div class="row">
        <?php foreach ($params["cars"] as $index => $car) : ?>
            <div class="col-sm-4 car-list border">
                <div class="car-card">
                    <h1><?= $car["name"] ?></h1>
                    <h4><?= $car["licenceNumber"] ?></h4>
                    <h5><?= $car["price"] ?></h5>

                    <?php if ($params["isUnderEdit"] == $index) : ?>
                        <form action="/update-car?id=<?= $car["id"] ?>" method="POST">
                            <input type="text" name="name" />
                            <input type="text" name="licenceNumber" />
                            <input type="number" name="price" />
                            <button class="btn btn-outline-primary">Küld</button>
                            <a href="/" class="btn btn-success">Bezár</a>
                        </form>
                    <?php else : ?>
                        <a href="/delete-car?id=<?= $car["id"] ?>&name" class="btn btn-danger">Törlés</a>
                        <a href="/?isUnderEdit=<?= $index ?>" class="btn btn-warning">Szerkeszt</a>
                    <?php endif ?>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>

<div class="add_car">
    <form action="/add-car" method="POST">
        <input type="text" name="name" />
        <input type="text" name="licenceNumber" />
        <input type="number" name="price" />
        <button class="btn btn-outline-primary">Küld</button>
    </form>
</div>