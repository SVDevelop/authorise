<?php
error_reporting(E_ALL);

include ($_SERVER['DOCUMENT_ROOT'].'/include/main_menu.php');
function isAuth ()
{
    if (isset($_POST['auth'])) {
        $login = trim($_POST['login']);
        $password = trim($_POST['password']);
        if( !empty($login) && !empty($password) ) {

            include ($_SERVER['DOCUMENT_ROOT'].'/data/logins.php');
            include ($_SERVER['DOCUMENT_ROOT'].'/data/passwords.php');

            if ( array_search($login, $logins) >= 0 ) {
                if ($passwords[array_search($login, $logins)] == $password) {
                    return include($_SERVER['DOCUMENT_ROOT'].'/include/success.php');
                } else {
                    return include($_SERVER['DOCUMENT_ROOT'].'/include/error.php');
                }
            } else {
                return include($_SERVER['DOCUMENT_ROOT'].'/include/error.php');
            }
        } else {
            return include($_SERVER['DOCUMENT_ROOT'].'/include/error.php');
        }
    }
    return;
}

include ($_SERVER['DOCUMENT_ROOT'].'/include/header.php');
?>
    <div class="header">
        <div class="logo"><img src="/i/logo.png" width="68" height="23" alt="Project"></div>
        <div class="clearfix"></div>
    </div>

    <div class="clear">
        <?php	route($menu, "main-menu");?>
    </div>

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td class="left-collum-index">

                <h1>Возможности проекта —</h1>
                <p>Вести свои личные списки, например покупки в магазине, цели, задачи и многое другое. Делится списками с друзьями и просматривать списки друзей.</p>

            </td>
            <td class="right-collum-index">

                <div class="project-folders-menu">
                    <ul class="project-folders-v">
                        <li class="project-folders-v-active"><a href="/?login=yes">Авторизация</a></li>
                        <li><a href="#">Регистрация</a></li>
                        <li><a href="#">Забыли пароль?</a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>

                <div class="index-auth">
                    <?php

                    isAuth();

                    if (isset($_GET['login']) && $_GET['login'] == "yes") { ?>
                    <form action="index.php" method="POST">

                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td class="iat">
                                    <label for="login_id">Ваш e-mail:</label>
                                    <input id="login_id" size="30" name="login" value="<?= $_POST['login'] ?? '' ?>">
                                </td>
                            </tr>
                            <tr>
                                <td class="iat">
                                    <label for="password_id">Ваш пароль:</label>
                                    <input id="password_id" size="30" name="password" type="password" value="">
                                </td>
                            </tr>
                            <tr>
                                <td><input type="submit" value="Войти" name="auth"></td>
                            </tr>
                        </table>
                    </form>
                    <?php } ?>
                </div>

            </td>
        </tr>
    </table>

    <div class="clearfix">
        <?php route($menu, "main-menu bottom");?>
    </div>

<?php include ($_SERVER['DOCUMENT_ROOT'].'/include/footer.php')?>
</html>