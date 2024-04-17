<?php
function column (...$params) {
    foreach ($params as $el) {
?>
        <th><?= $el ?></th>
<?php
    }
}

require_once 'Design\menu.php';


$result= new Movie(new Db());
    ?>



    <div class="bd">
        <h1>Таблица фильмов</h1>
        <table>
            <tr>
                <?= column('Номер','Фильм', 'Страна', 'Режисёр', 'Актёр','Время','Жанр', 'Год') ?>
            </tr>

            <?php
            foreach ($result->mega_join() as $item) {
                ?>c
                <?php
            }
            ?>
        </table>
    </div>

    <div class="bd">
        <h1>Приключения</h1>
        <table>
            <tr>
                <?= column('Номер','Фильм', 'Страна', 'Режисёр', 'Актёр','Время','Жанр', 'Год') ?>
            </tr>

            <?php
            
            foreach ($result->mega_join_while ('name_genre = "приключения"') as $item) {
                ?>
                <tr>
                    <td><?= $item['id_movie'] ?></td>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['name_country'] ?></td>
                    <td><?= $item['director'] ?></td>
                    <td><?= $item['actors'] ?></td>
                    <td><?= $item['time'] ?></td>
                    <td><?= $item['name_genre'] ?></td>
                    <td><?= $item['year'] ?></td>
                </tr>
                <?php
            }
            ?>
        </table>

        <div class="bd">
        <h1>Российские боевики</h1>
        <table>
            <tr>
                <?= column('Номер','Фильм', 'Страна', 'Режисёр', 'Актёр','Время','Жанр', 'Год') ?>
            </tr>

            <?php
            
            foreach ($result->mega_join_while ('name_genre = "боевик" and  name_country = "Россия"') as $item) {
                ?>
                <tr>
                    <td><?= $item['id_movie'] ?></td>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['name_country'] ?></td>
                    <td><?= $item['director'] ?></td>
                    <td><?= $item['actors'] ?></td>
                    <td><?= $item['time'] ?></td>
                    <td><?= $item['name_genre'] ?></td>
                    <td><?= $item['year'] ?></td>
                </tr>
                <?php
            }
            ?>
        </table>

<div class="bd">
<h1>французские комедии</h1>
<table>
    <tr>
        <?= column('Номер','Фильм', 'Страна', 'Режисёр', 'Актёр','Время','Жанр', 'Год') ?>
    </tr>

    <?php
    
    foreach ($result->mega_join_while ('name_genre = "комедия" and  name_country = "Франция"') as $item) {
        ?>
        <tr>
            <td><?= $item['id_movie'] ?></td>
            <td><?= $item['name'] ?></td>
            <td><?= $item['name_country'] ?></td>
            <td><?= $item['director'] ?></td>
            <td><?= $item['actors'] ?></td>
            <td><?= $item['time'] ?></td>
            <td><?= $item['name_genre'] ?></td>
            <td><?= $item['year'] ?></td>
        </tr>
        <?php
    }
    ?>
</table>
    </div>

    
<div class="bd">
<h1>фильмы, выпущенные с 1995 по 2005 год c сортировкой по году</h1>
<table>
    <tr>
        <?= column('Номер','Фильм', 'Страна', 'Режисёр', 'Актёр','Время','Жанр', 'Год') ?>
    </tr>

    <?php
    
    foreach ($result->mega_join_while_group ('year >=1996 and year <=2005 ', 'year') as $item) {
        ?>
        <tr>
            <td><?= $item['id_movie'] ?></td>
            <td><?= $item['name'] ?></td>
            <td><?= $item['name_country'] ?></td>
            <td><?= $item['director'] ?></td>
            <td><?= $item['actors'] ?></td>
            <td><?= $item['time'] ?></td>
            <td><?= $item['name_genre'] ?></td>
            <td><?= $item['year'] ?></td>
        </tr>
        <?php
    }
    ?>
</table>
    </div>


<div class="bd">
<h1>Фильмы менее 100 минут</h1>
<table>
    <tr>
        <?= column('Номер','Фильм', 'Страна', 'Режисёр', 'Актёр','Время','Жанр', 'Год') ?>
    </tr>

    <?php
    
    foreach ($result->mega_join_while ('time <=100') as $item) {
        ?>
        <tr>
            <td><?= $item['id_movie'] ?></td>
            <td><?= $item['name'] ?></td>
            <td><?= $item['name_country'] ?></td>
            <td><?= $item['director'] ?></td>
            <td><?= $item['actors'] ?></td>
            <td><?= $item['time'] ?></td>
            <td><?= $item['name_genre'] ?></td>
            <td><?= $item['year'] ?></td>
        </tr>
        <?php
    }
    ?>
</table>
    </div>

    <div class="bd">
