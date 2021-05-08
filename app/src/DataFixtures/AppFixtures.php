<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private const USERS = [
        [
            'username' => 'john_doe',
            'email' => 'john_doe@doe.com',
            'password' => 'john123',
            'roles' => [],
        ],
        [
            'username' => 'jane_doe',
            'email' => 'jane_doe@doe.com',
            'password' => 'jane123',
            'roles' => [],
        ],
    ];

    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    /**
     * AppFixtures constructor.
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $this->loadUsers($manager);
    }

    private function loadUsers(ObjectManager $manager)
    {
        foreach (self::USERS as $userData) {
            $user = new User();

            $user->setUsername($userData['username']);
            $user->setEmail($userData['email']);

            $user->setPassword(
                $this->passwordEncoder->encodePassword(
                    $user, $userData['password']
                )
            );

            $user->setRoles($userData['roles']);

            $manager->persist($user);
        }
        $manager->flush();
    }
}
