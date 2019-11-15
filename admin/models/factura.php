<?php
include_once 'db_connector.php';
class factura extends db_connector
{
	public function __construct()
	{
		$this->db_connection();
		//$connection = parent::db_connection()
	}

	public function get_all()
	{
		$query = "SELECT * FROM factura ";
		$statement = $this->connection->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	public function get_factura($id)
	{
			$sentencia = $this->connection->prepare(
					"SELECT f.fecha_facturacion, f.IVA, df.cantidad,  
					df.precio, c.documento , c.nombre ,c.apellido ,
					c.direccion, c.telefono, l.titulo, a.autor
					FROM factura AS f
					INNER JOIN detalles_factura AS df ON f.id_factura = df.id_factura
					INNER JOIN cliente AS c ON f.id_cliente = c.id
					INNER JOIN libro AS l ON df.id_producto = l.id_libro 
					INNER JOIN autor AS a on l.id_autor = a.id_autor WHERE f.id_factura = $id"
				);
				$sentencia->execute();
				$result = $sentencia->fetchAll(PDO::FETCH_ASSOC);

				return $result;
	}
			







}


?>