<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ids = [
            [env('SUPER_CATEGORY'),'Uncategorized','Categoria Geral',null,date('Y-m-d H:i:s'),date('Y-m-d H:i:s'),null],
            [env('SUPER_CATEGORY_BLOG'),'Blog','Categorias do Blog',null,date('Y-m-d H:i:s'),date('Y-m-d H:i:s'),null],
            [env('SUPER_CATEGORY_OFFER'),'Ofertas','Categorias das Ofertas',null,date('Y-m-d H:i:s'),date('Y-m-d H:i:s'),null]
        ];
        foreach($ids as $id)
        {
            try{
                \Illuminate\Support\Facades\DB::table('categories')->insert($id);
            }catch (\Exception $e){
                print("Exception: {$e->getMessage()}");
            }
        }
    }
}
