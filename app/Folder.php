<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    public function tasks()
    {
        return $this->hasMany('App\Task');
    }
}

// SQLSTATE[23000]:
// Integrity constraint violation: 1452
// Cannot add or update a child row: a foreign key constraint fails (`la_todo`.`tasks`, CONSTRAINT `tasks_folder_id_foreign` FOREIGN KEY (`folder_id`) REFERENCES `users` (`id`) ON DELETE CASCADE) (SQL: insert into `tasks` (`title`, `due_date`, `folder_id`, `updated_at`, `created_at`) values (真心こめて, 2020/06/27, 2, 2020-06-19 12:57:02, 2020-06-19 12:57:02))
