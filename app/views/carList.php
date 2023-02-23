<div class="container">
    <div class="row">
        <?php foreach ($params["cars"] as $index => $car) : ?>
            <div class="col-lg-4 car-list border d-flex align-items-center justify-content-center">
                <div class="car-card">
                    <div class="card" style="width: 18rem;">
                        <img src="../../public/images/<?= $car["imageName"] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title text-center bg-dark text-light p-3"><?= $car["name"] ?></h4>
                            <h6 class="card-title">Licence Number:</h6>
                            <p class="card-text"><?= $car["licenceNumber"] ?></p>
                            <h6 class="card-title">Price:</h6>
                            <p class="card-text"><?= $car["price"] ?> Ft</p>
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
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
<br><br><br><br><br><br>
<div class="add_car">
    <h1>Add car</h1>
    <form action="/add-car" method="POST" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Name" required />
        <input type="text" name="licenceNumber" placeholder="Licence Number" required />
        <input type="number" name="price" placeholder="Price" required />
        <input type="file" name="file" required />
        <button class="btn btn-outline-primary">Küld</button>
    </form>
</div>