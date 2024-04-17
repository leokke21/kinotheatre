<?php
require_once 'Design\menu.php';
?>

<div class="card">
    <p>Введите Название страны</p>
    <input id="card" type="text"> <br>
    <button onclick="card(document.querySelector('#card').value)">Показать</button>
    <div class="c">

    </div>
    <p id="answer"></p>
</div>
<script>
    async function card(el) {
        if (el !== '') {
            let answer = await fetch(`fetch/Countr.php?name=${el}`).then(res => res.json())
            console.log(answer)
        let str = answer.reduce((acc,el)=>{
            acc+=`
            <div class="card" style="width: 18rem;">
            <div class="card-body">
                
                <h4 class="card-text" > ${el.name}</h4>
                <p> Режиссер: ${el.director}</p>
                <p> ${el.year} год выпуска</p>
                <p> ${el.time}МИНУТ </p>
                <img src='assets/${el.poster}' alt="">
            </div>
            </div>`
            return acc
        },'')
            document.querySelector('.c').innerHTML = str
            
            }

    }
</script>


<?php

require_once 'Design\footer.php';
?>