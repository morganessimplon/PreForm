<?php

namespace ApplicationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Diplome
 *
 * @ORM\Table(name="diplome")
 * @ORM\Entity(repositoryClass="ApplicationBundle\Repository\DiplomeRepository")
 */
class Diplome
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
     * @ORM\ManyToOne(targetEntity="ApplicationBundle\Entity\Application", inversedBy="diplomes")
     */
    private $application;

    /**
     * @var string
     *
     * @ORM\Column(name="obtenu", type="string", length=255, nullable=true)
     */
    private $obtenu;

    /**
     * @var string
     *
     * @ORM\Column(name="copie", type="string", length=255, nullable=true)
     */
    private $copie;

    private $file;

    public function getFile()
    {
        return $this->file;
    }

    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
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
     * Set obtenu
     *
     * @param string $obtenu
     *
     * @return Diplome
     */
    public function setObtenu($obtenu)
    {
        $this->obtenu = $obtenu;

        return $this;
    }

    /**
     * Get obtenu
     *
     * @return string
     */
    public function getObtenu()
    {
        return $this->obtenu;
    }

    /**
     * Set copie
     *
     * @param string $copie
     *
     * @return Diplome
     */
    public function setCopie($copie)
    {
        $this->copie = $copie;

        return $this;
    }

    /**
     * Get copie
     *
     * @return string
     */
    public function getCopie()
    {
        return $this->copie;
    }

    /**
     * Set application
     *
     * @param \ApplicationBundle\Entity\Application $application
     *
     * @return Diplome
     */
    public function setApplication(\ApplicationBundle\Entity\Application $application = null)
    {
        $this->application = $application;

        return $this;
    }

    /**
     * Get application
     *
     * @return \ApplicationBundle\Entity\Application
     */
    public function getApplication()
    {
        return $this->application;
    }
}
