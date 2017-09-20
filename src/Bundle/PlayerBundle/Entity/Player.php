<?php
//
//namespace Bundle\PlayerBundle\Entity;
//
//use Doctrine\ORM\Mapping as ORM;
//
///**
// * User
// *
// * @ORM\Entity
// * @ORM\Table(name="users")
// */
//class User
//{
//    /**
//     * @ORM\Column(type="integer")
//     * @ORM\Id
//     * @ORM\GeneratedValue(strategy="AUTO")
//     */
//    private $id;
//
//    /**
//     * @ORM\Column(type="string", length=64)
//     */
//    private $username;
//
//    /**
//     * @ORM\Column(type="string", length=12)
//     */
//    private $password;
//
//    /**
//     * @ORM\Column(type="string", length=64)
//     */
//    private $email;
//
//    public function getId()
//    {
//        return $this->id;
//    }
//
//    /**
//     * Set username
//     *
//     * @param string $username
//     *
//     * @return User
//     */
//    public function setUsername($username)
//    {
//        $this->username = $username;
//
//        return $this;
//    }
//
//    public function getUsername()
//    {
//        return $this->username;
//    }
//
//    public function setEmail($email)
//    {
//        $this->email = $email;
//
//        return $this;
//    }
//
//    public function getEmail()
//    {
//        return $this->email;
//    }
//
//    public function setPassword($password)
//    {
//        $this->password = $password;
//    }
//
//    public function getPassword()
//    {
//        return $this->password;
//    }
//
//}
//
