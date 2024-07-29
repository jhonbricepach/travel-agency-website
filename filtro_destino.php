<?php
class FiltroDestino {
    private $nombreHotel;
    private $ciudad;
    private $pais;
    private $fechaViaje;
    private $duracionViaje;
    private $paquetes;

    public function __construct($nombreHotel, $ciudad, $pais, $fechaViaje, $duracionViaje) {
        $this->nombreHotel = $nombreHotel;
        $this->ciudad = $ciudad;
        $this->pais = $pais;
        $this->fechaViaje = $fechaViaje;
        $this->duracionViaje = $duracionViaje;
        
        // Lista de paquetes turísticos de prueba
        $this->paquetes = [
            ["nombreHotel" => "Hotel 1", "ciudad" => "Tokio", "pais" => "Japón", "fechaViaje" => "2024-07-17", "duracionViaje" => 4],
            ["nombreHotel" => "Hotel 2", "ciudad" => "París", "pais" => "Francia", "fechaViaje" => "2024-08-01", "duracionViaje" => 7],
            ["nombreHotel" => "Hotel 3", "ciudad" => "Nueva York", "pais" => "Estados Unidos", "fechaViaje" => "2024-09-10", "duracionViaje" => 5],
            // Agrega más paquetes de prueba según sea necesario
        ];
    }

    public function buscarPaquetes() {
        // Filtrar paquetes que coincidan con los criterios
        $resultados = [];
        foreach ($this->paquetes as $paquete) {
            if (strtolower($paquete["nombreHotel"]) === strtolower($this->nombreHotel) &&
                strtolower($paquete["ciudad"]) === strtolower($this->ciudad) &&
                strtolower($paquete["pais"]) === strtolower($this->pais) &&
                $paquete["fechaViaje"] === $this->fechaViaje &&
                $paquete["duracionViaje"] == $this->duracionViaje) {
                $resultados[] = $paquete;
            }
        }

        // Generar el resultado de la búsqueda
        if (empty($resultados)) {
            return "No se encontraron paquetes que coincidan con los criterios de búsqueda.";
        } else {
            $resultadoTexto = "Paquetes encontrados:<br>";
            foreach ($resultados as $paquete) {
                $resultadoTexto .= "Hotel: {$paquete['nombreHotel']} en {$paquete['ciudad']}, {$paquete['pais']} desde {$paquete['fechaViaje']} por {$paquete['duracionViaje']} días.<br>";
            }
            return $resultadoTexto;
        }
    }
}
?>
