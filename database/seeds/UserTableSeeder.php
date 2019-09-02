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
            ['id'=>env('ROOT'),'name'=>'Administrador','username'=>'administrator','email'=>'administrator@reidasvendas.com.br','email_verified_at'=>null,'password'=>'IS_NOT_PASSWORD','remember_token'=>null,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s'),'deleted_at'=>null]
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
