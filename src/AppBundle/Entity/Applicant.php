<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Applicant
 *
 * @ORM\Table(name="applicant")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ApplicantRepository")
 */
class Applicant
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
     * @ORM\OneToOne(targetEntity="User\UserBundle\Entity\User", cascade={"persist", "remove"})
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="sexe", type="string", length=1)
     */
    private $sexe;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_jeune_fille", type="string", length=255, nullable=true)
     */
    private $nomJeuneFille;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_naissance", type="datetime", nullable=true)
     */
    private $dateNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu_naissance", type="string", nullable=true)
     */
    private $lieuNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="nationalite", type="string", nullable=true)
     */
    private $nationalite;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="integer", nullable=true)
     *
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=255)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="situation_familiale", type="string", nullable=true)
     */
    private $situationFamiliale;

    /**
     * @var integer
     *
     * @ORM\Column(name="enfants", type="integer", nullable=true, nullable=true)
     */
    private $enfants;

    /**
     * @var string
     *
     * @ORM\Column(name="num_secu", type="string", nullable=true)
     * @Assert\Length(max = 15)
     */
    private $numSecu;

    /**
     * @var string
     *
     * @ORM\Column(name="caisse", type="string", nullable=true)
     */
    private $caisse;

    /**
     * @var boolean
     *
     * @ORM\Column(name="handicap", type="boolean", nullable=true)
     */
    private $handicap;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation", type="datetime")
     */
    private $dateCreation;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Address", cascade={"persist", "remove"})
     */
    private $adresse;

    /**
     * @ORM\OneToMany(targetEntity="ApplicationBundle\Entity\Application", mappedBy="applicant", cascade={"persist", "remove"})
     */
    private $applications;

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
     * Set nom
     *
     * @param string $nom
     *
     * @return Applicant
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Applicant
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     *
     * @return Applicant
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return Applicant
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set telephone
     *
     * @param integer $telephone
     *
     * @return Applicant
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return integer
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set adresse
     *
     * @param \AppBundle\Entity\Address $adresse
     *
     * @return Applicant
     */
    public function setAdresse($adresse = null)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return \AppBundle\Entity\Address
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set sexe
     *
     * @param string $sexe
     *
     * @return Applicant
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe
     *
     * @return string
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set nomJeuneFille
     *
     * @param string $nomJeuneFille
     *
     * @return Applicant
     */
    public function setNomJeuneFille($nomJeuneFille)
    {
        $this->nomJeuneFille = $nomJeuneFille;

        return $this;
    }

    /**
     * Get nomJeuneFille
     *
     * @return string
     */
    public function getNomJeuneFille()
    {
        return $this->nomJeuneFille;
    }

    /**
     * Set lieuNaissance
     *
     * @param string $lieuNaissance
     *
     * @return Applicant
     */
    public function setLieuNaissance($lieuNaissance)
    {
        $this->lieuNaissance = $lieuNaissance;

        return $this;
    }

    /**
     * Get lieuNaissance
     *
     * @return string
     */
    public function getLieuNaissance()
    {
        return $this->lieuNaissance;
    }

    /**
     * Set nationalite
     *
     * @param string $nationalite
     *
     * @return Applicant
     */
    public function setNationalite($nationalite)
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    /**
     * Get nationalite
     *
     * @return string
     */
    public function getNationalite()
    {
        return $this->nationalite;
    }

    /**
     * Set situationFamiliale
     *
     * @param string $situationFamiliale
     *
     * @return Applicant
     */
    public function setSituationFamiliale($situationFamiliale)
    {
        $this->situationFamiliale = $situationFamiliale;

        return $this;
    }

    /**
     * Get situationFamiliale
     *
     * @return string
     */
    public function getSituationFamiliale()
    {
        return $this->situationFamiliale;
    }

    /**
     * Set enfants
     *
     * @param integer $enfants
     *
     * @return Applicant
     */
    public function setEnfants($enfants)
    {
        $this->enfants = $enfants;

        return $this;
    }

    /**
     * Get enfants
     *
     * @return integer
     */
    public function getEnfants()
    {
        return $this->enfants;
    }

    /**
     * Set numSecu
     *
     * @param string $numSecu
     *
     * @return Applicant
     */
    public function setNumSecu($numSecu)
    {
        $this->numSecu = $numSecu;

        return $this;
    }

    /**
     * Get numSecu
     *
     * @return string
     */
    public function getNumSecu()
    {
        return $this->numSecu;
    }

    /**
     * Set caisse
     *
     * @param string $caisse
     *
     * @return Applicant
     */
    public function setCaisse($caisse)
    {
        $this->caisse = $caisse;

        return $this;
    }

    /**
     * Get caisse
     *
     * @return string
     */
    public function getCaisse()
    {
        return $this->caisse;
    }

    /**
     * Set handicap
     *
     * @param boolean $handicap
     *
     * @return Applicant
     */
    public function setHandicap($handicap)
    {
        $this->handicap = $handicap;

        return $this;
    }

    /**
     * Get handicap
     *
     * @return boolean
     */
    public function getHandicap()
    {
        return $this->handicap;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return Applicant
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set user
     *
     * @param \User\UserBundle\Entity\User $user
     *
     * @return Applicant
     */
    public function setUser(\User\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \User\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->applications = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add application
     *
     * @param \ApplicationBundle\Entity\Application $application
     *
     * @return Applicant
     */
    public function addApplication(\ApplicationBundle\Entity\Application $application)
    {
        $this->applications[] = $application;

        return $this;
    }

    /**
     * Remove application
     *
     * @param \ApplicationBundle\Entity\Application $application
     */
    public function removeApplication(\ApplicationBundle\Entity\Application $application)
    {
        $this->applications->removeElement($application);
    }

    /**
     * Get applications
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getApplications()
    {
        return $this->applications;
    }
}
