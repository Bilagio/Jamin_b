<?php

class MagazijnModel
{
    private $db;

    public function __construct()
    {
        /**
         * Maak een nieuw database object die verbinding maakt met de 
         * MySQL server
         */
        $this->db = new Database();
    }

    public function getAllMagazijnProducts()
    {
        try {
            $sql = "CALL spReadMagazijnProduct()";

            $this->db->query($sql);

            return $this->db->resultSet();

        } catch (Exception $e) {
            /**
             * Log de error in de functie logger()
             */
            logger(__LINE__, __METHOD__, __FILE__, $e->getMessage());            
        }
    }
    public function getLeverancierInformation($ProductId)
    {
        try {
            $sql = "CALL spReadLeverancierinfo(
            :ProductId
            )";

            $this->db->query($sql);

            $this->db->bind(":ProductId", $ProductId, PDO::PARAM_STR);

            return $this->db->resultSet();

        } catch (Exception $e) {
            /**
             * Log de error in de functie logger()
             */
            logger(__LINE__, __METHOD__, __FILE__, $e->getMessage());            
        }
    }

    public function getAllergenen($ProductId)
    {
        try {
            $sql = "CALL spReadAllergenen(
            :ProductId
            )";

            $this->db->query($sql);

            $this->db->bind(":ProductId", $ProductId, PDO::PARAM_INT);

            return $this->db->resultSet();

        } catch (Exception $e) {
            /**
             * Log de error in de functie logger()
             */
            logger(__LINE__, __METHOD__, __FILE__, $e->getMessage());            
        }
    }
}