<?php

declare(strict_types=1);

namespace App\User\Domain\Repository;

use App\User\Application\Exception\UserNotFoundException;
use App\User\Domain\Entity\User;

interface UserRepositoryInterface
{
    public function isEmailAvailable(string $email): bool;

    public function isPhoneAvailable(int $phone): bool;

    public function findById(string $id): ?User;

    public function findByEmail(string $email): ?User;

    /**
     * @throws UserNotFoundException
     */
    public function getById(string $id): User;

    /**
     * @throws UserNotFoundException
     */
    public function getByEmail(string $email): User;

    public function add(User $user): void;
}
