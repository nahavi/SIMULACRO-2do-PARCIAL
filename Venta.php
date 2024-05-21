<?php

class Venta
{

    private $numero;
    private $fecha;
    private $objCliente;
    private $colMotos;
    private $precioFinal;

    public function __construct($num, $fecha, $objCliente, $colMotos, $precioFinal)
    {
        $this->numero = $num;
        $this->fecha = $fecha;
        $this->objCliente = $objCliente;
        $this->colMotos = $colMotos;
        $this->precioFinal = $precioFinal;
    }

    public function getNumero()
    {
        return $this->numero;
    }
    public function getFecha()
    {
        return $this->fecha;
    }
    public function getObjCliente()
    {
        return $this->objCliente;
    }
    public function getColMotos()
    {
        return $this->colMotos;
    }
    public function getPrecioFinal()
    {
        return $this->precioFinal;
    }

    public function setNumero($num)
    {
        $this->numero = $num;
    }
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }
    public function setObjCliente($ocli)
    {
        $this->objCliente = $ocli;
    }
    public function setColMotos($colmot)
    {
        $this->colMotos = $colmot;
    }
    public function setPrecioFinal($precf)
    {
        $this->precioFinal = $precf;
    }

    public function __toString()
    {
        return "Numero de Venta: " . $this->getNumero() . "\n" .
            "Fecha de Venta: " . $this->getFecha() . "\n" .
            "Cliente: " . $this->getObjCliente() . "\n" .
            "Detalle de las Motos Vendidas: " . $this->retornarCadena($this->getColMotos()) . "\n" .
            "Precio Total de la Venta: " . $this->getPrecioFinal() . "\n";
    }

    //METODOS AUXILIARES

    //metodo que devuelve una cadena de la coleccion

    public function retornarCadena($coleccion)
    {
        $cadena = "";

        foreach ($coleccion as $unElemento) {
            $cadena = $cadena . " " . $unElemento;
        }
        return $cadena;
    }



    /*5. Implementar el método incorporarMoto($objMoto) que recibe por parámetro un objeto moto y lo
    incorpora a la colección de motos de la venta, siempre y cuando sea posible la venta. El método cada
    vez que incorpora una moto a la venta, debe actualizar la variable instancia precio final de la venta.
    Utilizar el método que calcula el precio de venta de la moto donde crea necesario.*/
   
    public function incorporarMoto($objMoto)
    {
         
        if($objMoto->getActiva()){
            $coleccionMotos=$this->getColMotos();
            array_push($coleccionMotos,$objMoto);
            $this->setColMotos($coleccionMotos);
            //llamo al metodo darPrecioVenta y acumulo el valor da la factura

            $precioMoto=$objMoto->darPrecioVenta();
            $precioFinal=$this->getPrecioFinal();
            $precioFinal=$precioFinal + $precioMoto;
            $this->setPrecioFinal($precioFinal);
        }         
    }

    /*1. Implementar el método retornarTotalVentaNacional() que retorna la sumatoria del precio venta de cada una de las
    motos Nacionales vinculadas a la venta.*/


    public function retornarTotalVentaNacional()
    {

        $precioTotalNacional = 0;
        $coleccionMotos = $this->getColMotos();

        foreach ($coleccionMotos as $unaMoto) {

            if ($unaMoto->getPaisOrigen() == null) {
                $preciounaMotoNacional = $unaMoto->darPrecioVentaNacional();
                $precioTotalNacional =  $precioTotalNacional + $preciounaMotoNacional;
            }
        }
        return $precioTotalNacional;
    }

    /*2. Implementar el método retornarMotosImportadas() que retorna una colección de motos importadas vinculadas a la
    venta. Si la venta solo se corresponde con motos Nacionales la colección retornada debe ser vacía.*/

    public function retornarMotosImportadas()
    {

        $coleccionMotos = $this->getColMotos();
        $coleccionimportadas = [];

        foreach ($coleccionMotos as $unaMoto) {
            $motoImp = $unaMoto->getPaisOrigen();

            if ($motoImp != null) {
                array_push($coleccionimportadas, $unaMoto);
            }
        }
        return $coleccionimportadas;
    }
}
