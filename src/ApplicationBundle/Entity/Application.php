<?php

namespace ApplicationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Application
 *
 * @ORM\Table(name="application")
 * @ORM\Entity(repositoryClass="ApplicationBundle\Repository\ApplicationRepository")
 */
class Application
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
     * @ORM\Column(name="nom_contact_urgence", type="string", length=255)
     */
    private $nomContactUrgence;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_contact_urgence", type="string", length=255)
     */
    private $prenomContactUrgence;

    /**
     * @var string
     *
     * @ORM\Column(name="tel_contact_urgence", type="string", length=10)
     */
    private $telContactUrgence;

    /**
     * @var string
     *
     * @ORM\Column(name="projet_pro", type="text", nullable=true)
     */
    private $projetPro;

    /**
     * @var string
     *
     * @ORM\Column(name="projet_formation", type="text", nullable=true)
     */
    private $projetFormation;

    /**
     * @var string
     *
     * @ORM\Column(name="niveau_etudes", type="string", nullable=true)
     */
    private $niveauEtudes;

    /**
     * @ORM\OneToMany(targetEntity="ApplicationBundle\Entity\Diplome", mappedBy="application", cascade={"persist", "remove"})
     */
    private $diplomes;

    /**
     * @var string
     *
     * @ORM\Column(name="lettre_motiv", type="string", length=255, nullable=true)
     */
    private $lettreMotiv;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @var string
     *
     * @ORM\Column(name="handicap", type="string", length=255, nullable=true, nullable=true)
     */
    private $handicap;

    /**
     * @var string
     *
     * @ORM\Column(name="cv", type="string", length=255, nullable=true)
     */
    private $cv;

    /**
     * @var string
     *
     * @ORM\Column(name="carte_id_recto", type="string", length=255, nullable=true)
     */
    private $carteIdRecto;

    /**
     * @var string
     *
     * @ORM\Column(name="carte_id_verso", type="string", length=255, nullable=true)
     */
    private $carteIdVerso;

    /**
     * @var string
     *
     * @ORM\Column(name="rib", type="string", length=255, nullable=true)
     */
    private $rib;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Applicant", inversedBy="applications", cascade={"persist", "remove"})
     */
     private $applicant;

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
     * Set nomContactUrgence
     *
     * @param string $nomContactUrgence
     *
     * @return Application
     */
    public function setNomContactUrgence($nomContactUrgence)
    {
        $this->nomContactUrgence = $nomContactUrgence;

        return $this;
    }

    /**
     * Get nomContactUrgence
     *
     * @return string
     */
    public function getNomContactUrgence()
    {
        return $this->nomContactUrgence;
    }

    /**
     * Set prenomContactUrgence
     *
     * @param string $prenomContactUrgence
     *
     * @return Application
     */
    public function setPrenomContactUrgence($prenomContactUrgence)
    {
        $this->prenomContactUrgence = $prenomContactUrgence;

        return $this;
    }

    /**
     * Get prenomContactUrgence
     *
     * @return string
     */
    public function getPrenomContactUrgence()
    {
        return $this->prenomContactUrgence;
    }

    /**
     * Set telContactUrgence
     *
     * @param string $telContactUrgence
     *
     * @return Application
     */
    public function setTelContactUrgence($telContactUrgence)
    {
        $this->telContactUrgence = $telContactUrgence;

        return $this;
    }

    /**
     * Get telContactUrgence
     *
     * @return string
     */
    public function getTelContactUrgence()
    {
        return $this->telContactUrgence;
    }

    /**
     * Set projetPro
     *
     * @param string $projetPro
     *
     * @return Application
     */
    public function setProjetPro($projetPro)
    {
        $this->projetPro = $projetPro;

        return $this;
    }

    /**
     * Get projetPro
     *
     * @return string
     */
    public function getProjetPro()
    {
        return $this->projetPro;
    }

    /**
     * Set lettreMotiv
     *
     * @param string $lettreMotiv
     *
     * @return Application
     */
    public function setLettreMotiv($lettreMotiv)
    {
        $this->lettreMotiv = $lettreMotiv;

        return $this;
    }

    /**
     * Get lettreMotiv
     *
     * @return string
     */
    public function getLettreMotiv()
    {
        return $this->lettreMotiv;
    }

    /**
     * Set photo
     *
     * @param string $photo
     *
     * @return Application
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set handicap
     *
     * @param string $handicap
     *
     * @return Application
     */
    public function setHandicap($handicap)
    {
        $this->handicap = $handicap;

        return $this;
    }

    /**
     * Get handicap
     *
     * @return string
     */
    public function getHandicap()
    {
        return $this->handicap;
    }

    /**
     * Set cv
     *
     * @param string $cv
     *
     * @return Application
     */
    public function setCv($cv)
    {
        $this->cv = $cv;

        return $this;
    }

    /**
     * Get cv
     *
     * @return string
     */
    public function getCv()
    {
        return $this->cv;
    }

    /**
     * Set carteIdRecto
     *
     * @param string $carteIdRecto
     *
     * @return Application
     */
    public function setCarteIdRecto($carteIdRecto)
    {
        $this->carteIdRecto = $carteIdRecto;

        return $this;
    }

    /**
     * Get carteIdRecto
     *
     * @return string
     */
    public function getCarteIdRecto()
    {
        return $this->carteIdRecto;
    }

    /**
     * Set carteIdVerso
     *
     * @param string $carteIdVerso
     *
     * @return Application
     */
    public function setCarteIdVerso($carteIdVerso)
    {
        $this->carteIdVerso = $carteIdVerso;

        return $this;
    }

    /**
     * Get carteIdVerso
     *
     * @return string
     */
    public function getCarteIdVerso()
    {
        return $this->carteIdVerso;
    }

    /**
     * Set rib
     *
     * @param string $rib
     *
     * @return Application
     */
    public function setRib($rib)
    {
        $this->rib = $rib;

        return $this;
    }

    /**
     * Get rib
     *
     * @return string
     */
    public function getRib()
    {
        return $this->rib;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->diplomes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add diplome
     *
     * @param \ApplicationBundle\Entity\Diplome $diplome
     *
     * @return Application
     */
    public function addDiplome(\ApplicationBundle\Entity\Diplome $diplome)
    {
        $this->diplomes[] = $diplome;

        return $this;
    }

    /**
     * Remove diplome
     *
     * @param \ApplicationBundle\Entity\Diplome $diplome
     */
    public function removeDiplome(\ApplicationBundle\Entity\Diplome $diplome)
    {
        $this->diplomes->removeElement($diplome);
    }

    /**
     * Get diplomes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDiplomes()
    {
        return $this->diplomes;
    }

    /**
     * Set niveauEtudes
     *
     * @param string $niveauEtudes
     *
     * @return Application
     */
    public function setNiveauEtudes($niveauEtudes)
    {
        $this->niveauEtudes = $niveauEtudes;

        return $this;
    }

    /**
     * Get niveauEtudes
     *
     * @return string
     */
    public function getNiveauEtudes()
    {
        return $this->niveauEtudes;
    }

    /**
     * Set applicant
     *
     * @param \AppBundle\Entity\Applicant $applicant
     *
     * @return Application
     */
    public function setApplicant(\AppBundle\Entity\Applicant $applicant = null)
    {
        $this->applicant = $applicant;

        return $this;
    }

    /**
     * Get applicant
     *
     * @return \AppBundle\Entity\Applicant
     */
    public function getApplicant()
    {
        return $this->applicant;
    }

    /**
     * Set projetFormation
     *
     * @param string $projetFormation
     *
     * @return Application
     */
    public function setProjetFormation($projetFormation)
    {
        $this->projetFormation = $projetFormation;

        return $this;
    }

    /**
     * Get projetFormation
     *
     * @return string
     */
    public function getProjetFormation()
    {
        return $this->projetFormation;
    }
}
