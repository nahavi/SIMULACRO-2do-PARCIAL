<?php
class MotoNacional extends Moto{

    private $porcDescuento= 0.15;

    public function __construct($cod, $costo, $aniofabr, $descr, $porcincanual, $activa,$porcDesc)
    {
        parent::__construct($cod, $costo, $aniofabr, $descr, $porcincanual, $activa);

        $this->porcDescuento=$porcDesc;
    }

    public function getPorcDescuento(){
        return $this->porcDescuento;
    }
    public function setPorcDescuento($porcdes){
        $this->porcDescuento=$porcdes;
    }

    public function __toString()
    {
        $cadena= parent::__toString();
        $cadena.="Porcentaje de descuento a la Industria Nacional: ".$this->getPorcDescuento(). "\n";

        return $cadena;
    }

// METODOS AUXILIARES

public function darPrecioVentaNacional(){
    $precioMoto=$this->darPrecioVenta();

    if($precioMoto > 0){
        $montodescuento= $precioMoto * $this->getPorcDescuento();
        $precioTotalconImp= $precioMoto - $montodescuento;

    }else{
        $precioTotalconImp=-1;
    }
    return $precioTotalconImp;
}



}