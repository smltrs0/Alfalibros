<?php 

	class venta
	{
		private $connection;
		private $cliente;
		private $libro;
		private $precio;
		private $cantidad;
		private $forma_de_pago;
		private $precio_neto;
		private $id_factura;

		public function set_values($cliente, $libro, $cantidad, $forma_de_pago)
		{
			if(!empty($cliente) && !empty($libro) && !empty($cantidad) && !empty($forma_de_pago))
			{
				if(ctype_digit($cliente) && ctype_digit($libro) && ctype_digit($cantidad) && ctype_digit($forma_de_pago))
				{
					if(check::set_id('cliente',$cliente) && check::set_id('info_libro',$libro) && check::set_id('forma_de_pago',$forma_de_pago))
					{
						if(check::disponibilidad_cantidad_pedido($libro,$cantidad))
						{
							$this->cliente = cleaning::input($cliente);
							$this->libro = cleaning::input($libro);
							$this->precio = get::price_libro($libro);
							$this->cantidad = cleaning::input($cantidad);
							$this->forma_de_pago = cleaning::input($forma_de_pago);
							$this->precio_neto = $this->precio * $this->cantidad;

							return true;
						}
						else
						{
							die('NO HAY LIBROS DISPONIBLES');

							// return false;
						}
					}
					else
					{
						if(!check::set_id('cliente',$cliente))
						{
							die('EL CLIENTE NO EXISTE');
						}

						if(!check::set_id('info_libro',$libro))
						{
							die('EL LIBRO NO EXISTE');
						}

						if(!check::set_id('forma_de_pago',$forma_de_pago))
						{
							die('LA FORMA DE PAGO NO EXISTE');
						}
					}					
				}
				else
				{
					die('LOS VALORES NO SON NUMERICOS');
					// return false;
				}
			}
			else
			{
				die('NO PUEDEN EXISTIR CAMPOS VACIOS');
				// return false;
			}
		}

		public function save_on_db()
		{
			if(!$this->connection)
			{
				$this->connection = db_connector::get_connection();
			}

			$fecha = get::today_date();

			$sentencia = $this->connection->prepare('INSERT INTO factura
													 VALUES(NULL,:cliente,:forma_de_pago,:fecha_facturacion, NULL, NULL)');

			$sentencia->execute(array(':cliente'			=> $this->cliente,
									  ':forma_de_pago'		=> $this->forma_de_pago,
									  'fecha_facturacion'	=> $fecha));

			$id_factura = get::last_id('factura');

			$sentencia = $this->connection->prepare('INSERT INTO venta
													 VALUES(:id_factura,:id_info_libro,:cantidad,:total)');

			$sentencia->execute(array(':id_factura'		=> $id_factura,
									  ':id_info_libro'	=> $this->libro,
									  ':cantidad'		=> $this->cantidad,
									  ':total'			=> $this->precio_neto));

			$iva = $this->precio_neto * 0.12;

			$sentencia = $this->connection->prepare('UPDATE factura
													 SET IVA 			= :iva,
													 	 total_factura	= :total_factura
													 WHERE id_factura 	= :id_factura ');

			$total_factura = $iva + $this->precio_neto;

			$sentencia->execute(array(':iva'			=> $iva,
									  ':total_factura'	=> $total_factura,
									  ':id_factura'		=> $id_factura));

			
			finanzas::save_on_db($total_factura,0);

			$cantidad_libro = get::cantidad_libro($this->libro);

			$cantidad_post_venta = $cantidad_libro - $this->cantidad;

			$sentencia = $this->connection->prepare('UPDATE info_libro
													 SET cantidad = :cantidad_post_venta
													 WHERE id_info_libro = :id_info_libro');

			$sentencia->execute(array(':cantidad_post_venta'	=> $cantidad_post_venta,
									  ':id_info_libro'			=> $this->libro));
		}


		public function registrar_factura($cliente,$forma_de_pago)
		{
			# codigo de la insercion
			
			return $stm->lastInsertId();
		}
		
		public function registrar_detalles_factura($id_factura,$cantidad,$libro)
		{	
			// Este es el id regresado luego de hacer la insercion correctamente en la tabla factura
			// 
			# Ejemplo de insert...
			   $database = $connection;
		      	$sql=  "INSERT INTO detalles_factura () VALUES (:id_factura, :cantidad)";
		        $query = $database->prepare($sql);
		       $query->execute(array(':id_factura' => $id_factura, ':cantidad' => $cantidad));	


	 			 $stmt = $db->stmt_init(); 
	 			 $stmt->prepare("INSERT INTO mitabla (fld1, fld2, fld3, fld4) VALUES(?, ?, ?, ?)"); foreach($myarray as $row) 
	 			 { 
	 			 	$stmt->bind_param('idsb', 
	 			 		$row['fld1'], $row['fld2'], 
	 			 		$row['fld3'], $row['fld4']); 
	 			 	$stmt->execute(); 
	 			 } 
	 			 	$stmt->close(); 
		}



    /* Initializing Database Information */

    var $host = 'localhost';
    var $user = 'root';
    var $pass = '';
    var $database = "database";
    var $dbh;

    /* Connecting Datbase */

    public function __construct(){
        try {
            $this->dbh = new PDO('mysql:host='.$this->host.';dbname='.$this->database.'', $this->user, $this->pass);
            //print "Connected Successfully";
        } 
        catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
/* Insert Multiple Rows in a table */

    public function insertMultiple($table,$rows){

        $this->dbh->beginTransaction(); // also helps speed up your inserts.
        $insert_values = array();
        foreach($rows as $d){
            $question_marks[] = '('  . $this->placeholders('?', sizeof($d)) . ')';
            $insert_values = array_merge($insert_values, array_values($d));
            $datafields = array_keys($d);
        }

        $sql = "INSERT INTO $table (" . implode(",", $datafields ) . ") VALUES " . implode(',', $question_marks);

        $stmt = $this->dbh->prepare ($sql);
        try {
            $stmt->execute($insert_values);
        } catch (PDOException $e){
            echo $e->getMessage();
        }
        return $this->dbh->commit();
    }

    /*  placeholders for prepared statements like (?,?,?)  */

    function placeholders($text, $count=0, $separator=","){
        $result = array();
        if($count > 0){
            for($x=0; $x<$count; $x++){
                $result[] = $text;
            }
        }

        return implode($separator, $result);
    }


	}


?>