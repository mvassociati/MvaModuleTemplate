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
 * @ORM\HasLifecycleCallbacks
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
    
    /**
     *
     * @var date
     * 
     * @ORM\Column(name="birthdate", type="date", nullable=true)
     */
    private $birthdate;
    
        /**
     * @var \MvaModuleTemplate\Entity\Breed
     * 
     * @ORM\ManyToOne(targetEntity="MvaModuleTemplate\Entity\Breed")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="breed", referencedColumnName="id",nullable=true)
     * })
     */
    private $breed;
    
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

    public function getBirthdate() {
        return $this->birthdate;
    }

    public function setBirthdate($birthdate) {
        $this->birthdate = $birthdate;
        return $this;
    }
    
    /**
     * Set breed
     *
     * @param \MvaModuleTemplate\Entity\Breed $breed
     * @return Incarico
     */
    public function setBreed(\MvaModuleTemplate\Entity\Breed $breed = null)
    {
        $this->breed = $breed;
    
        return $this;
    }

    /**
     * Get tipo
     *
     * @return \MvaModuleTemplate\Entity\Breed
     */
    public function getBreed()
    {
        return $this->breed;
    }

    /**
     * @ORM\PrePersist @ORM\PreUpdate
     */
    public function isAllowedToInsert(){
        //throw new \Exception('Non puoi inserire o aggiornare entità');
    }
    
    /**
     * @ORM\PostLoad
     */
    public function isAllowedToRead(){
        //throw new \Exception('Non puoi leggere');
    }
    
    
    public function fillWith($data){
        var_dump($data['birthdate']);
        $this->id = (isset($data['id'])) ? $data['id'] : null;
        $this->name = (isset($data['name'])) ? $data['name'] : $this->name;
        $this->isagoodwatchdog = (isset($data['isagoodwatchdog'])) ? $data['isagoodwatchdog'] : $this->isagoodwatchdog;
        $this->birthdate        = (isset($data['birthdate']) and $data['birthdate']!= '')       ? new \DateTime($data['birthdate'])         : null;
        $this->breed        = (isset($data['breed']))       ? $data['breed']        : null;
    }

    public function getArrayCopy()
    {
        $am_obj = get_object_vars($this);
        if ($am_obj['birthdate']){
            $am_obj['birthdate'] = $am_obj['birthdate']->format('d.m.Y');
        }
        return $am_obj;

    }
    
}