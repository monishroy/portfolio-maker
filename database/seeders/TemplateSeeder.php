<?php

namespace Database\Seeders;

use App\Models\Template;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Template::create([
            'name' => 'Portfolio Responsive Template',
            'slug' => 'portfolio-responsive-template',
            'path' => 'temp1',
            'description' => '<h2>Features</h2><ul><li>Working contact form using Monish Roy</li><li>Modern design, intuitively coded to adapt to your specific needs</li><li>SASS files included for easy customization (click on View Source Code to see SASS files on GitHub)</li><li>Projects page with easy to customize sections</li><li>Resume page with boxes for work experience, education background, and skills</li></ul>',
        ]);
    }
}
