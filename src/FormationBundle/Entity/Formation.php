<?php

namespace FormationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formation
 *
 * @ORM\Table(name="formation")
 * @ORM\Entity(repositoryClass="FormationBundle\Repository\FormationRepository")
 */
class Formation
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
     * @ORM\Column(name="presentation_metier", type="text")
     */
    private $presentationMetier;

    /**
     * @var string
     *
     * @ORM\Column(name="debouches", type="text")
     */
    private $debouches;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", length=255)
     */
    private $lieu;

    /**
     * @var string
     *
     * @ORM\Column(name="validation", type="string", length=255)
     */
    private $validation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="date")
     */
    private $dateFin;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var int
     *
     * @ORM\Column(name="duree", type="integer")
     */
    private $duree;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut", type="date")
     */
    private $dateDebut;

    /**
     * @var int
     *
     * @ORM\Column(name="prix", type="integer")
     */
    private $prix;

    /**
     * @var int
     *
     * @ORM\Column(name="places", type="integer")
     */
    private $places;

    /**
     * @var string
     *
     * @ORM\Column(name="objectifs", type="text")
     */
    private $objectifs;

    /**
     * @var string
     *
     * @ORM\Column(name="pre_requis", type="text")
     */
    private $preRequis;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;


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
     * Set presentationMetier
     *
     * @param string $presentationMetier
     *
     * @return Formation
     */
    public function setPresentationMetier($presentationMetier)
    {
        $this->presentationMetier = $presentationMetier;

        return $this;
    }

    /**
     * Get presentationMetier
     *
     * @return string
     */
    public function getPresentationMetier()
    {
        return $this->presentationMetier;
    }

    /**
     * Set debouches
     *
     * @param string $debouches
     *
     * @return Formation
     */
    public function setDebouches($debouches)
    {
        $this->debouches = $debouches;

        return $this;
    }

    /**
     * Get debouches
     *
     * @return string
     */
    public function getDebouches()
    {
        return $this->debouches;
    }

    /**
     * Set lieu
     *
     * @param string $lieu
     *
     * @return Formation
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get lieu
     *
     * @return string
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * Set validation
     *
     * @param string $validation
     *
     * @return Formation
     */
    public function setValidation($validation)
    {
        $this->validation = $validation;

        return $this;
    }

    /**
     * Get validation
     *
     * @return string
     */
    public function getValidation()
    {
        return $this->validation;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     *
     * @return Formation
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
     * Set nom
     *
     * @param string $nom
     *
     * @return Formation
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set duree
     *
     * @param integer $duree
     *
     * @return Formation
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
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return Formation
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
     * Set prix
     *
     * @param integer $prix
     *
     * @return Formation
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return int
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set places
     *
     * @param integer $places
     *
     * @return Formation
     */
    public function setPlaces($places)
    {
        $this->places = $places;

        return $this;
    }

    /**
     * Get places
     *
     * @return int
     */
    public function getPlaces()
    {
        return $this->places;
    }

    /**
     * Set objectifs
     *
     * @param string $objectifs
     *
     * @return Formation
     */
    public function setObjectifs($objectifs)
    {
        $this->objectifs = $objectifs;

        return $this;
    }

    /**
     * Get objectifs
     *
     * @return string
     */
    public function getObjectifs()
    {
        return $this->objectifs;
    }

    /**
     * Set preRequis
     *
     * @param string $preRequis
     *
     * @return Formation
     */
    public function setPreRequis($preRequis)
    {
        $this->preRequis = $preRequis;

        return $this;
    }

    /**
     * Get preRequis
     *
     * @return string
     */
    public function getPreRequis()
    {
        return $this->preRequis;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     *
     * @return Formation
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }
}

