<?php

namespace Tests\Feature;

use App\Http\Resources\ProductsResource;
use App\Models\Category;
use Database\Seeders\CategorySeeder;
use Database\Seeders\ProductSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use function PHPUnit\Framework\assertNotNull;

class ResourceTest extends TestCase
{
    protected function setUp(): void
    {

        parent::setUp();

//        DB::delete('delete from products');
        DB::delete('delete from categories');

//        DB::table('products')->truncate();
//        DB::table('categories')->truncate();

    }


    /**
     * A basic feature test example.
     */
    public function testResource(): void
    {
        $this->seed([CategorySeeder::class]);
        $category = Category::first();

        $this->get("/categories/$category->id")
            ->assertJson([
                'Category' => [
                    'id' => $category->id,
                    'name' => $category->name,
                    'created_at' => $category->created_at->toJSON(),
                    'updated_at' => $category->updated_at->toJSON(),
                ]
            ]);
    }

    public function testProductsResource()
    {

        $this->seed([CategorySeeder::class, ProductSeeder::class]);

        $category = Category::query()->first();

        assertNotNull($category->products);

//        self::assertTrue(true);
    }


}
