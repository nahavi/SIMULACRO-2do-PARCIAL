<?php
/*1. Se registra la siguiente información: código, costo, año fabricación, descripción, porcentaje
incremento anual, activa (atributo que va a contener un valor true, si la moto está disponible para la
venta y false en caso contrario).
2. Método constructor que recibe como parámetros los valores iniciales para los atributos definidos en la
clase.
3. Los métodos de acceso de cada uno de los atributos de la clase.
4. Redefinir el método toString para que retorne la información de los atributos de la clase.
5. Implementar el método darPrecioVenta el cual calcula el valor por el cual puede ser vendida una moto.
Si la moto no se encuentra disponible para la venta retorna un valor < 0. Si la moto está disponible para
la venta, el método realiza el siguiente cálculo:
$_venta = $_compra + $_compra * (anio * por_inc_anual)
donde $_compra: es el costo de la moto.
anio: cantidad de años transcurridos desde que se fabricó la moto.
por_inc_anual: porcentaje de incremento anual de la moto.*/


class Moto
{

    private $codigo;
    private $costo;
    private $aniofabricacion;
    private $descripcion;
    private $porcincrementoanual;
    private $activa;

    public function __construct($cod, $costo, $aniofabr, $descr, $porcincanual, $activa)
    {
        $this->codigo = $cod;
        $this->costo = $costo;
        $this->aniofabricacion = $aniofabr;
        $this->descripcion = $descr;
        $this->porcincrementoanual = $porcincanual;
        $this->activa = $activa;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }
    public function getCosto()
    {
        return $this->costo;
    }
    public function getAnioFabr()
    {
        return $this->aniofabricacion;
    }
    public function getDescrip()
    {
        return $this->descripcion;
    }
    public function getPorcIncrAnual()
    {
        return $this->porcincrementoanual;
    }
    public function getActiva()
    {
        return $this->activa;
    }

    public function setCodigo($cod)
    {
        $this->codigo = $cod;
    }
    public function setCosto($costo)
    {
        $this->costo = $costo;
    }
    public function setAnioFabr($afab)
    {
        $this->aniofabricacion = $afab;
    }
    public function setDescrip($descrip)
    {
        $this->descripcion = $descrip;
    }
    public function setPorcIncrAnual($porcInc)
    {
        $this->porcincrementoanual = $porcInc;
    }
    public function setActiva($act)
    {
        $this->activa = $act;
    }

    public function __toString()
    {
        return "Codigo de Moto: " . $this->getCodigo() . "\n" .
            "Costo de la Moto: " . $this->getCosto() . "\n" .
            "Año de Fabricación: " . $this->getAnioFabr() . "\n" .
            "Descripción de la Moto: " . $this->getDescrip() . "\n" .
            "Porcentaje de Incremeto Anual: " . $this->getPorcIncrAnual() . "\n" .
            "Activa: " . $this->getActiva() . "\n";
    }

// METODOS AUXILIARES
    /*5. Implementar el método darPrecioVenta el cual calcula el valor por el cual puede ser vendida una moto.
    Si la moto no se encuentra disponible para la venta retorna un valor < 0. Si la moto está disponible para
    la venta, el método realiza el siguiente cálculo:
    $_venta = $_compra + $_compra * (anio * por_inc_anual)
    donde $_compra: es el costo de la moto.
    anio: cantidad de años transcurridos desde que se fabricó la moto.
    por_inc_anual: porcentaje de incremento anual de la moto.*/

    public function darPrecioVenta()
    {
        $_venta = 0;
        $_compra = $this->getCosto();
        $anio = $this->getAnioFabr();
        $por_inc_anual = $this->getPorcIncrAnual();


        if ($this->getActiva() == false) {
            $_venta = -1;
        } else {
            $_venta = $_compra + $_compra * ($anio * $por_inc_anual);
        }
        return $_venta;
    }
}
