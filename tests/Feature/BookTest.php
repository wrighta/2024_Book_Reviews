<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Book;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class BookTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase; // <--- Add this to ensure database is fresh for each test
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_admin_can_create_book()
    {
        // Fake the storage (so it doesn't actually save files)
        Storage::fake('public');

        // Create an admin user
        $admin = User::factory()->create(['role' => 'admin']);

        // Act as the admin user
        $this->actingAs($admin);

        // Create a fake image file
        //$fakeImage = UploadedFile::fake()->image('test.jpg');

        $fakeImage = UploadedFile::fake()->create('test.jpg');
        // Simulate a POST request to create a book with a real file upload
        $response = $this->post('/books', [
            'title' => 'Test Book',
            'description' => 'A test description',
            'year' => 2023,
            'image' => $fakeImage, // Pass the fake image here
        ]);

        // Assert that the book was inserted in the database
        $this->assertDatabaseHas('books', ['title' => 'Test Book']);

        // Assert the image was actually "stored"
        //Storage::disk('public')->assertExists('images/books/' . $fakeImage->hashName());

        // Assert redirect to books index page
        $response->assertRedirect(route('books.index'));
}

public function test_user_cannot_create_book()
{
    // Fake the storage (so it doesn't actually save files)
    Storage::fake('public');

    // Create a regular user (non-admin)
    $user = User::factory()->create(['role' => 'user']);

    // Act as the regular user
    $this->actingAs($user);

    // Create a fake image file
    $fakeImage = UploadedFile::fake()->create('test.jpg');

    // Simulate a POST request to create a book
    $response = $this->post('/books', [
        'title' => 'Unauthorized Book',
        'description' => 'This should not be allowed',
        'year' => 2023,
        'image' => $fakeImage,
    ]);

    // Assert that the book was NOT inserted in the database
    $this->assertDatabaseMissing('books', ['title' => 'Unauthorized Book']);

    // Assert the user was redirected (status 302)
    $response->assertRedirect(route('books.index'));

    // Assert the session contains the 'Access denied' error
    $response->assertSessionHas('error', 'Access denied.');
}

}
