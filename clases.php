<?php

    class Creador{
        //    ATRIBUTOS
        public static $cantidad;
        public const ciudad = "Ciudad Porcentaje";
        private static $porcentajes = [
            "policias" => 0.05,
            "tenderos" => 0.1,
            "concejales" => 0.02,
            "ciudadanos" => 0.83
        ];
    
        //    METODOS
        public static function crearCiudad(){
            $poblaciones = self::$porcentajes;

            //echo var_dump($poblaciones);
            
            foreach ($poblaciones as $key => $value) {
                $poblaciones[$key] = round($value * self::$cantidad);
            }

            echo 
            "<div class='contenedor_ciudad'>";
                foreach ($poblaciones as $tipo => $poblacion) {
                    if($poblacion > 0){
                        echo "<div class='fila_ciudad'>";
                        echo "<div class='tipo_poblacion'>$tipo</div>";
                        echo "<div class='poblacion'>";
                        for ($i = 1; $i <= $poblacion; $i++) { 
                            switch ($tipo) {
                                case 'policias':
                                    (new Policia($i)) -> mostrarInfo();
                                    break;
                                case 'tenderos':
                                    (new Tendero($i)) -> mostrarInfo();
                                    break;
                                case 'concejales':
                                    (new Concejal($i)) -> mostrarInfo();
                                    break;
                                case 'ciudadanos':
                                    (new Ciudadano($i)) -> mostrarInfo();
                                    break;
                            }
                        }
                        echo "</div>
                        </div>";
                    }
                }
            echo"
            </div>";
        }
    
        //    GETTERS

        //    SETTERS
        public static function setCantidad($cantidad){
            self::$cantidad = $cantidad;
        }

        public function getPorcentaje($tipo){
            return self::$porcentajes[$tipo];
        }

        public function getPorcentajes(){
            return self::$porcentajes;
        }
    
    }

    class Ciudadano{
        //    ATRIBUTOS
        protected $nombre, $voto, $riqueza;
    
        //    CONSTRUCTOR Y DESTRUCTOR
        public function __construct($numero){
            if($numero !== null){
                $this -> nombre = "Ciudadano ".$numero;
            }
            $this -> voto = rand(1, 4) < 4 ? 1 : 0;
            $this -> riqueza = rand(0, 10000);
        }
    
        //    METODOS
        public function mostrarInfo(){
            $params = get_object_vars($this);
            echo "
                <div class='persona'>
                    <div class='nombre'>".$params["nombre"]."</div>
                    <div class='datos'>";
            foreach ($params as $key => $value) {
                if($key != "nombre"){
                    echo "
                        <div class='dato'>
                            <span class='clave'>".$key.":</span>
                            <span class='valor'>".$value."</span>
                        </div>
                    ";
                }
            }
            echo "
                    </div>
                </div>
            ";
        }
    
        //    GETTERS
        
    
        //    SETTERS
        public function setNombre($nombre){
            $this -> nombre = $nombre;
        }
    
    }

    class Policia extends Ciudadano{
        //    ATRIBUTOS
        protected $seguridad;
    
        //    CONSTRUCTOR Y DESTRUCTOR
        public function __construct($numero){
            parent::__construct(null);
            $this -> nombre = "Policia ".$numero;
            $this -> seguridad = rand(0, 10);
        }
    
        //    METODOS
        
    
        //    GETTERS
        
    
        //    SETTERS
        
    
    }

    class Tendero extends Ciudadano{
        //    ATRIBUTOS
        protected $utilidad;
    
        //    CONSTRUCTOR Y DESTRUCTOR
        public function __construct($numero){
            parent::__construct(null);
            $this -> nombre = "Tendero ".$numero;
            $this -> utilidad = rand(0, 10);
        }
    
        //    METODOS
        
    
        //    GETTERS
        
    
        //    SETTERS
        
    
    }

    class Concejal extends Ciudadano{
        //    ATRIBUTOS
        protected $poder, $patrimonio;
    
        //    CONSTRUCTOR Y DESTRUCTOR
        public function __construct($numero){
            parent::__construct(null);
            $this -> nombre = "Concejal ".$numero;
            $this -> poder = rand(0, 10);
            $this -> patrimonio = rand(0, 10000);
        }

        //    METODOS
        
    
        //    GETTERS
        
    
        //    SETTERS
        
    
    }
?>