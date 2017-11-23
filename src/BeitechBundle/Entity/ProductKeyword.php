<?php

namespace BeitechBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductKeyword
 *
 * @ORM\Table(name="product_keyword", indexes={@ORM\Index(name="id_product", columns={"id_product"}), @ORM\Index(name="id_keyword", columns={"id_keyword"})})
 * @ORM\Entity
 */
class ProductKeyword
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Keyword
     *
     * @ORM\ManyToOne(targetEntity="Keyword")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_keyword", referencedColumnName="id")
     * })
     */
    private $idKeyword;

    /**
     * @var \Product
     *
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_product", referencedColumnName="id")
     * })
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
     * Set idKeyword
     *
     * @param \BeitechBundle\Entity\Keyword $idKeyword
     * @return ProductKeyword
     */
    public function setIdKeyword(\BeitechBundle\Entity\Keyword $idKeyword = null)
    {
        $this->idKeyword = $idKeyword;

        return $this;
    }

    /**
     * Get idKeyword
     *
     * @return \BeitechBundle\Entity\Keyword 
     */
    public function getIdKeyword()
    {
        return $this->idKeyword;
    }

    /**
     * Set idProduct
     *
     * @param \BeitechBundle\Entity\Product $idProduct
     * @return ProductKeyword
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
