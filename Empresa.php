<?php
/*1. Se registra la siguiente información: denominación, dirección, la colección de clientes, colección de
motos y la colección de ventas realizadas.
2. Método constructor que recibe como parámetros los valores iniciales para los atributos de la clase.
3. Los métodos de acceso para cada una de las variables instancias de la clase.
4. Redefinir el método _toString para que retorne la información de los atributos de la clase.*/

class Empresa
{

    private $denominacion;
    private $direccion;
    private $colClientes;
    private $colMotos;
    private $colVentas;

    public function __construct($denom, $dir, $colC, $colM, $colV)
    {
        $this->denominacion = $denom;
        $this->direccion = $dir;
        $this->colClientes = $colC;
        $this->colMotos = $colM;
        $this->colVentas = $colV;
    }


    public function getDenominacion()
    {
        return $this->denominacion;
    }
    public function getDireccion()
    {
        return $this->direccion;
    }
    public function getColClientes()
    {
        return $this->colClientes;
    }
    public function getColMotos()
    {
        return $this->colMotos;
    }
    public function getColVentas()
    {
        return $this->colVentas;
    }

    public function setDenominacion($denom)
    {
        $this->denominacion = $denom;
    }
    public function setDireccion($dir)
    {
        $this->direccion = $dir;
    }
    public function setColClientes($colcli)
    {
        $this->colClientes = $colcli;
    }
    public function setColMotos($colmot)
    {
        $this->colMotos = $colmot;
    }
    public function setColVentas($colven)
    {
        $this->colVentas = $colven;
    }

    public function __toString()
    {
        return "Nombre de la Empresa: " . $this->getDenominacion() . "\n" .
            "Dirección de la Empresa: " . $this->getDireccion() . "\n" .
            "Clientes de la Empresa: \n" . $this->retornarCadena($this->getColClientes()) . "\n" .
            "Detalle Motos: \n" . $this->retornarCadena($this->getColMotos()) . "\n" .
            "Ventas realizadas por la Empresa: " . $this->retornarCadena($this->getColVentas()) . "\n";
    }

    //METODOS AUXILIARES

    public function retornarCadena($coleccion)
    {
        $cadena = "";

        foreach ($coleccion as $unElemento) {
            $cadena = $cadena . " " . $unElemento;
        }
        return $cadena;
    }
    /*5. Implementar el método retornarMoto($codigoMoto) que recorre la colección de motos de la Empresa y
    retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro*/

    public function retornarMoto($codigoMoto)
    {
        $todaslasmotos = $this->getColMotos();
        $codigoencontrado = false;
        $i = 0;
        while ($i < count($todaslasmotos) && !$codigoencontrado) {
          
            $objMoto = $todaslasmotos[$i];
     
            if ($objMoto->getCodigo() == $codigoMoto) {
                $codigoencontrado = true;
            }
         
            $i++;
        }
        return $objMoto;
    }


    /*6. Implementar el método registrarVenta($colCodigosMoto, $objCliente) método que recibe por
    parámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colección
    se busca el objeto moto correspondiente al código y se incorpora a la colección de motos de la instancia
    Venta que debe ser creada. Recordar que no todos los clientes ni todas las motos, están disponibles
    para registrar una venta en un momento determinado.
    El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la
    venta*/

    public function registrarVenta($colCodigosMoto, $objCliente)
    {

        $precioTotalfinal = 0;

        if ($objCliente->getEstado() == "Alta") {//solo controlo cliente porque Moto Activa ya fue controlada en el metodo darPrecioVenta que
                                    //se utiliza en el metodo incorporarMoto
            $motosDisponiblesVenta = [];
          
            $coleccionVentas=$this->getColVentas();
            $numVenta = count($coleccionVentas) + 1; //genero numero de venta
            $nuevaVenta = new Venta($numVenta, date("m/d/a"), $objCliente, $motosDisponiblesVenta,0);

            
            foreach ($colCodigosMoto as $unCodigo) { //recorro la coleccion  de codigos para obtener uno a uno los codigos
                $objMoto = $this->retornarMoto($unCodigo); //le paso el codigo obtenido al metodo para que me de un objeto moto

                if ($objMoto != null) { //llamo al metodo porque es el q controla que este Activa
                   $nuevaVenta->incorporarMoto($objMoto);
                }
            }

                if (count($nuevaVenta->getColMotos()) > 0) {
                $coleccionVentas = $this->getColVentas();
            
                array_push($coleccionVentas, $nuevaVenta);
                $this->setColVentas($coleccionVentas);
                $precioTotalfinal= $nuevaVenta->getPrecioFinal();
            }
        } else {

            $precioTotalfinal = -1;
        }
        return $precioTotalfinal;
    }


