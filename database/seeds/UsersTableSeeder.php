<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat = factory(App\Category::class)->create();
        $subcat = factory(App\Subcategory::class)->create(['category_id'=>$cat->id]);
        factory(App\Subcategory::class)->create(['category_id'=>$cat->id]);
        factory(App\Subcategory::class)->create(['category_id'=>$cat->id]);
        factory(App\Subcategory::class)->create(['category_id'=>$cat->id]);
        factory(App\Subcategory::class)->create(['category_id'=>$cat->id]);
        for($i = 0; $i < 10; $i++) {            
            $user = factory(App\User::class)->create()->assignRole('user');
            factory(App\Profile::class)->create([
                'user_id' => $user->id,
                'subcategory_id' => $subcat->id
            ]);
            factory(App\Post::class)->create(['user_id' => $user->id]);
        }  
        $cat = factory(App\Category::class)->create();
        $subcat = factory(App\Subcategory::class)->create(['category_id'=>$cat->id]);
        factory(App\Subcategory::class)->create(['category_id'=>$cat->id]);
        factory(App\Subcategory::class)->create(['category_id'=>$cat->id]);
        factory(App\Subcategory::class)->create(['category_id'=>$cat->id]);
        factory(App\Subcategory::class)->create(['category_id'=>$cat->id]);
        for($i = 0; $i < 10; $i++) {            
            $user = factory(App\User::class)->create()->assignRole('user');
            factory(App\Profile::class)->create([
                'user_id' => $user->id,
                'subcategory_id' => $subcat->id
            ]);
            factory(App\Post::class)->create(['user_id' => $user->id]);
        }  
        $cat = factory(App\Category::class)->create();
        $subcat = factory(App\Subcategory::class)->create(['category_id'=>$cat->id]);
        factory(App\Subcategory::class)->create(['category_id'=>$cat->id]);
        factory(App\Subcategory::class)->create(['category_id'=>$cat->id]);
        factory(App\Subcategory::class)->create(['category_id'=>$cat->id]);
        factory(App\Subcategory::class)->create(['category_id'=>$cat->id]);
        for($i = 0; $i < 10; $i++) {            
            $user = factory(App\User::class)->create()->assignRole('user');
            factory(App\Profile::class)->create([
                'user_id' => $user->id,
                'subcategory_id' => $subcat->id
            ]);
            factory(App\Post::class)->create(['user_id' => $user->id]);
        }  
        $cat = factory(App\Category::class)->create();
        $subcat = factory(App\Subcategory::class)->create(['category_id'=>$cat->id]);
        factory(App\Subcategory::class)->create(['category_id'=>$cat->id]);
        factory(App\Subcategory::class)->create(['category_id'=>$cat->id]);
        factory(App\Subcategory::class)->create(['category_id'=>$cat->id]);
        for($i = 0; $i < 10; $i++) {            
            $user = factory(App\User::class)->create()->assignRole('user');
            factory(App\Profile::class)->create([
                'user_id' => $user->id,
                'subcategory_id' => $subcat->id
            ]);
            factory(App\Post::class)->create(['user_id' => $user->id]);
        }  
        $cat = factory(App\Category::class)->create();
        $subcat = factory(App\Subcategory::class)->create(['category_id'=>$cat->id]);
        factory(App\Subcategory::class)->create(['category_id'=>$cat->id]);
        factory(App\Subcategory::class)->create(['category_id'=>$cat->id]);
        factory(App\Subcategory::class)->create(['category_id'=>$cat->id]);
        for($i = 0; $i < 10; $i++) {            
            $user = factory(App\User::class)->create()->assignRole('user');
            factory(App\Profile::class)->create([
                'user_id' => $user->id,
                'subcategory_id' => $subcat->id
            ]);
        }  
    }
}