<h1>10 самых бюджетных фильмов</h1>
<table>
    <tr>
        <?= column('Бюджет','Номер','Фильм', 'Страна', 'Режисёр', 'Актёр','Время','Жанр', 'Год') ?>
    </tr>

    <?php
    
    foreach ($result->mega_join_low_budget ('budget') as $item) {
        ?>
        <tr>
            <td><?= $item['budget'] ?></td>
            <td><?= $item['id_movie'] ?></td>
            <td><?= $item['name'] ?></td>
            <td><?= $item['name_country'] ?></td>
            <td><?= $item['director'] ?></td>
            <td><?= $item['actors'] ?></td>
            <td><?= $item['time'] ?></td>
            <td><?= $item['name_genre'] ?></td>
            <td><?= $item['year'] ?></td>
        </tr>
        <?php
    }
    ?>
</table>
    </div>
    
    <div class="bd">
<h1>БЮДЖЕТ ПО СТРАНАМ</h1>
<table>
    <tr>
        <?= column('Страна','бюджет','Фильм', 'Режисёр', 'Актёр','Время','Жанр', 'Год') ?>
    </tr>

    <?php
    
    foreach ($result->mega_join_low_budget1 ('budget') as $item) {
        ?>
        <tr>
            <td><?= $item['name_country'] ?></td>
            <td><?= $item['budget'] ?></td>
            <td><?= $item['name'] ?></td>
            <td><?= $item['director'] ?></td>
            <td><?= $item['actors'] ?></td>
            <td><?= $item['time'] ?></td>
            <td><?= $item['name_genre'] ?></td>
            <td><?= $item['year'] ?></td>
        </tr>
        <?php
    }
    ?>
</table>
    </div>
    
    <div class="bd">
<h1>Статистика по странам</h1>
<table>
    <tr>
        <?= column('Страна','кол-во') ?>
    </tr>

    <?php
    
    foreach ($result->join_group ('count(name_country) as count ') as $item) {
        ?>
        <tr>
            <td><?= $item['name_country'] ?></td>
            <td><?= $item['count'] ?></td>
        </tr>
        <?php
    }
    ?>
</table>
    </div>
    
    <div class="bd">
<h1>Статистика по жанрам</h1>
<table>
    <tr>
        <?= column('Жанр','кол-во') ?>
    </tr>

    <?php
    
    foreach ($result->join_group2 ('count(name_genre) as count ') as $item) {
        ?>
        <tr>
            <td><?= $item['name_genre'] ?></td>
            <td><?= $item['count'] ?></td>
        </tr>
        <?php
    }
    ?>
</table>
    </div>

    <div class="bd">
<h1>Статистика по актёрам</h1>
<table>
    <tr>
        <?= column('Актёр','кол-во') ?>
    </tr>

    <?php
    
    foreach ($result->join_group3 ('count(name_actor) as count ') as $item) {
        ?>
        <tr>
            <td><?= $item['name_actor'] ?></td>
            <td><?= $item['count'] ?></td>
        </tr>
        <?php
    }
    ?>
</table>
    </div>
<!-- Запрос 3 -->
<h1>Наши фильмы</h1> <br>
<div class="bd1">

<h1>боевик</h1>
<table>
    <tr>
        <?= column('Страна','бюджет','Фильм', 'Режисёр', 'Актёр','Время','Жанр', 'Год') ?>
    </tr>

    <?php
    
    foreach ($result->mega_join_while ('name_genre = "боевик"') as $item) {
        ?>
        <tr>
            <td><?= $item['name_country'] ?></td>
            <td><?= $item['budget'] ?></td>
            <td><?= $item['name'] ?></td>
            <td><?= $item['director'] ?></td>
            <td><?= $item['actors'] ?></td>
            <td><?= $item['time'] ?></td>
            <td><?= $item['name_genre'] ?></td>
            <td><?= $item['year'] ?></td>
        </tr>
        <?php
    }
    ?>
</table>
    </div>
    
<div class="bd1">

<h1>Комедия</h1>
<table>
    <tr>
        <?= column('Страна','бюджет','Фильм', 'Режисёр', 'Актёр','Время','Жанр', 'Год') ?>
    </tr>

    <?php
    
    foreach ($result->mega_join_while ('name_genre = "комедия"') as $item) {
        ?>
        <tr>
            <td><?= $item['name_country'] ?></td>
            <td><?= $item['budget'] ?></td>
            <td><?= $item['name'] ?></td>
            <td><?= $item['director'] ?></td>
            <td><?= $item['actors'] ?></td>
            <td><?= $item['time'] ?></td>
            <td><?= $item['name_genre'] ?></td>
            <td><?= $item['year'] ?></td>
        </tr>
        <?php
    }
    ?>
</table>
    </div>
    

    <div class="bd1">

