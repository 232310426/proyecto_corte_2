<?php
//Clase solicitada, representa una fracción matemática, con sus atributos en privado
class Fraccion{
    private int $numerador;
    private int $denominador;
    
    //Constructor: inicializará la fracción y la simplifica
    public function __construct(int $numerador, int $denominador) {
        if($denominador <= 0 || $numerador <= 0 ) {
            throw new Exception("El numerador y denominador deben ser mayores a 0.");
        }

        $this->numerador = $numerador;
        $this->denominador = $denominador;
        $this->simplificar(); //Siempre guarda la fracción simplificada
    }

    //getters solicitados
    public function getNumerador(): int{
        return $this->numerador;
    }
    public function getDenominador(): int{
        return $this->denominador; 
    }
//Setters solicitados. (valida que sea mayor que 0)
    public function setNumerador(int $numerador): void {
        if($numerador <= 0) throw new Exception("Numerador debe ser mayor a 0. ");
        $this->numerador = $numerador;
        $this->simplificar();
    }

    public function setDenminador(int $denominador): void {
        if($denominador <= 0) throw new Excepcion("Denominador debe ser mayor a 0. ");
        $this->denominador = $denominador;
        $this->simplificar();
    }

    //Returna la fracción como cadena de texto (4/8)
    public function toString(): string{
        return "{$this->numerador}/{$this->denominador}";
    }

    //Calcula el maximo comun divisor 
    private function mcd($a, $b): int {
        return $b == 0 ? $a : $this->mcd($b, $a % $b);
    }

    /*Simplifica la fracción dividiendo numerador y denominador 
    entre sus MCD (Máximo Común Divisor)*/
    public function simplificar(): void {
        $mcd = $this->mcd($this->numerador, $this->denominador);
        $this->numerador /=$mcd;
        $this->denominador /=$mcd;
   
    }
    
    //Realiza la operación de suma retornando una fracción nueva
    public function sumar(Fraccion $f): Fraccion {
        $num = $this->numerador * $f->denominador + $f->numerador * $this->denominador;
        $den = $this->denominador * $f->denominador;
        return new Fraccion($num, $den);
    }

    //Realiza la operación de Resta retornando una fracción nueva
    public function restar(Fraccion $f): Fraccion {
        $num = $this->numerador * $f->denominador - $f->numerador * $this->denominador;
        $den = $this->denominador * $f->denominador;
        return new Fraccion(abs($num), $den); 
    }

    //Realiza la operación de Multiplicación retornando una fracción nueva
    public function multiplicar(Fraccion $f): Fraccion {
        return new Fraccion($this->numerador * $f->numerador, $this->denominador * $f->denominador);
    }

    //Realiza la operación de División retornando una fracción nueva
    public function dividir(Fraccion $f): Fraccion {
        return new Fraccion($this->numerador * $f->denominador, $this->denominador * $f->numerador);
    }

    //compara fracciones para verificar que sean iguales
    public function esIgual(Fraccion $f): Fraccion {
        return $this->numerador == $f->numerador && $this->denominador == $f->denominador;
    }

    //Retorna fracciones nuevas equivalentes multiplicando num y den por el mismo numero
    public function convertirEquivalente(int $multiplicador): Fraccion {
        return new Fraccion($this->numerador * $multiplicador, $this->denominador * $multiplicador);
    }
}