    /*7 Implementar el método retornarVentasXCliente($tipo,$numDoc) que recibe por parámetro el tipo y
    número de documento de un Cliente y retorna una colección con las ventas realizadas al cliente.*/

    public function retornarVentasxCliente($tipo, $numDoc)
    {
        $todaslasVentas = $this->getColVentas(); //la coleccion de ventas tiene todos los datos
        $ventasXCliente = []; //se debe armar una coleccion de ventas por cliente

        foreach ($todaslasVentas as $unaVenta) { //recorro la coleccion
            $clienteVenta=$unaVenta->getObjCliente();
            $tipodocClienteVenta=$clienteVenta->getTipodoc() ;
            $numdocClienteVenta=$clienteVenta->getTipodoc();

            if( $tipodocClienteVenta == $tipo &&  $numdocClienteVenta == $numDoc){
            array_push($ventasXCliente, $unaVenta); //si coincide voy llenando la coleccion
            }
        }
        return $ventasXCliente;
    }
    /*1. Implementar el método informarSumaVentasNacionales() que recorre la colección de ventas realizadas por la
    empresa y retorna el importe total de ventas Nacionales realizadas por la empresa.*/

    public function informarSumaVentasNacionales()
    {

        $coleccionVentas = $this->getColVentas();
        $importeTotalVentasNacionales = 0;

        foreach ($coleccionVentas as $unaVenta) {
            //una venta tiene una coleccion de motos
            //por lo tanto puedo llamar al metodo  retornarTotalVentaNacional()

            $preciounaVenta = $unaVenta->retornarTotalVentaNacional();  //obtengo la suma de las motos nacionales                  
            $importeTotalVentasNacionales =  $importeTotalVentasNacionales + $preciounaVenta;
        }
        return  $importeTotalVentasNacionales;
    }


    /*2. Implementar el método informarVentasImportadas() que recorre la colección de ventas realizadas por la empresa y
    retorna una colección de ventas de motos importadas. Si en la venta al menos una de las motos es importada la
    venta debe ser informada.*/


    public function informarVentasImportadas()
    {
        $motosImportadas = [];
        $totalVentaImportadas=0;
        $coleccionVentasImportadas=[];
        $coleccionVentas = $this->getColVentas();
        foreach ($coleccionVentas as $unaVenta) {
            //recorro la coleccion de ventas para obtener de cada venta, la coleccion de motos
            $coleccionMotosunaVenta = $unaVenta->getColMotos();
            $motosImportadas = [];
            foreach ($coleccionMotosunaVenta as $unaMotounaVenta) {
                //recorro la coleccion de motos de una venta para obtener su pais de origen
                $origen = $unaMotounaVenta->getPaisOrigen();

                if ($origen != null) {
                    //si la moto es importada, la agrego a una coleccion de motos importadas
                    array_push($motosImportadas, $unaMotounaVenta);
                    array_push($coleccionVentasImportadas,$unaVenta);
                }
            }
                   }

        //recorro la coleccion de motos importadas para acumular su precio

        foreach ($motosImportadas as $unaMotoImportada){
            $preciounaMotoImportada=$unaMotoImportada->darPrecioVentaImportada();//llamo al metodo
            $totalVentaImportadas=$totalVentaImportadas + $preciounaMotoImportada;

        }
        return  $coleccionVentasImportadas;
    }
}
