<?php

namespace Tests\Feature;

use App\Livewire\LivewireUsersDemo;
use App\Livewire\UsersChart;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class DemoPagesTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        User::factory()->create([
            'created_at' => now()->subYears(2)->startOfMonth(),
        ]);
    }

    #[DataProvider('chartPages')]
    public function test_chart_pages_render(string $uri, int $canvasCount): void
    {
        $response = $this->get($uri);

        $response
            ->assertOk()
            ->assertSee('new Chart', false);

        $this->assertSame($canvasCount, substr_count($response->getContent(), '<canvas'));
    }

    /**
     * @return array<string, array{string, int}>
     */
    public static function chartPages(): array
    {
        return [
            'landing page' => ['/', 1],
            'legacy renderer' => ['/legacy', 1],
            'Blade component' => ['/vanilla-blade', 1],
            'multiple Blade components' => ['/vanilla-blade-multi', 2],
            'controller example' => ['/example', 1],
            'Tufte progression' => ['/tufte/charts', 6],
            'Stephen Few makeover' => ['/stephenfew/charts', 2],
        ];
    }

    public function test_livewire_chart_pages_render_and_update(): void
    {
        foreach (['/livewire-users-demo', '/user/chart'] as $uri) {
            $response = $this->get($uri);

            $response->assertOk();
            $this->assertSame(1, substr_count($response->getContent(), '<canvas'));
        }

        Livewire::test(LivewireUsersDemo::class)
            ->set('start', now()->subYear()->startOfMonth()->toDateString())
            ->assertOk()
            ->assertSee('UserRegistrationsChart');

        Livewire::test(UsersChart::class)
            ->set('start', now()->subYear()->startOfMonth()->toDateString())
            ->assertOk()
            ->assertSee('UserRegistrationsChart');
    }
}
