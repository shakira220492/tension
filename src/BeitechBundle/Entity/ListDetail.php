<?php

namespace BeitechBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListDetail
 */
class ListDetail
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $amountProduct;

    /**
     * @var integer
     */
    private $idList;

    /**
     * @var \BeitechBundle\Entity\Product
     */
    private $idProduct;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set amountProduct
     *
     * @param integer $amountProduct
     * @return ListDetail
     */
    public function setAmountProduct($amountProduct)
    {
        $this->amountProduct = $amountProduct;

        return $this;
    }

    /**
     * Get amountProduct
     *
     * @return integer 
     */
    public function getAmountProduct()
    {
        return $this->amountProduct;
    }

    /**
     * Set idList
     *
     * @param integer $idList
     * @return ListDetail
     */
    public function setIdList($idList)
    {
        $this->idList = $idList;

        return $this;
    }

    /**
     * Get idList
     *
     * @return integer 
     */
    public function getIdList()
    {
        return $this->idList;
    }

    /**
     * Set idProduct
     *
     * @param \BeitechBundle\Entity\Product $idProduct
     * @return ListDetail
     */
    public function setIdProduct(\BeitechBundle\Entity\Product $idProduct = null)
    {
        $this->idProduct = $idProduct;

        return $this;
    }

    /**
     * Get idProduct
     *
     * @return \BeitechBundle\Entity\Product 
     */
    public function getIdProduct()
    {
        return $this->idProduct;
    }
}
