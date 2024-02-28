<?php

namespace Database\Seeders;

use App\Models\TemplateImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TemplateImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TemplateImage::create([
            'template_id' => '1',
            'name' => '280220241709110066-1.png',
        ]);
    }
}
