<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use App\Models\Book;
use Laravel\Passport\Passport;

class BookControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testUserCanCreateBook()
    {
        // Prepare
        $user = Passport::actingAs(User::factory()->create());
        $book = Book::factory()->make();

        // Act
        $response = $this->postJson('/api/books', $book->toArray());

        // Assert
        $response->assertStatus(201)
            ->assertJsonFragment(['title' => $book->title]);
    }

    public function testUserCanUpdateBook()
    {
        // Prepare
        $user = Passport::actingAs(User::factory()->create());
        $book = Book::factory()->create(['user_id' => $user->id]);
        $newBook = Book::factory()->make();

        // Update the new book's user_id to match the existing user's id
        $newBook->user_id = $user->id;

        // Act
        $response = $this->putJson('/api/books/' . $book->id, $newBook->toArray());

        // Assert
        $response->assertStatus(200)
            ->assertJsonFragment(['title' => $newBook->title]);
    }

    public function testUserCanViewBook()
    {
        // Prepare
        $user = Passport::actingAs(User::factory()->create());
        $book = Book::factory()->create(['user_id' => $user->id]);

        // Act
        $response = $this->getJson('/api/books/' . $book->id);

        // Assert
        $response->assertStatus(200)
            ->assertJsonFragment(['title' => $book->title]);
    }

    public function testUserCanListBooks()
    {
        // Prepare
        $user = Passport::actingAs(User::factory()->create());
        $books = Book::factory()->count(5)->create(['user_id' => $user->id]);

        // Act
        $response = $this->getJson('/api/books');

        // Assert
        $response->assertStatus(200)
            ->assertJsonCount(5);
    }

    public function testUserCanDeleteBook()
    {
        // Prepare
        $user = Passport::actingAs(User::factory()->create());
        $book = Book::factory()->create(['user_id' => $user->id]);

        // Act
        $response = $this->deleteJson('/api/books/' . $book->id);

        // Assert
        $response->assertStatus(204)
            ->assertNoContent();
    }

    public function testUserCanUpdateReadingProgress()
    {
        // Prepare
        $user = Passport::actingAs(User::factory()->create());
        $book = Book::factory()->create(['user_id' => $user->id]);

        // Act
        $response = $this->patchJson('/api/books/' . $book->id . '/reading-progress', ['page_number' => 100]);

        // Assert
        $response->assertStatus(200)
            ->assertJsonFragment(['page_count' => $book->page_count]);
    }
}
