<?php

/*
 * This file is part of the XiideaEasyAuditBundle package.
 *
 * (c) Xiidea <http://www.xiidea.net>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Xiidea\EasyAuditBundle\Tests\Fixtures\Common;

use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Xiidea\EasyAuditBundle\Tests\Fixtures\ORM\UserEntity;

$defaultUser = new UserEntity(2, 'user');
if(!defined('DEFAULT_USER')) {
    define('DEFAULT_USER', $defaultUser);
}

class DummyToken implements TokenInterface
{
    private $user;

    public function __construct($user = DEFAULT_USER)
    {
        $this->user = $user;
    }

    public function getUser(): ?UserInterface
    {
        return $this->user;
    }

    public function getRoles()
    {
        if (!is_object($this->user)) {
            return $this->user;
        }

        if (method_exists($this->user, 'getRoles')) {
            return $this->user->getRoles();
        }

        return array();
    }

    /**
     * String representation of object.
     *
     * @see http://php.net/manual/en/serializable.serialize.php
     *
     * @return string the string representation of the object or null
     *
     * @since 5.1.0
     */
    public function serialize()
    {
        return;
    }

    /**
     * Constructs the object.
     *
     * @see http://php.net/manual/en/serializable.unserialize.php
     *
     * @param string $serialized <p>
     *                           The string representation of the object.
     *                           </p>
     *
     * @since 5.1.0
     */
    public function unserialize($serialized)
    {
        return;
    }

    /**
     * Returns a string representation of the Token.
     *
     * This is only to be used for debugging purposes.
     *
     * @return string
     */
    public function __toString(): string
    {
        return '';
    }

    /**
     * Returns the user credentials.
     *
     * @return mixed The user credentials
     */
    public function getCredentials()
    {
        return;
    }

    /**
     * Sets a user.
     *
     * @param mixed $user
     */
    public function setUser($user): void
    {
        return;
    }

    /**
     * Returns the username.
     *
     * @return string
     */
    public function getUsername()
    {
        if (!is_object($this->user)) {
            return $this->user;
        }

        if (method_exists($this->user, 'getUsername')) {
            return $this->user->getUsername();
        }

        return null;
    }

    /**
     * Returns whether the user is authenticated or not.
     *
     * @return bool true if the token has been authenticated, false otherwise
     */
    public function isAuthenticated()
    {
        return false;
    }

    /**
     * Sets the authenticated flag.
     *
     * @param bool $isAuthenticated The authenticated flag
     */
    public function setAuthenticated(bool $isAuthenticated)
    {
        return;
    }

    /**
     * Removes sensitive information from the token.
     */
    public function eraseCredentials(): void
    {
    }


    /**
     * Sets the token attributes.
     *
     * @param array $attributes The token attributes
     */
    public function setAttributes(array $attributes): void
    {
    }

    /**
     * Returns true if the attribute exists.
     *
     * @param string $name The attribute name
     *
     * @return bool true if the attribute exists, false otherwise
     */
    public function hasAttribute(string $name): bool
    {
        return false;
    }

    /**
     * Returns an attribute value.
     *
     * @param string $name The attribute name
     *
     * @return mixed The attribute value
     *
     * @throws \InvalidArgumentException When attribute doesn't exist for this token
     */
    public function getAttribute(string $name): mixed
    {
        return null;
    }

    /**
     * Sets an attribute.
     *
     * @param string $name  The attribute name
     * @param mixed  $value The attribute value
     */
    public function setAttribute(string $name, $value): void
    {
    }

    /**
     * @inheritDoc
     */
    public function getRoleNames(): array
    {
        // TODO: Implement getRoleNames() method.
    }

    /**
     * @inheritDoc
     */
    public function __serialize(): array
    {
        // TODO: Implement __serialize() method.
    }

    /**
     * @inheritDoc
     */
    public function __unserialize(array $data): void
    {
        // TODO: Implement __unserialize() method.
    }

    public function getUserIdentifier(): string
    {
        return 'username';
    }

    public function getAttributes(): array
    {
        return [];
    }
}
