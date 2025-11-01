<?php
// app/Models/Role.php
namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    protected $guarded = [];
}

// app/Models/Permission.php
namespace App\Models;

use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    protected $guarded = [];
}

