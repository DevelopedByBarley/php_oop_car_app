<?php if (!isset($_GET["isRegistered"])) : ?>
    <form action="/user/login" method="POST">
        <!-- Email input -->
        <div class="form-outline mb-4">
            <input type="email" id="form1Example1" class="form-control" name="email" />
            <label class="form-label" for="form1Example1">Email address</label>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <input type="password" id="form1Example2" class="form-control" name="password" />
            <label class="form-label" for="form1Example2">Password</label>
        </div>

        <button type="submit" class="btn btn-success ">Sign In</button>
        <a href="/user/registration-form?isRegistered=1">Nincs még fiókod? Regisztrálj!</a>
    </form>
<?php else : ?>
    <form action="/user/register" method="POST">
        <!-- Email input -->
        <div class="form-outline mb-4">
            <input type="text" id="form1Example1" class="form-control" name="name" />
            <label class="form-label" for="form1Example1">Email address</label>
        </div>
        <div class="form-outline mb-4">
            <input type="email" id="form1Example1" class="form-control" name="email" />
            <label class="form-label" for="form1Example1">Email address</label>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <input type="password" id="form1Example2" class="form-control" name="password" />
            <label class="form-label" for="form1Example2">Password</label>
        </div>

        <button type="submit" class="btn btn-info text-light">Registration</button>
        <a href="/user/registration-form">Van már fiókod? Lépj be!</a>
    </form>
<?php endif ?>