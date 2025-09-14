<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TemplateSeeder extends Seeder
{
    public function run()
    {
        $templates = [
            // Wedding Templates
            [
                'name' => 'Elegant Wedding',
                'type' => 'wedding',
                'preview_url' => 'https://picsum.photos/seed/wedding1/400/300.jpg',
                'content_structure' => json_encode([
                    'header' => 'Wedding Invitation',
                    'couple_names' => ['groom_name', 'bride_name'],
                    'date_time' => ['wedding_date', 'wedding_time'],
                    'location' => 'location',
                    'contact' => 'contact'
                ])
            ],
            [
                'name' => 'Romantic Garden',
                'type' => 'wedding',
                'preview_url' => 'https://picsum.photos/seed/wedding2/400/300.jpg',
                'content_structure' => json_encode([
                    'header' => 'Garden Wedding',
                    'couple_names' => ['groom_name', 'bride_name'],
                    'date_time' => ['wedding_date', 'wedding_time'],
                    'location' => 'location',
                    'contact' => 'contact'
                ])
            ],
            [
                'name' => 'Classic Gold',
                'type' => 'wedding',
                'preview_url' => 'https://picsum.photos/seed/wedding3/400/300.jpg',
                'content_structure' => json_encode([
                    'header' => 'Wedding Ceremony',
                    'couple_names' => ['groom_name', 'bride_name'],
                    'date_time' => ['wedding_date', 'wedding_time'],
                    'location' => 'location',
                    'contact' => 'contact'
                ])
            ],
            
            // Engagement Templates
            [
                'name' => 'Love Promise',
                'type' => 'engagement',
                'preview_url' => 'https://picsum.photos/seed/engagement1/400/300.jpg',
                'content_structure' => json_encode([
                    'header' => 'Engagement Invitation',
                    'couple_names' => ['man_name', 'woman_name'],
                    'date_time' => ['engagement_date', 'engagement_time'],
                    'location' => 'location',
                    'contact' => 'contact'
                ])
            ],
            [
                'name' => 'Diamond Ring',
                'type' => 'engagement',
                'preview_url' => 'https://picsum.photos/seed/engagement2/400/300.jpg',
                'content_structure' => json_encode([
                    'header' => 'Celebration of Love',
                    'couple_names' => ['man_name', 'woman_name'],
                    'date_time' => ['engagement_date', 'engagement_time'],
                    'location' => 'location',
                    'contact' => 'contact'
                ])
            ],
            
            // Birthday Templates
            [
                'name' => 'Happy Birthday',
                'type' => 'birthday',
                'preview_url' => 'https://picsum.photos/seed/birthday1/400/300.jpg',
                'content_structure' => json_encode([
                    'header' => 'Birthday Celebration',
                    'person_name' => 'birthday_person_name',
                    'age' => 'age',
                    'date_time' => ['birthday_date', 'birthday_time'],
                    'location' => 'location',
                    'contact' => 'contact'
                ])
            ],
            [
                'name' => 'Milestone Celebration',
                'type' => 'birthday',
                'preview_url' => 'https://picsum.photos/seed/birthday2/400/300.jpg',
                'content_structure' => json_encode([
                    'header' => 'Special Birthday',
                    'person_name' => 'birthday_person_name',
                    'age' => 'age',
                    'date_time' => ['birthday_date', 'birthday_time'],
                    'location' => 'location',
                    'contact' => 'contact'
                ])
            ],
            
            // Graduation Templates
            [
                'name' => 'Achievement Unlocked',
                'type' => 'graduation',
                'preview_url' => 'https://picsum.photos/seed/graduation1/400/300.jpg',
                'content_structure' => json_encode([
                    'header' => 'Graduation Ceremony',
                    'graduate_name' => 'graduate_name',
                    'faculty' => 'faculty',
                    'date_time' => ['graduation_date', 'graduation_time'],
                    'location' => 'location',
                    'contact' => 'contact'
                ])
            ],
            [
                'name' => 'Future Graduate',
                'type' => 'graduation',
                'preview_url' => 'https://picsum.photos/seed/graduation2/400/300.jpg',
                'content_structure' => json_encode([
                    'header' => 'Graduation Day',
                    'graduate_name' => 'graduate_name',
                    'faculty' => 'faculty',
                    'date_time' => ['graduation_date', 'graduation_time'],
                    'location' => 'location',
                    'contact' => 'contact'
                ])
            ],
            [
                'name' => 'Academic Excellence',
                'type' => 'graduation',
                'preview_url' => 'https://picsum.photos/seed/graduation3/400/300.jpg',
                'content_structure' => json_encode([
                    'header' => 'Graduation Celebration',
                    'graduate_name' => 'graduate_name',
                    'faculty' => 'faculty',
                    'date_time' => ['graduation_date', 'graduation_time'],
                    'location' => 'location',
                    'contact' => 'contact'
                ])
            ]
        ];

        $this->db->table('templates')->insertBatch($templates);
    }
}