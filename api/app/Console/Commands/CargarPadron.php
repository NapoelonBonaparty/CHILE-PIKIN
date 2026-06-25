<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PadronImport;

class CargarPadron extends Command
{
    protected $signature = 'padron:cargar {archivo}';
    protected $description = 'Carga el padrón desde un archivo Excel';

    public function handle()
    {
        $archivo = $this->argument('archivo');

        $this->info("Iniciando la lectura del archivo: {$archivo}");
        
        Excel::import(new PadronImport, $archivo);

        $this->info('¡Padrón cargado a la base de datos con éxito!');
    }
}