<h1>приключения</h1>
<table>
    <tr>
        <?= column('Страна','бюджет','Фильм', 'Режисёр', 'Актёр','Время','Жанр', 'Год') ?>
    </tr>

    <?php
    
    foreach ($result->mega_join_while ('name_genre = "приключения"') as $item) {
        ?>
        <tr>
            <td><?= $item['name_country'] ?></td>
            <td><?= $item['budget'] ?></td>
            <td><?= $item['name'] ?></td>
            <td><?= $item['director'] ?></td>
            <td><?= $item['actors'] ?></td>
            <td><?= $item['time'] ?></td>
            <td><?= $item['name_genre'] ?></td>
            <td><?= $item['year'] ?></td>
        </tr>
        <?php
    }
    ?>
</table>
    </div>
    

    <div class="bd1">

<h1>фантастика</h1>
<table>
    <tr>
        <?= column('Страна','бюджет','Фильм', 'Режисёр', 'Актёр','Время','Жанр', 'Год') ?>
    </tr>

    <?php
    
    foreach ($result->mega_join_while ('name_genre = "фантастика"') as $item) {
        ?>
        <tr>
            <td><?= $item['name_country'] ?></td>
            <td><?= $item['budget'] ?></td>
            <td><?= $item['name'] ?></td>
            <td><?= $item['director'] ?></td>
            <td><?= $item['actors'] ?></td>
            <td><?= $item['time'] ?></td>
            <td><?= $item['name_genre'] ?></td>
            <td><?= $item['year'] ?></td>
        </tr>
        <?php
    }
    ?>
</table>
    </div>
    

    <div class="bd1">

<h1>Индия</h1>
<table>
    <tr>
        <?= column('Страна','бюджет','Фильм', 'Режисёр', 'Актёр','Время','Жанр', 'Год') ?>
    </tr>

    <?php
    
    foreach ($result->mega_join_while ('name_country = "Индия"') as $item) {
        ?>
        <tr>
            <td><?= $item['name_country'] ?></td>
            <td><?= $item['budget'] ?></td>
            <td><?= $item['name'] ?></td>
            <td><?= $item['director'] ?></td>
            <td><?= $item['actors'] ?></td>
            <td><?= $item['time'] ?></td>
            <td><?= $item['name_genre'] ?></td>
            <td><?= $item['year'] ?></td>
        </tr>
        <?php
    }
    ?>
</table>
    </div>
    
    <div class="bd1">

<h1>Россия</h1>
<table>
    <tr>
        <?= column('Страна','бюджет','Фильм', 'Режисёр', 'Актёр','Время','Жанр', 'Год') ?>
    </tr>

    <?php
    
    foreach ($result->mega_join_while ('name_country = "Россия"') as $item) {
        ?>
        <tr>
            <td><?= $item['name_country'] ?></td>
            <td><?= $item['budget'] ?></td>
            <td><?= $item['name'] ?></td>
            <td><?= $item['director'] ?></td>
            <td><?= $item['actors'] ?></td>
            <td><?= $item['time'] ?></td>
            <td><?= $item['name_genre'] ?></td>
            <td><?= $item['year'] ?></td>
        </tr>
        <?php
    }
    ?>
</table>
    </div>
    
    <div class="bd1">

<h1>США</h1>
<table>
    <tr>
        <?= column('Страна','бюджет','Фильм', 'Режисёр', 'Актёр','Время','Жанр', 'Год') ?>
    </tr>

    <?php
    
    foreach ($result->mega_join_while ('name_country = "США"') as $item) {
        ?>
        <tr>
            <td><?= $item['name_country'] ?></td>
            <td><?= $item['budget'] ?></td>
            <td><?= $item['name'] ?></td>
            <td><?= $item['director'] ?></td>
            <td><?= $item['actors'] ?></td>
            <td><?= $item['time'] ?></td>
            <td><?= $item['name_genre'] ?></td>
            <td><?= $item['year'] ?></td>
        </tr>
        <?php
    }
    ?>
</table>
    </div>
    
    <div class="bd1">

<h1>Франция</h1>
<table>
    <tr>
        <?= column('Страна','бюджет','Фильм', 'Режисёр', 'Актёр','Время','Жанр', 'Год') ?>
    </tr>

    <?php
    
    foreach ($result->mega_join_while ('name_country = "Франция"') as $item) {
        ?>
        <tr>
            <td><?= $item['name_country'] ?></td>
            <td><?= $item['budget'] ?></td>
            <td><?= $item['name'] ?></td>
            <td><?= $item['director'] ?></td>
            <td><?= $item['actors'] ?></td>
            <td><?= $item['time'] ?></td>
            <td><?= $item['name_genre'] ?></td>
            <td><?= $item['year'] ?></td>
        </tr>
        <?php
    }
    ?>
</table>
    </div>
    



    <?php

require_once 'Design\footer.php';
?>