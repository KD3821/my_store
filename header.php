
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
        ] );
    ?>
    </div>
<!-- <nav>
        <a href="">Главная</a>
        <a href="">Самым маленьким</a>
        <a href="">Напишите нам</a>
        <a href="">Проверить товар</a>
        <a href="">Новости</a>
</nav> -->