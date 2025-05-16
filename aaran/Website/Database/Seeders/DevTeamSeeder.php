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
                'role' => 'CEO',
                'photo' => 'team/sundar.png',
                'about' => 'Sundar Team',
                'mail' => 'sundar@sundar.com',
                'mobile' => '9655227738',
                'fb' => 'https://www.facebook.com/sundarteam',
                'twitter' => 'https://twitter.com/sundarteam',
                'msg' => 'Sundar Team',
                'active_id' => 1,
            ],
            [
                'vname' => 'Rajesh',
                'role' => 'Full Stack Developer/Team Leader',
                'photo' => 'team/rajesh.png',
                'about' => 'Haris Team',
                'mail' => 'haris@example.com',
                'mobile' => '1234567891',
                'fb' => null,
                'twitter' => null,
                'msg' => null,
                'active_id' => 1,
            ],
            [
                'vname' => 'Haris',
                'role' => 'Developer/Team Leader',
                'photo' => 'team/haris.png',
                'about' => 'Haris Team',
                'mail' => 'haris@example.com',
                'mobile' => '1234567891',
                'fb' => 'https://www.facebook.com/haristeam',
                'twitter' => 'https://twitter.com/haristeam',
                'msg' => 'Haris Team',
                'active_id' => 1,
            ],
            [
                'vname' => 'Muthukumaran',
                'role' => 'Full Stack Developer/Team Leader',
                'photo' => 'team/muthukumaran.png',
                'about' => 'Haris Team',
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
                'photo' => 'team/saran.png',
                'about' => 'Haris Team',
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
                'photo' => 'team/saran.png',
                'about' => 'Haris Team',
                'mail' => 'saran@example.com',
                'mobile' => '1234567893',
                'fb' => 'https://www.facebook.com/arunesh',
                'twitter' => 'https://twitter.com/arunesh',
                'msg' => 'Haris Team',
                'active_id' => 1,
            ],
            [
                'vname' => 'Mukila',
                'role' => 'Developer',
                'photo' => 'team/saran.png',
                'about' => 'Haris Team',
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
