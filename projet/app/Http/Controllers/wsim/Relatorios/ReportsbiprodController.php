<?php

namespace App\Http\Controllers\wsim\relatorios;

use Illuminate\Http\Request;
use PHPJasper\PHPJasper;
use App\Http\Controllers\Controller;
use App\Models\wsim\biprod;

class ReportsbiprodController extends Controller
{
    public function getDatabaseConfig()
    {
        return [
            'driver'   => env('DB_CONNECTION'),
            'host'     => env('DB_HOST'),
            'port'     => env('DB_PORT'),
            'database' => env('DB_DATABASE'),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            //'jdbc_dir' => base_path() . env('JDBC_DIR', '/vendor/lavela/phpjasper/src/JasperStarter/jdbc'),
            'jdbc_dir' => base_path() . env('JDBC_DIR', '/vendor/lavela/phpjasper/bin/jasperstarter/jdbc'),
        ];
    }

    public function pdf()
    {
        $input = public_path() . '/reports/Cadastros/biprod/Export_Produto_PDF.jrxml';

        $output = public_path() . '/reports/' . time() . '_produto';
        
        $options = [
            'format' => ['pdf'],
            'locale' => 'pt_BR',
           // 'params' => [ 'id' => $id ],
            'db_connection' => $this->getDatabaseConfig()
        ];

        $report = new PHPJasper;

        $report->process(
            $input,
            $output,
            $options
        )->execute();

        $file = $output . '.pdf';
        $path = $file;

        if (!file_exists($file)) {
            abort(404);
        }

        $file = file_get_contents($file);

        unlink($path);

        return response($file, 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="produto.pdf"');
    }


    public function xlsx()
    {
        //$input = public_path() . '/reports/bi_produto_csv.jrxml';
        $input = public_path() . '/reports/Cadastros/biprod/Export_Produto_XLSX.jrxml';

        $output = public_path() . '/reports/' . time() . '_Produto';
        
        $options = [
            'format' => ['xlsx'],
            'locale' => 'pt_BR',
           // 'params' => [ 'id' => $id ],
            'db_connection' => $this->getDatabaseConfig()
        ];

        $report = new PHPJasper;

        $report->process(
            $input,
            $output,
            $options
        )->execute();

        $file = $output . '.xlsx';
        $path = $file;

        if (!file_exists($file)) {
            abort(404);
        }

        $file = file_get_contents($file);

        unlink($path);

        return response($file, 200)
            ->header('Content-Type', 'application/xlsx')
            ->header('Content-Disposition', 'inline; filename="Produto.xlsx"');
    }


    public function csv()
    {
        //$input = public_path() . '/reports/bi_produto_csv.jrxml';
        $input = public_path() . '/reports/Cadastros/biprod/Export_Produto_CSV.jrxml';

        $output = public_path() . '/reports/' . time() . '_Produto';
        
        $options = [
            'format' => ['csv'],
            'locale' => 'pt_BR',
           // 'params' => [ 'id' => $id ],
            'db_connection' => $this->getDatabaseConfig()
        ];

        $report = new PHPJasper;

        $report->process(
            $input,
            $output,
            $options
        )->execute();

        $file = $output . '.csv';
        $path = $file;

        if (!file_exists($file)) {
            abort(404);
        }

        $file = file_get_contents($file);

        unlink($path);

        return response($file, 200)
            ->header('Content-Type', 'application/csv')
            ->header('Content-Disposition', 'inline; filename="Produto.csv"');
    }

}