<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ids = [
            ['Administrador','administrator','administrator@reidasvendas.com.br',null,'IS_NOT_PASSWORD',null,date('Y-m-d H:i:s'),date('Y-m-d H:i:s'),null]
        ];
        foreach($ids as $id)
        {
            try{
                \Illuminate\Support\Facades\DB::table('users')->insert($id);
            }catch (\Exception $e){
                print("Exception: {$e->getMessage()}");
            }
        }
    }
}
