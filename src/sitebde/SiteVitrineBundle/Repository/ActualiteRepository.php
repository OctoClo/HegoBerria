<?php

namespace sitebde\SiteVitrineBundle\Repository;

/**
 * ActualiteRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ActualiteRepository extends \Doctrine\ORM\EntityRepository
{
    // Retourne toutes les actualités de la plus récente à la moins récente
    public function getActualitesTriees()
    {
        // Récupérer le gestionnaire d'entités
        $gestionnaireEntites = $this->_em;
        
        // Ecriture de la requête personnalisée
        $requetePerso = $gestionnaireEntites->createQuery('SELECT a
                                                          FROM sitebdeSiteVitrineBundle:Actualite a
                                                          ORDER BY a.datePublication DESC');
        
        // Retourner les résultats de l'exécution de la requête
        return $requetePerso->getResult();
    }
    
    // Retourne les 3 dernières actualités
    public function getTroisDernieresActualites()
    {
        // Récupérer le gestionnaire d'entités
        $gestionnaireEntites = $this->_em;
        
        // Ecriture de la requête personnalisée
        $requetePerso = $gestionnaireEntites->createQuery('SELECT a
                                                          FROM sitebdeSiteVitrineBundle:Actualite a
                                                          ORDER BY a.datePublication DESC')->setFirstResult(0)
                                                                                           ->setMaxResults(3);
        
        // Retourner les résultats de l'exécution de la requête
        return $requetePerso->getResult();
    }
}
