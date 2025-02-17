<?php

declare(strict_types=1);

namespace App\User\Infrastructure\Repository;

use App\User\Application\Exception\UserNotFoundException;
use App\User\Domain\Entity\User;
use App\User\Domain\Repository\UserRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

final class UserRepository extends ServiceEntityRepository implements UserRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function isEmailAvailable(string $email): bool
    {
        return is_null($this->findOneBy(['email.email' => $email]));
    }

    public function isPhoneAvailable(int $phone): bool
    {
        return is_null($this->findOneBy(['phone.phone' => $phone]));
    }

    public function findById(string $id): ?User
    {
        return $this->findOneBy(['id' => $id]);
    }

    public function findByEmail(string $email): ?User
    {
        return $this->findOneBy(['email.email' => $email]);
    }

    public function getById(string $id): User
    {
        $user = $this->findById($id);
        if (true === is_null($user)) {
            throw UserNotFoundException::byId($id);
        }

        return $user;
    }

    public function getByEmail(string $email): User
    {
        $user = $this->findByEmail($email);
        if (true === is_null($user)) {
            throw UserNotFoundException::byEmail($email);
        }

        return $user;
    }

    public function add(User $user): void
    {
        $this->getEntityManager()->persist($user);
    }
}
