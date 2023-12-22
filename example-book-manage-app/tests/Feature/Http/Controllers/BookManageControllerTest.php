<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\BookManage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookManageControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $book;

    protected function setUp(): void
    {
        parent::setUp();

        $this->book = BookManage::factory()->create();
    }

    /** @test */
    public function トップページindex(): void
    {
        $book = $this->book;

        // データ
        $this->assertDatabaseHas('book_manages', [
            'title' => $book->title,
            'genre' => $book->genre,
        ]);

        // 表示
        $response = $this->get('/');
        $response->assertStatus(200)
            ->assertViewIs('index')
            ->assertSee($book->title)
            ->assertSee($book->genre);
    }

    /** @test */
    public function 新規作成create(): void
    {
        $response = $this->get(route('bookManage.create'));
        $response->assertStatus(200)
            ->assertViewIs('create');
    }

    /** @test */
    public function 新規作成storeバリデーション(): void
    {
        $response = $this->post(route('bookManage.store'), []);

        $response->assertSessionHasErrors([
            'genre' => 'ジャンルは必ず指定してください。',
            'title' => '本のタイトルは必ず指定してください。',
            'body' => '感想は必ず指定してください。',
        ]);

        $this->get(route('bookManage.store'))
            ->assertSee('ジャンルは必ず指定してください。')
            ->assertSee('本のタイトルは必ず指定してください。')
            ->assertSee('感想は必ず指定してください。');
    }

    /** @test */
    public function 新規作成store正常(): void
    {
        $response = $this->post(route('bookManage.store'), [
            'genre' => '新しいgenre',
            'title' => '新しいtitle',
            'body' => '新しいbody',
        ]);

        $this->assertDatabaseHas(BookManage::class, [
            'genre' => '新しいgenre',
            'title' => '新しいtitle',
            'body' => '新しいbody',
        ]);

        $response->assertRedirectToRoute('bookManage.create')
            ->assertSessionHas('message', '新規登録しました');

        $this->followRedirects($response)->assertSee('新規登録しました');
    }

    /** @test */
    public function 詳細ページshow(): void
    {
        $book = $this->book;

        // 表示
        $response = $this->get(route('bookManage.show', $book->id));
        $response->assertStatus(200)
            ->assertViewIs('show');
    }

    /** @test */
    public function 詳細ページdestroy(): void
    {
        $book = $this->book;
        $response = $this->delete(route('bookManage.destroy', $book->id));

        $this->assertModelMissing($book);

        $response->assertRedirectToRoute('bookManage.index')
            ->assertSessionHas('message', '削除しました');

        $this->get('/')->assertSee('削除しました');
    }

    /** @test */
    public function 編集ページedit(): void
    {
        $response = $this->get(route('bookManage.edit', $this->book->id));
        $response->assertStatus(200)
            ->assertViewIs('edit');
    }

    /** @test */
    public function 編集ページupdate表示(): void
    {
        $response = $this->get(route('bookManage.update', $this->book->id));
        $response->assertStatus(200)
            ->assertViewIs('edit');
    }

    /** @test */
    public function 編集ページupdateバリデーション(): void
    {
        $book = $this->book;

        $response = $this->put(route('bookManage.update', ['id' => $book->id]), []);

        $response->assertSessionHasErrors([
            'genre' => 'ジャンルは必ず指定してください。',
            'title' => '本のタイトルは必ず指定してください。',
            'body' => '感想は必ず指定してください。',
        ]);

        $this->get(route('bookManage.update', ['id' => $book->id]))
            ->assertSee('ジャンルは必ず指定してください。')
            ->assertSee('本のタイトルは必ず指定してください。')
            ->assertSee('感想は必ず指定してください。');
    }

    /** @test */
    public function 編集ページupdate正常(): void
    {
        $book = $this->book;

        $response = $this->put(route('bookManage.update', ['id' => $book->id]), [
            'genre' => '編集genre',
            'title' => '編集title',
            'body' => '編集body',
        ]);

        $this->assertDatabaseHas(BookManage::class, [
            'genre' => '編集genre',
            'title' => '編集title',
            'body' => '編集body',
        ]);

        $response->assertRedirectToRoute('bookManage.show', ['id' => $book->id])
            ->assertSessionHas('message', '更新しました');

        $this->followRedirects($response)->assertSee('更新しました');
    }

    /** @test */
    public function showとeditの404(): void
    {
        $response = $this->get(route('bookManage.show', 'test'));
        $response->assertStatus(404);

        $response = $this->get(route('bookManage.show', 99999));
        $response->assertStatus(404);

        $response = $this->get(route('bookManage.edit', 'test'));
        $response->assertStatus(404);

        $response = $this->get(route('bookManage.edit', 99999));
        $response->assertStatus(404);
    }

    /** @test */
    public function ジャンル(): void
    {
        $genre = 'ジャンルテスト';
        $book = BookManage::factory()->create(['genre' => $genre]);

        $response = $this->get("/genre/$genre");
        $response->assertStatus(200)
            ->assertSee($book->genre);
    }

    /** @test */
    public function キーワード検索(): void
    {
        $response = $this->get('/search?search=データに無さそうな文字列です');
        $response->assertStatus(200)
            ->assertSee('まだ登録がありません');

        $searchQuery = $this->book->genre;
        $response = $this->get("/search?search=$searchQuery");
        $response->assertStatus(200)
            ->assertSee($searchQuery);
    }
}
