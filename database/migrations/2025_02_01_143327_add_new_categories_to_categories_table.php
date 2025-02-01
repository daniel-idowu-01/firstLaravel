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
            ['name' => 'General Discussion', 'slug' => 'general-discussion', 'description' => 'A place for users to discuss anything not covered by other categories'],
            ['name' => 'Introductions', 'slug' => 'introductions', 'description' => 'New users can introduce themselves to the community'],
            ['name' => 'Announcements', 'slug' => 'announcements', 'description' => 'Important updates and news from the forum team or community leaders'],
            ['name' => 'Technology', 'slug' => 'technology', 'description' => 'Discuss everything about tech, including software, hardware, gadgets, and programming'],
            ['name' => 'Gaming', 'slug' => 'gaming', 'description' => 'A space for gamers to discuss video games, consoles, gaming news, and reviews'],
            ['name' => 'Lifestyle', 'slug' => 'lifestyle', 'description' => 'Talk about fashion, fitness, travel, hobbies, and personal interests'],
            ['name' => 'Health & Wellness', 'slug' => 'health-wellness', 'description' => 'Share tips and advice on mental health, physical health, and overall wellness'],
            ['name' => 'Education', 'slug' => 'education', 'description' => 'Discuss academic subjects, online courses, exams, and learning resources'],
            ['name' => 'Entertainment', 'slug' => 'entertainment', 'description' => 'Movies, TV shows, music, and all things related to entertainment'],
            ['name' => 'Business & Finance', 'slug' => 'business-finance', 'description' => 'Topics related to startups, entrepreneurship, personal finance, and investments'],
            ['name' => 'Jobs & Career', 'slug' => 'jobs-career', 'description' => 'Advice and discussions about finding a job, career growth, and workplace culture'],
            ['name' => 'Art & Creativity', 'slug' => 'art-creativity', 'description' => 'Share your artwork, photography, writing, or discuss anything related to creative pursuits'],
            ['name' => 'Support & Help', 'slug' => 'support-help', 'description' => 'A place for users to ask for help or offer assistance on technical issues, problems, or advice'],
            ['name' => 'Off-topic', 'slug' => 'off-topic', 'description' => 'Conversations that don’t fit into other categories'],
            ['name' => 'Marketplace', 'slug' => 'marketplace', 'description' => 'A place for buying, selling, and trading goods or services'],
            ['name' => 'Local Communities', 'slug' => 'local-communities', 'description' => 'Local meetups, events, and discussions specific to geographic areas'],
            ['name' => 'Programming & Development', 'slug' => 'programming-development', 'description' => 'Discussions on coding, programming languages, development frameworks, and software engineering'],
            ['name' => 'Science & Nature', 'slug' => 'science-nature', 'description' => 'Topics related to biology, chemistry, physics, and the natural world'],
            ['name' => 'Food & Cooking', 'slug' => 'food-cooking', 'description' => 'Share recipes, cooking tips, or talk about your favorite meals and diets'],
            ['name' => 'Politics & Society', 'slug' => 'politics-society', 'description' => 'Discussions on politics, society, current events, and global issues'],
        ];

        DB::table('categories')->insert($categories);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('categories')->truncate(); // This will delete all rows in the table
    }
};
