<?php

class AStatusTableSeeder extends Seeder{
    public function run(){
        $data = array(
            [ 'name' => 'Active' ],
            [ 'name' => 'Not Active' ],
            [ 'name' => 'Requested' ],
            [ 'name' => 'Pending' ],
            [ 'name' => 'Approved' ],
            [ 'name' => 'Expired' ],
        );

        foreach($data as $dt){
            Status::create($dt);
        }
    }
}