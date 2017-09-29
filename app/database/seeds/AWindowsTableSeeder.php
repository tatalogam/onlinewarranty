<?php

class AWindowsTableSeeder extends Seeder{
    public function run(){
        $data = array(
            [ 'id' => '1', 'name' => 'ROLE', 'description' => 'Managing Role', 'section' => 'USER', 'status_id' => '1' ],
            [ 'id' => '2', 'name' => 'MANAGE USER', 'description' => 'Create / Deactivating Users', 'section' => 'USER', 'status_id' => '1' ],
            [ 'id' => '3', 'name' => 'MANAGE PRODUCT', 'description' => 'Create / Deactivating Products', 'section' => 'PRODUCT', 'status_id' => '1' ],
            [ 'id' => '4', 'name' => 'PENDING WARRANTY', 'description' => 'Approve Pending Warranties', 'section' => 'WARRANTY', 'status_id' => '1' ],
            [ 'id' => '5', 'name' => 'VIEW WARRANTY', 'description' => 'Showing List of Warranties', 'section' => 'WARRANTY', 'status_id' => '1' ]
        );

        foreach($data as $dt){
            Windows::create($dt);
        }
    }
}