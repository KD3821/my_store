
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        <?php the_title(); ?>
    </title>
    <?php wp_head(); ?>
    
</head>
<body>
    
    <div class="my_nav">
    <?php
        wp_nav_menu( [
            'theme_location' => 'top',
            'container' => '',
            'menu_class' => '',
            'menu_id' => ''
        ]);
    ?>
    </div>
    <div class="reg_nav">
    <?php    
        if (isset($_SESSION['visitor'])) {
            echo '<h3 style="color:red">'.$_SESSION['visitor'].'</h3>';
            $_SESSION['log_var'] = 'logout';
        } else {
            echo '<h3 style="color:red">Неавторизованный пользователь</h3>';
            $_SESSION['log_var'] = 'login';
        }
    ?>
    <?php
        wp_nav_menu([
            'theme_location' => $_SESSION['log_var'],
            'container' => '',
            'menu_class' => '',
            'menu_id' => ''
        ]);
    ?>
    </div>