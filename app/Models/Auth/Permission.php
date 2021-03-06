<?php

namespace App\Models\Auth;

use Spatie\Permission\Models\Permission as SpatiePermission;

/**
 * App\Models\Auth\Permission.
 *
 * @property int                                                              $id
 * @property string                                                           $name
 * @property string                                                           $guard_name
 * @property \Illuminate\Support\Carbon|null                                  $created_at
 * @property \Illuminate\Support\Carbon|null                                  $updated_at
 * @property \Illuminate\Database\Eloquent\Collection|Permission[]            $permissions
 * @property int|null                                                         $permissions_count
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Auth\Role[] $roles
 * @property int|null                                                         $roles_count
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Auth\User[] $users
 * @property int|null                                                         $users_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Permission extends SpatiePermission
{
}
