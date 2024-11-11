<?php require_once APPROOT . '/views/includes/header.php';
// var_dump($data['dataRows']);

?>


<div class="container">

    <div class="row mt-3">
        <div class="col-2"></div>
        <div class="col-8">
            <h1>Naam leverancier: <?= $data['dataRows'][0]->LeverancierNaam ?></h1>
            <h1>Contact Persoon: <?= $data['dataRows'][0]->ContactPersoon ?></h1>
            <h1>Leverancier Nummer: <?= $data['dataRows'][0]->LeverancierNummer ?></h1>
            <h1>Mobiel: <?= $data['dataRows'][0]->Mobiel ?></h1>
        </div>
        <div class="col-2"></div>

    </div>


    <div class="row mt-3">
        <div class="col-2"></div>
        <div class="col-8">


            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Naam Product</th>
                        <th>Datum Laatste Levering</th>
                        <th>Aantal</th>
                        <th>Eerstvolgende Levering</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (is_null($data['dataRows'])) { ?>
                        <tr>
                            <td colspan='6' class='text-center'>Door een storing kunnen we op dit moment geen producten tonen uit het magazijn</td>
                        </tr>
                    <?php } elseif ($data['ProductAanwezig'] == 0) { ?>
                        <tr>
                            <td colspan='6' class='bg-danger text-center'>Er is van dit
                                product op dit moment geen voorraad aanwezig, de verwachte eerstvolgende levering is: 30-04-2023 </td>
                                
                        </tr>
                        <?php header('Refresh:3; ' . URLROOT . '/magazijn/index');} else {
                        foreach ($data['dataRows'] as $leverantieInfo) { ?>
                            <tr>
                                <td><?= $leverantieInfo->ProductNaam ?></td>
                                <td><?= $leverantieInfo->DatumLevering ?></td>
                                <td><?= $leverantieInfo->LeveringAantal ?></td>
                                <td><?= $leverantieInfo->DatumEerstVolgendeLevering ?></td>
                            </tr>
                    <?php }
                    } ?>
                </tbody>
            </table>
            <a href="<?= URLROOT; ?>/homepages/index">Homepage</a>
        </div>
        <div class="col-2"></div>
    </div>

</div>




<?php require_once APPROOT . '/views/includes/footer.php'; ?>