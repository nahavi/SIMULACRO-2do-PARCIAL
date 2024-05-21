<?php

class MotoImportada extends Moto{

private $paisOrigen;
private $impuestoImportacion;

                            //CONSTRUCTOR de MOTOIMPORTADA
public function __construct($cod, $costo, $aniofabr, $descr, $porcincanual, $activa,$paisOrigen,$impuestoImportacion)
{
                        //INVOCAMOS CONSTRUCTOR DE LA CLASE MOTO
    parent::__construct($cod, $costo, $aniofabr, $descr, $porcincanual, $activa);

        //AGREGAMOS NUEVOS ATRIBUTOS
    $this-> paisOrigen=$paisOrigen;
    $this-> impuestoImportacion=$impuestoImportacion;
}

//METODO DE ACCESO

public function getPaisOrigen(){
    return $this->paisOrigen;
}
public function getImpuetsoImportacion(){
    return $this->impuestoImportacion;
}

//METODO DE SETEO

public function setPaisOrigen($porig){
     $this->paisOrigen=$porig;
}
public function setImpuetsoImportacion($impimp){
     $this->impuestoImportacion=$impimp;
}

//METODO

public function __toString()
{
    $cadena=parent::__toString();
    $cadena.= " Pais de Origen: " .$this->getPaisOrigen().
              " Impuesto a la Importacion: ".$this->getImpuetsoImportacion();

              return $cadena;
}


//METODOS AUXILIARES

public function darPrecioVentaImportada(){
    $precioMoto=$this->darPrecioVenta();

    if($precioMoto > 0){
        $precioTotalconImp= $precioMoto + $this->getImpuetsoImportacion();

    }else{
        $precioTotalconImp=-1;
    }
    return $precioTotalconImp;
}




}



