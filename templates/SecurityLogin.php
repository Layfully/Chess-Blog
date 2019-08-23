<?php require_once 'templates/HomeHeader.php'; ?>
<section class="hero is-primary is-fullheight">
    <div class="hero-body">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-5-tablet is-4-desktop is-3-widescreen">
                    <h1 class="title has-text-centered">Logowanie</h1>
                    <form action="?task=security&action=login" method="post" class="box">
                        <div class="field">
                            <label for="login" class="label">Login</label>
                            <div class="control has-icons-left">
                                <input id="login" type="text" name="login" placeholder="e.g. Admin" class="input" required>
                                <span class="icon is-small is-left">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                        </div>
                        <div class="field">
                            <label for="password" class="label">Hasło</label>
                            <div class="control has-icons-left">
                                <input id="password" type="password" name="password" placeholder="*******" class="input" required>
                                <span class="icon is-small is-left">
                                    <i class="fas fa-lock"></i>
                                </span>
                            </div>
                        </div>
                        <div class="field has-text-centered">
                            <label for="remember" class="checkbox">
                                <input id="remember" type="checkbox">
                                Pamiętaj mnie
                            </label>
                        </div>
                        <div class="field has-text-centered">
                            <input type="submit" value="Login" class="button is-rounded is-danger is-outlined">
                        </div>
                        <a style="display:block; text-align: center; " href="?task=security&action=register">Nie masz konta? Zarejestruj się</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once 'templates/HomeFooter.php'; ?>