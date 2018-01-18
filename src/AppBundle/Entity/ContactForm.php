<?php
/**
 * Created by PhpStorm.
 * User: siekan
 * Date: 17.01.18
 * Time: 19:29
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Date;

/**
 * ContactForm
 *
 * @ORM\Table(name="contact_form")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContactRepository")
 */
class ContactForm
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
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="user_name", type="string", length=40)
     */
    private $name;
    /**
     * @var string
     *
     * @ORM\Column(name="user_surname", type="string", length=40)
     */
    private $surname;
    /**
     * $var string
     *
     * @ORM\Column(name="phone", type="string")
     */
    private $phone;
    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string")
     */
    private $email;
    /**
     * @var string
     *
     * @ORM\Column(name="message", type="string", length=400)
     */
    private $message;
    /**
     * @var string
     *
     * @ORM\Column(name="post_date", type="datetime")
     */
    private $postDate;
    /**
     * @var string
     *
     * @ORM\Column(name="user_ip", type="string")
     */
    private $userIP;
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
     * Set name
     *
     * @param string $name
     *
     * @return ContactForm
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
     * Set surname
     *
     * @param string $surname
     *
     * @return ContactForm
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
        return $this;
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }
    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return ContactForm
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }
    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }
    /**
     * Set email
     *
     * @param string $email
     *
     * @return ContactForm
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * Set message
     *
     * @param string $message
     *
     * @return ContactForm
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }
    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }
    /**
     * Set postDate
     *
     * @return ContactForm
     */
    public function setPostDate(\DateTime $postDate = null)
    {
        $this->postDate = $postDate;

    }
    /**
     * Get postDate
     *
     * @return string
     */
    public function getPostDate()
    {
        return $this->postDate;
    }

    /**
     * Set userIP
     *
     * @return ContactForm
     */
    public function setUserIP($userIP)
    {
        $this->userIP = $userIP;
        return $this;
    }
    /**
     * Get userIP
     *
     * @return string
     */
    public function getUserIP()
    {
        return $this->userIP;
    }
}