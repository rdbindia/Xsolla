<?php

namespace Tests\Unit;

use App\Models\ProjectModel;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    public function test_example()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_create_project_using_factory()
    {
        // Create Project using Factory
        $projects = ProjectModel::factory(1)->create();
        $this->assertNotEmpty($projects);
    }

    public function test_if_seeders_works()
    {
        // Create Project using Seeder
        $this->seed();
        $this->assertTrue(true);
    }

    public function test_stores_new_project()
    {
        // Create Project

        $response = $this->post('api/store', [
            'project_name' => 'Demo Project',
            'project_description' => 'Demo project using test',
            'project_status' => 1,
            'project_code' => $this->rand_string(8),
        ]);

        $response->assertOk();
        $this->assertNotEmpty($response);
    }

    public function test_data_of_project()
    {
        // Look for Project Name in Project Table

        $this->assertDatabaseHas('project', [
            'project_name' => 'Demo Project'
        ]);
    }

    public function test_post_update()
    {
        //Update Project

        $post = ProjectModel::first();
        $this->patch('api/update/' . $post->getKey(), [
            'project_name' => 'update'
        ]);

        $post->refresh();

        $this->assertEquals('update', $post->project_name);
    }

    public function test_delete_project()
    {
        // Delete Project

        $project = ProjectModel::first();

        if ($project) {
            $this->delete('api/destroy/' . $project->getKey());
        }

        $this->assertDatabaseMissing('project', [
            'project_id' => $project->getKey(),
        ]);
    }

    private function rand_string(int $length)
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return substr(str_shuffle($chars), 0, $length);
    }
}
