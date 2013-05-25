<?php
namespace MvaModuleTemplate\Entity;


use Doctrine\ORM\Mapping as ORM;
use BjyAuthorize\Provider\Role\ProviderInterface;
use Zend\Crypt\Password\Bcrypt;

/**
 * Dog
 *
 * @ORM\Table(name="dog")
 * @ORM\Entity(repositoryClass="MvaModuleTemplate\Entity\Repository\DogRepository")
 */
class Dog
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="dog_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="isagoodwatchdog", type="boolean", nullable=false)
     */
    private $isagoodwatchdog;
    
    public static function create($data) {
        $dog = new Dog();
        $dog->fillWith($data);
        
        return $dog;
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
     * @param string $name
     * @return Systemuser
     */
    public function setName($name)
    {
        $this->name = $name;
    
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

    /**
     * Set isagoodwatchdog
     *
     * @param boolean $isagoodwatchdog
     * @return Systemuser
     */
    public function setIsagoodwatchdog($isagoodwatchdog)
    {
        $this->isagoodwatchdog = $isagoodwatchdog;
    
        return $this;
    }

    /**
     * Get isagoodwatchdog
     *
     * @return boolean 
     */
    public function getIsagoodwatchdog()
    {
        return $this->isagoodwatchdog;
    }
    
    public function fillWith($data){
        $this->id = (isset($data['id'])) ? $data['id'] : null;
        $this->name = (isset($data['name'])) ? $data['name'] : $this->name;
        $this->isagoodwatchdog = (isset($data['isagoodwatchdog'])) ? $data['isagoodwatchdog'] : $this->isagoodwatchdog;
    }

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
    
}