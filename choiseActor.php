<?php
require_once 'Design\menu.php';
?>

<div class="card">
    <p>Введите Имя актера</p>
    <input id="card" type="text"> <br>
    <button onclick="card(document.querySelector('#card').value)">Показать</button>
    <div class="c">

    </div>
    <p id="answer"></p>
</div>

<script>
    async function card(el) {
        if (el !== '') {
            let answer = await fetch(`fetch/Actor.php?name=${el}`).then(res => res.json())
            console.log(answer)
        let str = answer.reduce((acc,el)=>{
            acc+=`<div class = 'SuperCard'><p >${el.name_actor}</p>  <img width="150px" src="assets/${el.foto}" alt=""> </div>`
            return acc
        },'')
            document.querySelector('.c').innerHTML = str
            
            }

    }
</script>


<?php

require_once 'Design\footer.php';
?>