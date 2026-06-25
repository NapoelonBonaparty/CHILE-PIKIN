<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MototaxisImport;

class CargarMototaxis extends Command
{
    protected $signature = 'gremios:mototaxis {archivo}';
    protected $description = 'Carga el gremio de mototaxis desde un Excel';

    public function handle()
    {
        $archivo = $this->argument('archivo');
        $this->info("Procesando gremio de Mototaxis desde: {$archivo}...");
        
        Excel::import(new MototaxisImport, $archivo);

        $this->info('¡Mototaxis vinculados al padrón con éxito!');
    }
}