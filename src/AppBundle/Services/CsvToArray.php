<?php

namespace AppBundle\Services;

use AppBundle\Entity\Essais;
use AppBundle\Entity\Facture;
use AppBundle\Entity\Inclusion;
use AppBundle\Entity\Patient;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\StreamedResponse;

class CsvToArray
{

    protected $name;
    protected $titles;
    protected $em;

    /**
     * CsvToArray constructor.
     * @param $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }


    public function convert($filename, $delimiter = ';')
    {
        if (!file_exists($filename) || !is_readable($filename)) {
            return FALSE;
        }

        $header = NULL;
        $data = array();

        if (($handle = fopen($filename, 'r')) !== FALSE) {
            while (($row = fgetcsv($handle, 1000000, $delimiter)) !== FALSE) {
                if (!$header) {
                    $header = $row;
                } else {
                    $data[] = array_combine($header, $row);
                }
            }
            fclose($handle);
        }

        return $data;
    }

    public function exportCSV($titles, $listes, $name)
    {
        $this->name = $name;
        $this->titles = $titles;

        $response = new StreamedResponse();
        $response->setCallback(function () use ($listes) {
            $handle = fopen('php://output', 'w+');

            fputcsv($handle, $this->titles, ';');

            foreach ($listes as $liste) {
                fputcsv(
                    $handle,
                    $liste,
                    ';'
                );
            }

            fclose($handle);
        });

        $response->setStatusCode(200);
        $response->headers->set('Content-Type', 'text/csv; charset=utf-8');
        $response->headers->set('Content-Disposition', 'attachment; filename="export-' . $name . '-' . date('m-d-Y_hia') . '.csv"');
        echo "\xEF\xBB\xBF";

        return $response;
    }
}