<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing;

class ExtraerFotosExcel extends Command
{
    protected $signature = 'padron:fotos {archivo}';
    protected $description = 'Extrae las fotos de Excel y las nombra según el votante';

    public function handle()
    {
        $archivo = $this->argument('archivo');

        if (!file_exists($archivo)) {
            $this->error("No se encontró el archivo: {$archivo}");
            return;
        }

        $this->info("Leyendo el archivo Excel... (Esto puede tardar unos segundos)");

        // 1. Cargamos el Excel en memoria
        $spreadsheet = IOFactory::load($archivo);
        $worksheet = $spreadsheet->getActiveSheet();
        
        // 2. Obtenemos TODAS las imágenes que están flotando en la hoja
        $drawings = $worksheet->getDrawingCollection();

        $this->info("Se encontraron " . count($drawings) . " imágenes. Iniciando extracción...");

        $contador = 0;

        foreach ($drawings as $drawing) {
            // 3. ¿En qué celda está la esquina superior izquierda de la foto? (Ej. "E2")
            $celda = $drawing->getCoordinates();
            
            // 4. Extraemos solo el número de fila (Ej. de "E2" sacamos "2")
            $fila = preg_replace('/[^0-9]/', '', $celda);
            
            // 5. Vamos a la columna B de esa misma fila para leer el nombre
            $nombrePersona = $worksheet->getCell('B' . $fila)->getValue();

            // Si por alguna razón no hay nombre en esa fila, nos la saltamos
            if (!$nombrePersona) continue; 

            // 6. Limpiamos el nombre para que sea un archivo válido para Windows/Linux
            // "AGUILAR AGUILAR LUZ" -> "aguilar_aguilar_luz"
            $nombreArchivo = Str::slug($nombrePersona, '_');

            // 7. Extraemos la imagen binaria
            $contenidoImagen = null;
            $extension = 'jpg'; // Por defecto

            if ($drawing instanceof Drawing) {
                // Es una imagen física incrustada
                $contenidoImagen = file_get_contents($drawing->getPath());
                $extension = $drawing->getExtension();
            } elseif ($drawing instanceof MemoryDrawing) {
                // Es una imagen en memoria (copiada y pegada)
                ob_start();
                call_user_func($drawing->getRenderingFunction(), $drawing->getImageResource());
                $contenidoImagen = ob_get_contents();
                ob_end_clean();
                
                if ($drawing->getMimeType() == MemoryDrawing::MIMETYPE_PNG) {
                    $extension = 'png';
                }
            }

            // 8. Guardamos la imagen físicamente en storage/app/public/fotos_padron
            if ($contenidoImagen) {
                $rutaFinal = "public/fotos_padron/{$nombreArchivo}.{$extension}";
                Storage::put($rutaFinal, $contenidoImagen);
                
                $this->line("✅ Guardada: {$nombreArchivo}.{$extension}");
                $contador++;
            }
        }

        $this->info("¡Misión Cumplida! Se extrajeron {$contador} fotos correctamente.");
    }
}