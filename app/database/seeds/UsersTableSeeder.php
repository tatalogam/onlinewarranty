<?php

class UsersTableSeeder extends Seeder{
    public function run(){
        $data = array(
            [
                'id' => '1',
                'email' => 'contact@tatalogam.com',
                'username' => 'admin',
                'password' => '$2y$10$3GWJJxdujMyR8GpY9mIqoetaE6y4wPnnCVc/BRGNDHaTRu2Pb7Gpy',
                'remember_token' => str_random(50),
                'role_id' => '1',
                'nik' => '3374010305920000',
                'firstname' => 'Tatalogam',
                'lastname'=> 'Admin',
                'phone' => '+62-21-5688284-85 Ext 666',
                'status_id' => '1'
            ],
            [
                'id' => '2',
                'email' => 'alexander.gunawan@tatalogam.com',
                'username' => 'alexander',
                'password' => '$2y$10$3GWJJxdujMyR8GpY9mIqoetaE6y4wPnnCVc/BRGNDHaTRu2Pb7Gpy',
                'remember_token' => str_random(50),
                'role_id' => '2',
                'nik' => '3374010305920001',
                'firstname' => 'Alexander',
                'lastname'=> 'Gunawan',
                'phone' => '+6281318619682',
                'status_id' => '1'
            ]
        );

        foreach($data as $dt){
            Users::create($dt);
        }
    }
}