<?php

namespace sitebde\ParrainageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use sitebde\ParrainageBundle\Entity\Activite;

/**
 * Loisir
 *
 * @ORM\Table(name="loisir")
 * @ORM\Entity(repositoryClass="sitebde\ParrainageBundle\Repository\LoisirRepository")
 */
class Loisir extends Activite
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     *
     * @ORM\OneToMany(targetEntity="sitebde\ParrainageBundle\Entity\EtudiantLoisir", mappedBy="loisir", cascade={"persist"})
     */
    private $etudiants;


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
     * Constructor
     */
    public function __construct()
    {

    }


    /**
     * Add etudiant
     *
     * @param \sitebde\ParrainageBundle\Entity\Loisir $etudiant
     *
     * @return Loisir
     */
    public function addEtudiant(\sitebde\ParrainageBundle\Entity\EtudiantLoisir $etudiant)
    {
        $this->etudiants[] = $etudiant;

        return $this;
    }

    /**
     * Remove etudiant
     *
     * @param \sitebde\ParrainageBundle\Entity\Loisir $etudiant
     */
    public function removeEtudiant(\sitebde\ParrainageBundle\Entity\EtudiantLoisir $etudiant)
    {
        $this->etudiants->removeElement($etudiant);
    }

    /**
     * Get etudiants
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEtudiants()
    {
        return $this->etudiants;
    }
}
