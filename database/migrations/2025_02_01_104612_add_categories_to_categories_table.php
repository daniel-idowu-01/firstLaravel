<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $categories = [
            ['id' => 1, 'name' => 'AI/ML', 'slug' => 'ai-ml', 'description' => 'Artificial Intelligence and Machine Learning'],
            ['id' => 2, 'name' => 'Web Development', 'slug' => 'web-development', 'description' => 'Web Development'],
            ['id' => 3, 'name' => 'Mobile Development', 'slug' => 'mobile-development', 'description' => 'Mobile Development'],
            ['id' => 4, 'name' => 'Game Development', 'slug' => 'game-development', 'description' => 'Game Development'],
            ['id' => 5, 'name' => 'DevOps', 'slug' => 'devops', 'description' => 'DevOps'],
            ['id' => 6, 'name' => 'Cybersecurity', 'slug' => 'cybersecurity', 'description' => 'Cybersecurity'],
            ['id' => 7, 'name' => 'Data Science', 'slug' => 'data-science', 'description' => 'Data Science'],
            ['id' => 8, 'name' => 'Cloud Computing', 'slug' => 'cloud-computing', 'description' => 'Cloud Computing'],
            ['id' => 9, 'name' => 'IoT', 'slug' => 'iot', 'description' => 'Internet of Things'],
            ['id' => 10, 'name' => 'Blockchain', 'slug' => 'blockchain', 'description' => 'Blockchain'],
            ['id' => 11, 'name' => 'AR/VR', 'slug' => 'ar-vr', 'description' => 'Augmented Reality and Virtual Reality'],
            ['id' => 12, 'name' => 'Quantum Computing', 'slug' => 'quantum-computing', 'description' => 'Quantum Computing'],
            ['id' => 13, 'name' => 'Programming', 'slug' => 'programming', 'description' => 'Programming'],
            ['id' => 14, 'name' => 'Miscellaneous', 'slug' => 'miscellaneous', 'description' => 'Miscellaneous'],
        ];

        DB::table('categories')->insert($categories);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('categories')->whereIn('id', range(1, 14))->delete();
    }
};
