<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Size;
use Tests\TestCase;

class SizesControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_all_sizes()
    {
        $sizes = Size::factory()->count(3)->create();

        $response = $this->get(route('sizes.index'));

        $response->assertStatus(200);
        $response->assertViewIs('sizes.index');
        $response->assertViewHas('sizes');
        foreach ($sizes as $size) {
            $response->assertSeeText($size->size);
        }
    }

    /** @test */
    public function it_can_show_the_create_size_form()
    {
        $response = $this->get(route('sizes.create'));

        $response->assertStatus(200);
        $response->assertViewIs('sizes.create');
    }

    /** @test */
    public function it_can_store_a_new_size()
    {
        $sizeData = [
            'size' => 'M'
        ];

        $response = $this->post(route('sizes.store'), $sizeData);

        $response->assertStatus(302);
        $response->assertSessionHas('flash_notification');
        $this->assertDatabaseHas('sizes', $sizeData);
    }

    /** @test */
    public function it_can_show_the_edit_size_form()
    {
        $size = Size::factory()->create();

        $response = $this->get(route('sizes.edit', $size->id));

        $response->assertStatus(200);
        $response->assertViewIs('sizes.edit');
        $response->assertViewHas('size');
    }

    /** @test */
    public function it_can_update_an_existing_size()
    {
        $size = Size::factory()->create();
        $updatedSizeData = [
            'size' => 'L'
        ];

        $response = $this->put(route('sizes.update', $size->id), $updatedSizeData);

        $response->assertStatus(302);
        $response->assertSessionHas('flash_notification');
        $this->assertDatabaseHas('sizes', $updatedSizeData);
    }

    /** @test */
    public function it_can_delete_an_existing_size()
    {
        $size = Size::factory()->create();

        $response = $this->delete(route('sizes.destroy', $size->id));

        $response->assertStatus(302);
        $response->assertSessionHas('flash_notification');
        $this->assertDatabaseMissing('sizes', ['id' => $size->id]);
    }
}