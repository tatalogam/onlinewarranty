<?php

class CGroupRolesTableSeeder extends Seeder{
    public function run(){
        $data = array(
            [ 'role_id' => '1', 'window_id' => '1', 'attribute' => '{"C":"1","R":"1","U":"1","D":"1"}', 'status_id' => '1' ],
            [ 'role_id' => '1', 'window_id' => '2', 'attribute' => '{"C":"1","R":"1","U":"1","D":"1"}', 'status_id' => '1' ],
            [ 'role_id' => '1', 'window_id' => '3', 'attribute' => '{"C":"1","R":"1","U":"1","D":"1"}', 'status_id' => '1' ],
            [ 'role_id' => '1', 'window_id' => '4', 'attribute' => '{"C":"1","R":"1","U":"1","D":"1"}', 'status_id' => '1' ],
            [ 'role_id' => '1', 'window_id' => '5', 'attribute' => '{"C":"1","R":"1","U":"1","D":"1"}', 'status_id' => '1' ],
            [ 'role_id' => '2', 'window_id' => '5', 'attribute' => '{"C":"0","R":"1","U":"0","D":"1"}', 'status_id' => '1' ]
        );

        foreach($data as $dt){
            GroupRoles::create($dt);
        }
    }
}