<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';
    protected $guarded = [];
    protected $timestamp = true;

    /**
     * Get the jobs belongs to the category.
     */
    public function jobs()
    {
        return $this->hasMany(Job::class)->orderBy('is_premium', 'desc');
    }
}

?>