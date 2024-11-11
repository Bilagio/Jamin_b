use `jamin_b`;

DROP PROCEDURE IF EXISTS spReadAllergenen;

 DELIMITER //

 CREATE PROCEDURE spReadAllergenen(
  IN GivenProductId   INT UNSIGNED
 )
  BEGIN
SELECT
    Product.Naam as ProductNaam
    ,Product.Barcode
    ,Allergeen.Naam as AllergeenNaam
    ,Allergeen.Omschrijving
FROM ProductPerAllergeen
INNER JOIN Product
ON ProductPerAllergeen.ProductId = Product.Id
INNER JOIN Allergeen
ON ProductPerAllergeen.AllergeenId = Allergeen.Id
WHERE ProductPerAllergeen.ProductId = GivenProductId
ORDER BY AllergeenNaam ASC;

 END //  

DELIMITER ;
