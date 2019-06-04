<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Задание 3</title>
</head>
<body>
<script type="text/javascript">

    let colors = [['red', 'green', 'blue', 'orange'],                  //массив цветов
        ['yellow', 'black', 'coral', 'violet'],
        ['green', 'yellow', 'coral', 'blue'],
        ['orange', 'red', 'black', 'violet']
    ];

    let count = 0;                                                      //глобальные переменные
    let score = 0;
    let second = 0;
    let cell1,cell2;
    let x1,x2,y1,y2;



    function randC(a) {                                                 //функция перемешивает массив цветов
        for (let i = a.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));              // j - устанавливается рандомное значение
            [a[i], a[j]] = [a[j], a[i]];                                // происходит замена элементов в массиве
        }
        return a;                                                       //функция возвращает новый перемешанный массив
    }

    function game_timer() {                                             //функция игрового таймера
        second++;                                                       //переменная секунда увеличивается на 1
        setTimeout("game_timer()", 1000);                               //запускаем увеличение секунда раз в 1000мс
    }



        function draw(){                                                   //функция отрисовки игрового поля


        let table = document.createElement('table');                       // создаем элемент вида таблица

                                                                            //генерируем ячейки на экране
        for(let i = 0; i<4; i++){
            let tr = document.createElement('tr');

            for(let j=0; j<4; j++){
                let td = document.createElement('td');                     //устанавливаем значения ячеек 150х150рч
                td.style.width='150px';
                td.style.height='150px';
                td.style.background = 'grey';                              //стандартный цвет закрытых ячеек - серый
                tr.appendChild(td);
            }
            table.appendChild(tr);
        }
        document.body.appendChild(table);
        document.querySelectorAll('td').forEach(function (element) {       //каждому элементу td запускаем функцию
            element.onclick = click;                                       // при нажатии на него - click();
        });
    }



    randC(colors);                                                       //выполняем перемешивание цветов
    draw();                                                              //отрисосываем таблицу на экране
    game_timer();                                                        //запускаем игровой таймер


    function click() {                                                    //функция нажатий
        count++;                                                          //с нажатием увеличиваем счетчик на 1


        if(count==1){                                                     //если 1
            cell1 = event.target;                                         //создаем переменную cell1 равной ссылке на нажатый объект
            x1 = cell1.parentNode.rowIndex;                               //переменная х1 - позиция по row
            y1 = cell1.cellIndex;                                         // переменная y1 - позиция по cell
            cell1.style.backgroundColor = colors[x1][y1];                 // присваиваем полученной ячейке значения из массива colors
        }
        if(count==2) {                                                    //аналогично при втором нажатии создаем переменную cell2
            cell2 = event.target;
            x2 = cell2.parentNode.rowIndex;
            y2 = cell2.cellIndex;
            cell2.style.backgroundColor = colors[x2][y2];
            if (colors[x1][y1] == colors[x2][y2]) {                         //и здесь же проверяем что если значени из массива равны
                count = 0;                                                  //значит цвета совпали
                score += 1;                                                 //счетчик нажатий обнуляем, score увеличиваем на 1
            }
            if (colors[x1][y1] !== colors[x2][y2]) {                        //если не совпали
                setTimeout("cell1.style.backgroundColor = 'grey';", 500);   //устанавливаем для cell1 и cell2 дефолтные цвета
                setTimeout("cell2.style.backgroundColor = 'grey';", 500);   //делаем задержку в 500 милисекунд
                count = 0;
            }
            if (x1 == x2 && y1 == y2) {                                      //если значения выбраных элементов равны
                count = 1;                                                  //значит нажато 2 раза на одну ячейку
                score -=1;                                                  //счетчик делаем равным 1 нажатию, score обнуляем
            }
        }

        if(score==8){
            alert("Вы выиграли! Затраченое время " + second + " секунд.")
        }
    }



















    /*if(count == 2){
        this.style.backgroundColor = colors[x][y];
        value2 = colors[x][y];
        if(value1 == value2){
            count=0;
            score++;
            //console.log(score);
        }
        else
        {
            console.log(colors[i][j]);
            console.log(this.style.backgroundColor);
            score--;
            count=0;
        }
    }

    if(score == 8){
        setTimeout(Total, 1000);
        score = 0;
    }
    else if(score <= 0){
        score = 0;
        //console.log(score);
    }


*/
    
</script>
</body>
</html>