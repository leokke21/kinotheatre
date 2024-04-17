
<?php
require_once 'Design\menu.php';
?>

<div class="card">
    <p>Введите номер Фильма</p>
    <input id="card" type="number"> <br>
    <button onclick="card(document.querySelector('#card').value)">Показать</button>

    <p id="answer"></p>
    <img width="150px" id="answerImg" src="" alt="">
</div>

<script>
    async function card(el) {
        if (el !== '') {
            let answer = await fetch(`fetch/MovieNumber.php?id=${el}`).then(res => res.json())
            console.log(answer)
            answer.forEach(element => {
                
            document.querySelector('#answer').innerHTML = element.name
            document.querySelector('#answerImg').setAttribute('src', "assets/"+element.poster)
            });
        }

    }
</script>


<?php

require_once 'Design\footer.php';
?>