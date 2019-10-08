<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
	public function roles() {
		return $this->belongsToMany(Role::class,'roles_permissions');
    }
}
