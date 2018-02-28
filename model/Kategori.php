<?php
/**
 * Created by PhpStorm.
 * User: Ariahari's
 * Date: 2/16/2018
 * Time: 4:07 PM
 */

class Kategori
{
    private $idKategori;
    private $namaKategori;

    /**
     * @return mixed
     */
    public function getIdKategori()
    {
        return $this->idKategori;
    }

    /**
     * @param mixed $idKategori
     */
    public function setIdKategori($idKategori): void
    {
        $this->idKategori = $idKategori;
    }

    /**
     * @return mixed
     */
    public function getNamaKategori()
    {
        return $this->namaKategori;
    }

    /**
     * @param mixed $namaKategori
     */
    public function setNamaKategori($namaKategori): void
    {
        $this->namaKategori = $namaKategori;
    }


}