<?php

namespace AppBundle\Services;

use Symfony\Component\Security\Core\Role\RoleHierarchyInterface;

/**
 * Roles helper displays roles set in config.
 */
class RolesHelper
{

    CONST ROLES = [
        "ROLE_USER" => "User",
        "ROLE_ADMIN" => "Admin",
        "ROLE_SUPER_ADMIN" => "Super Admin"
    ];

    private $rolesHierarchy;

    /**
     * RolesHelper constructor.
     * @param $rolesHierarchy
     */
    public function __construct(RoleHierarchyInterface $rolesHierarchy)
    {
        $this->rolesHierarchy = $rolesHierarchy;
    }

    /**
     * Return roles.
     *
     * @return array
     */
    public function getRoles()
    {
        $roles = array();

        array_walk_recursive($this->rolesHierarchy, function ($val) use (&$roles) {

            $roles[self::ROLES[$val]] = $val;
        });

        return array_unique($roles);
    }
}