<?php

namespace Aaran\Website\Database\Seeders;

use Aaran\Website\Models\DevTeam;
use Illuminate\Database\Seeder;

class DevTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teams = [
            [
                'vname' => 'Sundar',
                'role' => 'Founder & CEO',
                'photo' => 'sundar.jpg',
                'about' => 'I started this company with a simple goal — to make billing and accounting easier for everyone. With the right technology and a strong team, we’re turning that vision into reality every day.”
As the founder and driving force behind the company, Sundar brings over a decade of experience in the software industry. His leadership ensures the company stays focused on innovation, quality, and customer value.',
                'mail' => 'sundar@sundar.com',
                'mobile' => '9655227738',
                'fb' => 'https://www.facebook.com/sundarteam',
                'twitter' => 'https://twitter.com/sundarteam',
                'msg' => 'Sundar Team',
                'active_id' => 1,
            ],
            [
                'vname' => 'Rajesh',
                'role' => 'Web Developer & Team Leader',
                'photo' => 'team/rajesh.png',
                'about' => "A clean, efficient, and responsive interface isn't just design — it's the user's first impression. My job is to make that count.”
Rajesh leads the web development team with precision and creativity. He focuses on building user-friendly, high-performance interfaces that make managing GST and accounts effortless.
",
                'mail' => 'haris@example.com',
                'mobile' => '1234567891',
                'fb' => null,
                'twitter' => null,
                'msg' => null,
                'active_id' => 1,
            ],
            [
                'vname' => 'Haris',
                'role' => 'Business Analyst & Team Leader',
                'photo' => 'haris.jpg',
                'about' => "Understanding the client's needs and translating them into practical software solutions is where I thrive. Good analysis leads to great results.”
Haris bridges the gap between business requirements and technical solutions. With a strong eye for detail and a deep understanding of market needs, he ensures that every project aligns with client expectations.
",
                'mail' => 'haris@example.com',
                'mobile' => '1234567891',
                'fb' => 'https://www.facebook.com/haristeam',
                'twitter' => 'https://twitter.com/haristeam',
                'msg' => 'Haris Team',
                'active_id' => 1,
            ],
            [
                'vname' => 'Muthukumaran',
                'role' => 'Software Developer & Team Leader
',
                'photo' => 'muthukumaran.jpg',
                'about' => "I believe the best software is not just functional, but also reliable and scalable. That’s what I strive to deliver every day.”
Muthukumaran oversees the development of backend systems and ensures our GST software runs smoothly under all conditions. His coding expertise and team leadership help deliver robust, high-quality features.
",
                'mail' => 'muthu@example.com',
                'mobile' => '1234567892',
                'fb' => 'https://www.facebook.com/muthukumaran',
                'twitter' => 'https://twitter.com/muthukumaran',
                'msg' => 'Haris Team',
                'active_id' => 1,
            ],
            [
                'vname' => 'Saran',
                'role' => 'Full Stack Developer/Team Leader',
                'photo' => 'saran.jpg',
                'about' => "I enjoy working on both the front and back ends — it allows me to see the full picture and build complete solutions for real problems.”
Saran leads full stack development projects, combining technical knowledge and strategic thinking to implement features that are both functional and user-focused.
",
                'mail' => 'saran@example.com',
                'mobile' => '1234567893',
                'fb' => 'https://www.facebook.com/saran',
                'twitter' => 'https://twitter.com/saran',
                'msg' => 'Haris Team',
                'active_id' => 1,
            ],
            [
                'vname' => 'Arunesh',
                'role' => 'Full Stack Developer',
                'photo' => 'arunesh.jpg',
                'about' => 'Every problem is an opportunity to learn and improve. I’m here to build tools that genuinely help people manage their business better.”
Arunesh works across both frontend and backend development. His adaptability and commitment to clean code contribute significantly to the success of our GST billing platform.
',
                'mail' => 'saran@example.com',
                'mobile' => '1234567893',
                'fb' => 'https://www.facebook.com/arunesh',
                'twitter' => 'https://twitter.com/arunesh',
                'msg' => 'Haris Team',
                'active_id' => 1,
            ],
            [
                'vname' => 'Mukila',
                'role' => 'Customer Success Manager',
                'photo' => 'mukila.jpg',
                'about' => 'Our users are at the heart of everything we do. I’m here to make sure they’re supported, heard, and completely satisfied with their experience.”
Mukila leads customer support and success efforts, ensuring every client feels confident using the software. Her empathetic approach and quick problem-solving make her an essential part of the customer journey.',
                'mail' => 'saran@example.com',
                'mobile' => '1234567893',
                'fb' => 'https://www.facebook.com/arunesh',
                'twitter' => 'https://twitter.com/arunesh',
                'msg' => 'Haris Team',
                'active_id' => 1,
            ],
        ];

        foreach ($teams as $team) {
            DevTeam::create($team);
        }
    }
}
