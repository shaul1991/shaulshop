<?php


namespace App\Services\UserRegister\Dto;


use Illuminate\Support\Facades\Hash;

class UserRegisterDto
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $password;
    /**
     * @var string
     */
    private $phone_number;

    /**
     * UserRegisterDto constructor.
     * @param string $name
     * @param string $email
     * @param string $password
     * @param string $phone_number
     */
    public function __construct(
        string $name,
        string $email,
        string $password,
        string $phone_number
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->phone_number = $phone_number;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return Hash::make($this->password);
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return preg_replace("/\D/g", "", $this->phone_number);
    }
}
