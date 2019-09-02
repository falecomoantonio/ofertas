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
            ['id'=>env('SUPER_CATEGORY'),'name'=>'Uncategorized','description'=>'Categoria Geral','parent_id'=>null,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s'),'deleted_at'=>null],
            ['id'=>env('SUPER_CATEGORY_BLOG'),'name'=>'Blog','description'=>'Categorias do Blog','parent_id'=>env('SUPER_CATEGORY'),'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s'),'deleted_at'=>null],
            ['id'=>env('SUPER_CATEGORY_OFFER'),'name'=>'Ofertas','description'=>'Categorias das Ofertas','parent_id'=>env('SUPER_CATEGORY'),'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s'),'deleted_at'=>null]
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
