<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"> 
    <title>Calculadora</title>
    
    <!-- Estilos -->
    <style>        
body {
    padding: 0;
    margin: 0;
    background: linear-gradient(to right, #00AAFF, #00FF6C);
}

.calculadora-grilla {
    display: grid;
    justify-content: center;
    align-content: center;
    min-height: 100vh;
    grid-template-columns: repeat(4, 100px);
    grid-template-rows: minmax(120px, auto) repeat(5, 100px);
}

.calculadora-grilla > button {
    cursor: pointer;
    font-size: 2rem;
    border: 1px solid white;
    outline: none;
    background-color: rgba(255, 255, 255, .75);
}

.output {
    grid-column: 1 / -1;
    background-color: rgba(0, 0, 0, .75);
    display: flex;
    align-items: flex-end;
    justify-content: space-around;
    flex-direction: column;
    padding: 5px;
    word-wrap: break-word;
    word-break: break-all; 
}

.output .display {
    color: black;
    font-size: 1.85rem;
    text-align: right;
}

.calculadora-grilla > button:hover {
    background-color: rgba(255, 255, 255, .9);
}

.titulo{
    color: #1A5276;
    font-size: 20px;
    font-family: arial;
    font-weight: 900;
    text-align: center;
}
.nombre{
    text-align: center;
    margin-right: 120px;
}
    </style>
</head>
<body>
    <h3 class="titulo">Calculadora Básica</h3>
    
    <div class="calculadora-grilla">

        <div class="output">
            <input class="display" type="text" id="result" placeholder="0">
        </div>

        <button name="data-number">1</button>
        <button name="data-number">2</button>
        <button name="data-number">3</button>
        <button name="data-opera">+</button>
        <button name="data-number">4</button>
        <button name="data-number">5</button>
        <button name="data-number">6</button>
        <button name="data-opera">-</button>
        <button name="data-number">7</button>
        <button name="data-number">8</button>
        <button name="data-number">9</button>
        <button name="data-opera">/</button>
        <button name="data-delete">C</button>
        <button name="data-number">0</button>
        <button name="data-igual">=</button>
        <button name="data-opera">x</button>

    </div>
    
    <!-- Funcionalidad-->

    <script>        
        const botonNumeros = document.getElementsByName('data-number');
        const botonOpera = document.getElementsByName('data-opera');
        const botonIgual = document.getElementsByName('data-igual')[0];
        const botonDelete = document.getElementsByName('data-delete')[0];
        var result = document.getElementById('result');

        var opeActual ='';
        var opeAnterior ='';
        var operacion =undefined;

        botonNumeros.forEach(function(boton) {
            boton.addEventListener('click', function(){
                agregarNumero(boton.innerText);        
            })
        });

        botonOpera.forEach(function(boton) {
            boton.addEventListener('click', function(){
                selectOperacion(boton.innerText);        
            })
        });

        botonIgual.addEventListener('click', function(){
            calcular();
            actualizarDisplay();
        });

        botonDelete.addEventListener('click', function(){
            clear();
            actualizarDisplay();
        });

        function selectOperacion(op) {
            if(opeActual ==='')return;
            if(opeAnterior !==''){
                calcular()
            }
            operacion = op.toString();
            opeAnterior = opeActual;
            opeActual = '';
        }

        function calcular() {
            var calculo;
            const anterior = parseFloat(opeAnterior);
            const actual = parseFloat(opeActual);
            if(isNaN(anterior) || isNaN(actual)) return;
            switch(operacion){
                case '+':
                    calculo= anterior+actual;
                    break;
                case '-':
                    calculo= anterior-actual;
                    break;
                case 'x':
                    calculo= anterior*actual;
                    break;
                case '/':
                    calculo= anterior/actual;
                    break;
                default:
                    return;
            }
            opeActual=calculo;
            operacion=undefined;
            opeAnterior='';
        }

        function agregarNumero(num) {
            opeActual = opeActual.toString() + num.toString();
            actualizarDisplay();
        }

        function clear(){
            opeActual= '';
            opeAnterior='';
            operacion=undefined;
        }

        function actualizarDisplay() {
            result.value= opeActual;
        }

        clear();
    </script>
    

</body>
</html>