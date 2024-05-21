<?php
/*En la clase Cliente:
0. Se registra la siguiente información: nombre, apellido, si está o no dado de baja, el tipo y el número de
documento. Si un cliente está dado de baja, no puede registrar compras desde el momento de su baja.
1. Método constructor que recibe como parámetros los valores iniciales para los atributos.
2. Los métodos de acceso de cada uno de los atributos de la clase.
3. Redefinir el método _toString para que retorne la información de los atributos de la clase.*/

class Cliente
{

    //ATRIBUTOS

    private $nombre;
    private $apellido;
    private $estado;
    private $tipodocumento;
    private $numdocumento;

    //METODO CONSTRUCTOR

    public function __construct($name, $adress,$tipodoc, $numdoc,$estado)
    {

        $this->nombre = $name;
        $this->apellido = $adress;
        $this->estado = $estado;
        $this->tipodocumento = $tipodoc;
        $this->numdocumento = $numdoc;
    }

    //METODOS DE ACCESO

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function getTipodoc()
    {
        return $this->tipodocumento;
    }

    public function getNumdoc()
    {
        return $this->numdocumento;
    }

    //METODOS DE MODIFICACION

    public function setNombre($nom)
    {
        $this->nombre = $nom;
    }
    public function setApellido($apell)
    {
        $this->apellido = $apell;
    }
    public function setEstado($est)
    {
        $this->estado = $est;
    }
    public function setTipodoc($tdoc)
    {
        $this->tipodocumento = $tdoc;
    }
    public function setNumdoc($ndoc)
    {
        $this->numdocumento = $ndoc;
    }

    // METODO DE TRANSFORMACION CADENA

    public function __toString()
    {
        return "Nombre: " . $this->getNombre() . "\n" .
            "Apellido: " . $this->getApellido() . "\n" .
            "Estado: " . $this->getEstado() . "\n" .
            "Tipo de documento: " . $this->getTipodoc() . "\n" .
            "Numero de documento: " . $this->getNumdoc() . "\n";
    }
}
