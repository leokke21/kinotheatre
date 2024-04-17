<?php  require_once "adminMenu.php" ?>

    <!-- Основной контент -->
<main>
    
<table>
    <tr>
    <th>Номер</th>
    <th>Фильм</th>
    <th>Страна</th>
    <th>Режисёр</th>
    <th>Время</th>
    <th>Жанр</th>
    <th>Год</th>
    <th colspan = "2">Действия</th>        
    </tr>
    <?php
    
        foreach ($movies->getAll() as $key => $item) {
            ?>
            
            <tr>
                    <td><?= $item['id_movie'] ?></td>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['name_country'] ?></td>
                    <td><?= $item['director'] ?></td>
                    <td><?= $item['time'] ?></td>
                    <td><?= $item['name_genre'] ?></td>
                    <td><?= $item['year'] ?></td>
                    
                        
                        <td>
                            <form action="adminEditFilm.php" method="get">
                                <button
                                    type="submit"
                                    name="submit-edit"
                                    class="btn btn-success"
                                    value="<?= $item['id_movie'] ?>"
                                > &#128397;
                                    Редактировать
                                </button>
                                
                            </form>
                        </td>

                        <td>
                            <form action="#" method="post">
                                <button
                                    type="submit"
                                    name="submit-delete"
                                    class="btn text-bg-danger"
                                    value="<?= $item['id_movie'] ?>"
                                > &#128465;
                                    Удалить
                                </button>
                                
                            </form>
                        </td>
                </tr>
            <?php
        }
        ?>
        </table>  
</main>

<?php  require_once "adminFooter.php" ?>