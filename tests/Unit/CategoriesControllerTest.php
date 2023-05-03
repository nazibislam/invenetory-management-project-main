<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Brand;
use Tests\TestCase;

class BrandsControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_all_brands()
    {
        $brands = Brand::factory()->count(3)->create();

        $response = $this->get(route('brands.index'));

        $response->assertStatus(200);
        $response->assertViewIs('brands.index');
        $response->assertViewHas('brands');
        foreach ($brands as $brand) {
            $response->assertSeeText($brand->name);
        }
    }

    /** @test */
    public function it_can_store_a_new_brand()
    {
        $brandData = [
            'name' => 'Test Brand'
        ];

        $response = $this->post(route('brands.store'), $brandData);

        $response->assertStatus(302);
        $response->assertSessionHas('success');
        $this->assertDatabaseHas('brands', $brandData);
    }

    /** @test */
    public function it_can_update_an_existing_brand()
    {
        $brand = Brand::factory()->create();
        $updatedBrandData = [
            'name' => 'Updated Brand'
        ];

        $response = $this->put(route('brands.update', $brand->id), $updatedBrandData);

        $response->assertStatus(302);
        $response->assertSessionHas('success');
        $this->assertDatabaseHas('brands', $updatedBrandData);
    }

    /** @test */
    public function it_can_delete_a_brand()
    {
        $brand = Brand::factory()->create();

        $response = $this->delete(route('brands.destroy', $brand->id));

        $response->assertStatus(302);
        $response->assertSessionHas('success');
        $this->assertDatabaseMissing('brands', ['id' => $brand->id]);
    }
}