<?php

namespace ApplicationBundle\Entity;

use AppBundle\AppBundle;
use Doctrine\ORM\Mapping as ORM;

/**
 * SituationPro
 *
 * @ORM\Table(name="situation_pro")
 * @ORM\Entity(repositoryClass="ApplicationBundle\Repository\SituationProRepository")
 */
class SituationPro
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
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut", type="date", nullable=true)
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="date", nullable=true)
     */
    private $dateFin;

    /**
     * @var int
     *
     * @ORM\Column(name="duree", type="integer", nullable=true)
     */
    private $duree;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_entreprise", type="string", length=255, nullable=true)
     */
    private $nomEntreprise;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=10, nullable=true)
     */
    private $telephone;

    /**
     * @var bool
     *
     * @ORM\Column(name="indemnise_pole_emploi", type="boolean", nullable=true)
     */
    private $indemnisePoleEmploi;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_inscription_pole_emploi", type="date", nullable=true)
     */
    private $dateInscriptionPoleEmploi;

    /**
     * @var bool
     *
     * @ORM\Column(name="rsa", type="boolean", nullable=true)
     */
    private $rsa;

    /**
     * @var string
     *
     * @ORM\Column(name="autre_demandeur_emploi", type="string", length=255, nullable=true)
     */
    private $autreDemandeurEmploi;

    /**
     * @var string
     *
     * @ORM\Column(name="preciser_situation", type="string", length=255, nullable=true)
     */
    private $preciserSituation;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Address", cascade={"persist", "remove"})
     */
    private $adresseEmployeur;

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
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return SituationPro
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     *
     * @return SituationPro
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set duree
     *
     * @param integer $duree
     *
     * @return SituationPro
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree
     *
     * @return int
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set nomEntreprise
     *
     * @param string $nomEntreprise
     *
     * @return SituationPro
     */
    public function setNomEntreprise($nomEntreprise)
    {
        $this->nomEntreprise = $nomEntreprise;

        return $this;
    }

    /**
     * Get nomEntreprise
     *
     * @return string
     */
    public function getNomEntreprise()
    {
        return $this->nomEntreprise;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return SituationPro
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set indemnisePoleEmploi
     *
     * @param boolean $indemnisePoleEmploi
     *
     * @return SituationPro
     */
    public function setIndemnisePoleEmploi($indemnisePoleEmploi)
    {
        $this->indemnisePoleEmploi = $indemnisePoleEmploi;

        return $this;
    }

    /**
     * Get indemnisePoleEmploi
     *
     * @return bool
     */
    public function getIndemnisePoleEmploi()
    {
        return $this->indemnisePoleEmploi;
    }

    /**
     * Set dateInscriptionPoleEmploi
     *
     * @param \DateTime $dateInscriptionPoleEmploi
     *
     * @return SituationPro
     */
    public function setDateInscriptionPoleEmploi($dateInscriptionPoleEmploi)
    {
        $this->dateInscriptionPoleEmploi = $dateInscriptionPoleEmploi;

        return $this;
    }

    /**
     * Get dateInscriptionPoleEmploi
     *
     * @return \DateTime
     */
    public function getDateInscriptionPoleEmploi()
    {
        return $this->dateInscriptionPoleEmploi;
    }

    /**
     * Set rsa
     *
     * @param boolean $rsa
     *
     * @return SituationPro
     */
    public function setRsa($rsa)
    {
        $this->rsa = $rsa;

        return $this;
    }

    /**
     * Get rsa
     *
     * @return bool
     */
    public function getRsa()
    {
        return $this->rsa;
    }

    /**
     * Set autreDemandeurEmploi
     *
     * @param string $autreDemandeurEmploi
     *
     * @return SituationPro
     */
    public function setAutreDemandeurEmploi($autreDemandeurEmploi)
    {
        $this->autreDemandeurEmploi = $autreDemandeurEmploi;

        return $this;
    }

    /**
     * Get autreDemandeurEmploi
     *
     * @return string
     */
    public function getAutreDemandeurEmploi()
    {
        return $this->autreDemandeurEmploi;
    }

    /**
     * Set preciserSituation
     *
     * @param string $preciserSituation
     *
     * @return SituationPro
     */
    public function setPreciserSituation($preciserSituation)
    {
        $this->preciserSituation = $preciserSituation;

        return $this;
    }

    /**
     * Get preciserSituation
     *
     * @return string
     */
    public function getPreciserSituation()
    {
        return $this->preciserSituation;
    }

    /**
     * Set adresseEmployeur
     *
     * @param \AppBundle\Entity\Address $adresseEmployeur
     *
     * @return SituationPro
     */
    public function setAdresseEmployeur(\AppBundle\Entity\Address $adresseEmployeur = null)
    {
        $this->adresseEmployeur = $adresseEmployeur;

        return $this;
    }

    /**
     * Get adresseEmployeur
     *
     * @return \AppBundle\Entity\Address
     */
    public function getAdresseEmployeur()
    {
        return $this->adresseEmployeur;
    }
}
