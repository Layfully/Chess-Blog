<?php require_once 'templates/HomeHeader.php'; ?>
<section class="hero is-primary is-fullheight">
    <div class="hero-body">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-5-tablet is-4-desktop is-3-widescreen">
                    <h1 class="title has-text-centered">Rejestracja</h1>
                    <form action="?task=security&action=register" method="post" class="box">
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
                        <div class="field">
                            <label for="email" class="label">Email</label>
                            <div class="control has-icons-left">
                                <input id="email" type="email" name="email" placeholder="np. mail@gmail.com" class="input" required>
                                <span class="icon is-small is-left">
                                    <i class="fas fa-envelope"></i>
                                </span>
                            </div>
                        </div>
                        <div class="field has-text-centered">
                            <input type="submit" value="Zarejestruj się" class="button is-rounded is-outlined is-danger">
                        </div>
                        <a style="display:block; text-align: center; " href="?task=security&action=login">Masz już konto? Zaloguj się</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once 'templates/HomeFooter.php'; ?>