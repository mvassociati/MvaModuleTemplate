<?php
namespace MvaModuleTemplate\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Breed
 *
 * @ORM\Table(name="dog_breed")
 * @ORM\Entity(repositoryClass="MvaModuleTemplate\Entity\Repository\BreedRepository")
 */
class Breed
{
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=100, nullable=false)
     */
    private $name;

    public function __construct(){
    }

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
     * Set name
     *
     * @param string $nome
     * @return Incarico
     */
    public function setName($nome)
    {
        $this->name = $nome;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
    
    public function fetchAllAsArray(){
        
    }
}