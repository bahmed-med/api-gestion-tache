<?php

namespace App\DataPersister;

use App\Entity\Tache;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\String\Slugger\SluggerInterface;
use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;

class TacheDataPersister implements ContextAwareDataPersisterInterface 
{
    private $em;
    private $slugger;
    
    public function __construct(EntityManagerInterface $entityManager,SluggerInterface $slugger)
    {
      $this->em = $entityManager;
      $this->slugger = $slugger;  
    }
    public function supports($data, array $context = []): bool
    {
        return $data instanceof Tache;
    }

    public function persist($data, array $context = [])
    {
        $data->setSlug(
            $this
                ->slugger
                ->slug(strtolower($data->getTitre())). '-' .uniqid()
        );

        $this->em->persist($data);
        $this->em->flush();

    }

    public function remove($data, array $context = [])
    {
        $this->em->remove($data);
        $this->em->flush();
    }

}