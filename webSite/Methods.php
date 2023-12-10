<?php

function title(){
    echo "Marcos Fernandez Avendaño";
    echo "<br>";
    echo "Fernando Alonso Diaz";
    echo "<br>";
    echo "EJERCICIO PISOS PHP";
}


function spaces() {
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
}

class Database{
    private $host = 'localhost';
    private $port = '5434';
    private $dbname = 'postgres';
    private $usuario = 'postgres';
    private $password = 'postgres';
    private $conexion;

    // Método para obtener la conexión a la base de datos
    public function getConnection() {
        try {
            $this->conexion = new PDO("pgsql:host={$this->host};port={$this->port};dbname={$this->dbname}", $this->usuario, $this->password);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conexion;
        } catch(PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
            return null;
        }
    }

    /**
     * This method reads the file and shows the content
     * @param file here we have the file with the zones
     * @return void
     */
    function readZones($file){
        if(!$file) {
            echo "Could not open the file";
        }else{
            while (!feof($file)){
                $line = fgets($file);//we read the file line by line

                //now we have to do a split of the line with the character "_"
                $lineSplit = explode("_", $line);
                echo"  ".$lineSplit[0];
                echo"   ". $lineSplit[1];
                echo "   ".$lineSplit[2]. "<br>";
                $this->getProperties($lineSplit[0]);

            }
        }

    }

    function getProperties($zoneCode) {
        //Create the query to get all the properties with the zone code
        $query = "SELECT * FROM propiedades WHERE codz = '$zoneCode'";
        //we get the connection
        $connection = $this->getConnection();
        //we prepare the query
        $statement = $connection->prepare($query);
        //we execute the query
        $statement->execute();
        //we get the result
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $row){
            echo "  ".$row['codp'];
            echo "<br>";
        }


    }
}
