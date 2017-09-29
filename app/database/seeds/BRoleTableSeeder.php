<?php

class BRoleTableSeeder extends Seeder{
    public function run(){
        $data = array(
            [ 'id' => '1', 'name' => 'ADMIN', 'status_id' => '1' ],
            [ 'id' => '2', 'name' => 'END USER', 'status_id' => '1' ]
        );

        foreach($data as $dt){
            Role::create($dt);
        }
    }
}