<?php

class Magazijn extends BaseController
{
    private $magazijnModel;

    public function __construct()
    {
        $this->magazijnModel = $this->model('MagazijnModel');
    }

    public function index()
    {
        $data = [
            'title' => 'Overzicht Magazijn Jamin',
            'dataRows' => NULL
        ];

        $result = $this->magazijnModel->getAllMagazijnProducts();

        if (is_null($result)) {
            // Fout afhandelen
        } else {
            $data['dataRows'] = $result;
        }

        $this->view('magazijn/index', $data);
    }

    public function LeverancierInfo($productId, $productAanwezig)
    {
        $data = [
            'LeverancierNaam' => '',
            'LeverancierContactPersoon' => '',
            'dataRows' => '',
            'message' => '',
            'messageColor' => '',
            'messageVisibility' => 'none',
            'ProductAanwezig' => $productAanwezig
        ];

        $result = $this->magazijnModel->getLeverancierInformation($productId);

        if (is_null($result)) {
            // Fout afhandelen
        } else {
            $data['dataRows'] = $result;
        }

        $this->view('magazijn/leverancierinfo', $data);

        
    }

    public function allergenenInfo($id = 0)
    {
        $Allergenen = $this->magazijnModel->getAllergenen($id);

        if (empty($Allergenen)) {
            $data = [
                'message'               => 'Geen allergenen gevonden voor dit product.',
                'messageColor'          => 'alert-success',
                'messageVisibility'     => 'flex',
                'Allergenen'            =>  null,
                'ProductNaam'           =>  null,
                'ProductBarcode'        =>  null
            ];
            $this->view('Magazijn/allergenenInfo', $data);

            header('Refresh:4;' .  URLROOT . '/Magazijn/index');
        } else {

            $data = [
                'message'               => '',
                'messageColor'          => '',
                'messageVisibility'     => 'none',
                'Allergenen'            => $Allergenen,
                'ProductNaam'           => $Allergenen[0]->ProductNaam,
                'ProductBarcode'        => $Allergenen[0]->Barcode
            ];
            $this->view('Magazijn/allergenenInfo', $data);
        }
    }
}
