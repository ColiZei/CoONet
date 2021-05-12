<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\UserData;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private const USERS = [
        [
            'email' => 'john_doe@doe.com',
            'password' => 'john123',
            'roles' => [],
            'userData' => [
                'firstName' => 'John',
                'lastName' => 'Doe',
                'phone' => '011-962-7516',
                'gender' => 'male',
                'dayOfBirth' => '1980-01-01',
                'city' => 'Doetown',
                'country' => 'US',
            ],
        ],
        [
            'email' => 'jane_doe@doe.com',
            'password' => 'jane123',
            'roles' => [],
            'userData' => [
                'firstName' => 'Jane',
                'lastName' => 'Doe',
                'phone' => '011-962-7516',
                'gender' => 'female',
                'dayOfBirth' => '1981-01-01',
                'city' => 'Doetown',
                'country' => 'US',
            ],
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
            $user->setEmail($userData['email']);
            $user->setPassword(
                $this->passwordEncoder->encodePassword(
                    $user, $userData['password']
                )
            );
            $user->setRoles($userData['roles']);


            // UserData
            $userDataEntity = new UserData();
            $userDataEntity->setFirstName($userData['userData']['firstName']);
            $userDataEntity->setLastName($userData['userData']['lastName']);
            $userDataEntity->setPhone($userData['userData']['phone']);
            $userDataEntity->setGender($userData['userData']['gender']);
            $userDataEntity->setDayOfBirth(new \DateTime($userData['userData']['dayOfBirth']));
            $userDataEntity->setCity($userData['userData']['city']);
            $userDataEntity->setCountry($userData['userData']['country']);
            $userDataEntity->setRegistered(new \DateTime(sprintf('-%d days', rand(1, 100))));

            $user->setUserData($userDataEntity);

            $manager->persist($user);
        }
        $manager->flush();
    }
}
