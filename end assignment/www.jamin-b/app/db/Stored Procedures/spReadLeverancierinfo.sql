    -- Noem de database voor de stored procedure
    use `jamin_b`;

    DROP PROCEDURE IF EXISTS spReadLeverancierinfo;

    DELIMITER // 

    CREATE PROCEDURE spReadLeverancierinfo(
        IN GivenProductId INT UNSIGNED
    ) 

    BEGIN
    SELECT
        Product.Naam AS ProductNaam
        ,ProductPerLeverancier.DatumLevering
        ,ProductPerLeverancier.Aantal AS LeveringAantal
        ,ProductPerLeverancier.DatumEerstVolgendeLevering
        ,Leverancier.Naam AS LeverancierNaam
        ,Leverancier.ContactPersoon
        ,Leverancier.LeverancierNummer
        ,Leverancier.Mobiel
    FROM ProductPerLeverancier
    INNER JOIN Product ON ProductPerLeverancier.ProductId = Product.Id
    INNER JOIN Leverancier ON ProductPerLeverancier.LeverancierId = Leverancier.Id
    WHERE ProductPerLeverancier.ProductId = GivenProductId
    ORDER BY ProductPerLeverancier.DatumLevering ASC;


    END // 

    DELIMITER ;

    -- call the sql routine
    -- call spReadLeverancierinfo(2);   