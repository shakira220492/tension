<?php

namespace BeitechBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductCategory
 *
 * @ORM\Table(name="product_category", indexes={@ORM\Index(name="id_product", columns={"id_product"}), @ORM\Index(name="id_category", columns={"id_category"})})
 * @ORM\Entity
 */
class ProductCategory
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_product", type="integer", nullable=false)
     */
    private $idProduct;

    /**
     * @var \Category
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_category", referencedColumnName="id")
     * })
     */
    private $idCategory;

    /**
     * @var \Product
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;



    /**
     * Set idProduct
     *
     * @param integer $idProduct
     * @return ProductCategory
     */
    public function setIdProduct($idProduct)
    {
        $this->idProduct = $idProduct;

        return $this;
    }

    /**
     * Get idProduct
     *
     * @return integer 
     */
    public function getIdProduct()
    {
        return $this->idProduct;
    }

    /**
     * Set idCategory
     *
     * @param \BeitechBundle\Entity\Category $idCategory
     * @return ProductCategory
     */
    public function setIdCategory(\BeitechBundle\Entity\Category $idCategory = null)
    {
        $this->idCategory = $idCategory;

        return $this;
    }

    /**
     * Get idCategory
     *
     * @return \BeitechBundle\Entity\Category 
     */
    public function getIdCategory()
    {
        return $this->idCategory;
    }

    /**
     * Set id
     *
     * @param \BeitechBundle\Entity\Product $id
     * @return ProductCategory
     */
    public function setId(\BeitechBundle\Entity\Product $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return \BeitechBundle\Entity\Product 
     */
    public function getId()
    {
        return $this->id;
    }
}
