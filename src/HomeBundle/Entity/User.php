<?php

namespace HomeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_8D93D649A11ACB1F", columns={"UserName"}), @ORM\UniqueConstraint(name="UNIQ_8D93D649E7927C74", columns={"email"}), @ORM\UniqueConstraint(name="UNIQ_8D93D64930BA32CA", columns={"cellPhoneNumber"})})
 * @ORM\Entity
 */
class User
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
     * @var string
     *
     * @ORM\Column(name="UserName", type="string", length=255, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="OneFirstName", type="string", length=50, nullable=false)
     */
    private $onefirstname;

    /**
     * @var string
     *
     * @ORM\Column(name="TwoFirstName", type="string", length=50, nullable=true)
     */
    private $twofirstname;

    /**
     * @var string
     *
     * @ORM\Column(name="OneLastName", type="string", length=50, nullable=false)
     */
    private $onelastname;

    /**
     * @var string
     *
     * @ORM\Column(name="TwoLastName", type="string", length=50, nullable=true)
     */
    private $twolastname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="text", nullable=false)
     */
    private $password;

    /**
     * @var integer
     *
     * @ORM\Column(name="cellPhoneNumber", type="integer", nullable=false)
     */
    private $cellphonenumber;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=1, nullable=false)
     */
    private $gender;



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
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set onefirstname
     *
     * @param string $onefirstname
     * @return User
     */
    public function setOnefirstname($onefirstname)
    {
        $this->onefirstname = $onefirstname;

        return $this;
    }

    /**
     * Get onefirstname
     *
     * @return string 
     */
    public function getOnefirstname()
    {
        return $this->onefirstname;
    }

    /**
     * Set twofirstname
     *
     * @param string $twofirstname
     * @return User
     */
    public function setTwofirstname($twofirstname)
    {
        $this->twofirstname = $twofirstname;

        return $this;
    }

    /**
     * Get twofirstname
     *
     * @return string 
     */
    public function getTwofirstname()
    {
        return $this->twofirstname;
    }

    /**
     * Set onelastname
     *
     * @param string $onelastname
     * @return User
     */
    public function setOnelastname($onelastname)
    {
        $this->onelastname = $onelastname;

        return $this;
    }

    /**
     * Get onelastname
     *
     * @return string 
     */
    public function getOnelastname()
    {
        return $this->onelastname;
    }

    /**
     * Set twolastname
     *
     * @param string $twolastname
     * @return User
     */
    public function setTwolastname($twolastname)
    {
        $this->twolastname = $twolastname;

        return $this;
    }

    /**
     * Get twolastname
     *
     * @return string 
     */
    public function getTwolastname()
    {
        return $this->twolastname;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set cellphonenumber
     *
     * @param integer $cellphonenumber
     * @return User
     */
    public function setCellphonenumber($cellphonenumber)
    {
        $this->cellphonenumber = $cellphonenumber;

        return $this;
    }

    /**
     * Get cellphonenumber
     *
     * @return integer 
     */
    public function getCellphonenumber()
    {
        return $this->cellphonenumber;
    }

    /**
     * Set gender
     *
     * @param string $gender
     * @return User
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender()
    {
        return $this->gender;
    }
}
