<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;



/**
 * ambd
 *
 * @ORM\Table(name="ambd")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ambdRepository")
 */
class ambd
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="qdwas", type="string", length=255)
     *
     */
    private $qdwas;

    /**
     * @var string
     *
     * @ORM\Column(name="gerrt", type="decimal", precision=6, scale=2)
     */
    private $gerrt;

    /**
     * @var int
     *
     * @ORM\Column(name="thrw", type="integer")
     */
    private $thrw;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_at", type="datetime")
     */
    private $createAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="update_at", type="datetime")
     */
    private $updateAt;

    /**
     * ambd constructor.
     */
    public function  __construct()
    {
        $this->createAt = new \DateTime();
        $this->updateAt = $this->createAt;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set qdwas
     *
     * @param string $qdwas
     *
     * @return ambd
     */
    public function setQdwas($qdwas)
    {
        $this->qdwas = $qdwas;

        return $this;
    }

    /**
     * Get qdwas
     *
     * @return string
     */
    public function getQdwas()
    {
        return $this->qdwas;
    }

    /**
     * Set gerrt
     *
     * @param string $gerrt
     *
     * @return ambd
     */
    public function setGerrt($gerrt)
    {
        $this->gerrt = $gerrt;

        return $this;
    }

    /**
     * Get gerrt
     *
     * @return string
     */
    public function getGerrt()
    {
        return $this->gerrt;
    }

    /**
     * Set thrw
     *
     * @param integer $thrw
     *
     * @return ambd
     */
    public function setThrw($thrw)
    {
        $this->thrw = $thrw;

        return $this;
    }

    /**
     * Get thrw
     *
     * @return int
     */
    public function getThrw()
    {
        return $this->thrw;
    }

    /**
     * Set createAt
     *
     * @param \DateTime $createAt
     *
     * @return ambd
     */
    public function setCreateAt($createAt)
    {
        $this->createAt = $createAt;

        return $this;
    }

    /**
     * Get createAt
     *
     * @return \DateTime
     */
    public function getCreateAt()
    {
        return $this->createAt;
    }

    /**
     * Set updateAt
     *
     * @ORM\PreUpdate()
     *
     * @return ambd
     */
    public function setUpdateAt()
    {
        $this->updateAt = new \DateTime();

        return $this;
    }

    /**
     * Get updateAt
     *
     * @return \DateTime
     */
    public function getUpdateAt()
    {
        return $this->updateAt;
    }
}

