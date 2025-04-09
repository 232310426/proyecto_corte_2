<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<?php
require_once 'Fraccion.php'; //se incluye la clase fracción

try {
    //Crea 2 objetos Fracción con los valores recibidos con el POST
    $f1 = new fraccion($_POST['num1'], $_POST['den1']);
    $f2 = new fraccion($_POST['num2'], $_POST['den2']);
    $op = $_POST['operacion'];

    //Realiza la operación solicitada
    switch ($op) {
        case 'sumar':
            $res = $f1->sumar($f2);
            echo"Resultado de la Suma: " . $res->toString();
            break;
        
        case 'restar':
            $res = $f1->restar($f2);
            echo"Resultado de la Resta: " . $res->toString();
            break;
    
        case 'multiplicar':
            $res = $f1->multiplicar($f2);
            echo"Resultado de la Multiplicación: " . $res->tostring();
            break;
        
        case 'dividir':
            $res = $f1->dividir($f2);
            echo"Resultado de la División: " . $res->toString();
            break;

        case 'comparar':
            echo $f1->esIgual($f2) ? "Las Fracciones son equivalentes. " : "Las Fracciones no son equivalentes. ";
            break;
        
        case 'equivalente':
            $equiv1 = $f1->convertirEquivalente(2);
            $equiv2 = $f2->convertirEquivalente(2);
            echo "Fracción 1 equivalente (x2): " . $equiv1->toString() . "<br>";
            echo "Fracciób 2 equivalente (x2): " . $equiv2->toString();
            break;
        default:
            echo "Operación no válida. ";
    }
} catch (Exception $e) {
    //Manejo de errores
    echo "Error: " . $e->getMessage();
}
?>
 <a href="index.html"><button class="btn-volver">Volver</button></a>
</body>
</html>