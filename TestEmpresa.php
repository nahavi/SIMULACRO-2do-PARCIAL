<?php

include_once ("Cliente.php");
include_once ("Moto.php");
include_once ("MotoNacional.php");
include_once ("MotoImportada.php");
include_once ("Venta.php");
include_once ("Empresa.php");

function mostrarContenido($coleccion)
{
   
    foreach ($coleccion as $unElemento) {
        echo $unElemento . "\n";
    }
   
}
//1. Cree 2 instancias de la clase Cliente: $objCliente1, $objCliente2

$objCliente1= new Cliente("Roberto","Allende","DNI",8315795,"Alta");
$objCliente2= new Cliente("Jorge","Mena","DNI",23439144,"Alta");

/*2. Cree 4 objetos Motos con la información visualizada en las siguientes tablas: código, costo, año fabricación,
descripción, porcentaje incremento anual, activo entre otros*/

$objMoto1= new Moto(11,2230000,2022,"Benelli Imperiale 400",0.85,true,0.15);
$objMoto2= new Moto(12,584000,2021,"Zanella Zr 150Ohc",0.70, true,0.15);
$objMoto3= new Moto(13,999900.2023,"Zanella Patagonian Eagle 250",0.55, false,0.15);
$objMoto4= new Moto(14,12499900,2020,"Pitbike Enduro Motocross Apollo Aiii 190cc Plr",0.100,true,"Francia",6244400);

/*3. Se crea un objeto Empresa con la siguiente información: denominación =” Alta Gama”, dirección= “Av
Argenetina 123”, colección de motos= [$obMoto11, $obMoto12, $obMoto13, $obMoto14] , colección de clientes
= [$objCliente1, $objCliente2 ], la colección de ventas realizadas*/

$colMotos=[$objMoto1,$objMoto2,$objMoto3,$objMoto4];
$colClientes=[$objCliente1,$objCliente2];

$objEmpresa= new Empresa("Alta Gama","Av.Argwntina 123",$colClientes,$colMotos,[]);

/*4. Invocar al método registrarVenta($colCodigosMoto, $objCliente) de la Clase Empresa donde el $objCliente es una
referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de códigos
de motos es la siguiente [11,12,13,14]. Visualizar el resultado obtenido.*/

$venta=$objEmpresa->registrarVenta([11,12,13,14],$objCliente2);
//echo $venta;

/*5. Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el $objCliente es
una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de
códigos de motos es la siguiente [13,14]. Visualizar el resultado obtenido.*/

$venta=$objEmpresa->registrarVenta([13,14],$objCliente2);
//echo $venta;

/*6. Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el $objCliente es
una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de
códigos de motos es la siguiente [14,2]. Visualizar el resultado obtenido*/

$venta=$objEmpresa->registrarVenta([14,2],$objCliente2);
//echo $venta;

//7. Invocar al método informarVentasImportadas(). Visualizar el resultado obtenido.
$ventasImportadas=$objEmpresa->informarVentasImportadas();
mostrarContenido($ventasImportadas);

//8. Invocar al método informarSumaVentasNacionales(). Visualizar el resultado obtenido.

$sumaVentasNacionales=$objEmpresa->informarSumaVentasNacionales();
echo $sumaVentasNacionales;

//9. Realizar un echo de la variable Empresa creada en 2.

echo $objEmpresa;