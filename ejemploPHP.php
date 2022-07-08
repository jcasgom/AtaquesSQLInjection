<?php
//Conectamos con la Base de Datos
$conn = mysql_connect("localhost","username","password");
//Construimos dinámicamente la instrucción SQL con el input
$query = "SELECT * FROM Productos WHERE Precio < '$_GET["variable"]'" . "ORDER BY Descripcion";
//Ejecutar la consulta contra la Base de Datos
$result = mysql_query($query);

//Iteramos a través de los resultados
while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
    //Mostrar resultados
    echo "Descripcion : {$row['Descripcion']} <br>" . 
         "Producto :    {$row['ProductoID']} <br>" . 
         "Precio :      {$row['Precio']} <br>";
}
?>