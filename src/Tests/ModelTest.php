<?php

use App\Models\User;
use PHPUnit\Framework\TestCase;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

class ModelTest extends TestCase
{
    protected $user;
    protected function setUp(): void
    {
        $this->user = new User();
    }
    protected function tearDown() : void{
        $this->user::$number = 10;
    }
    /** @test */
    public function does_this_equals_that()
    {
        // $this->assertSame("Hi", "Hi");
        
        $this->assertEquals(10,$this->user::$number);
        $this->user::$number++;
    }

    /** @test */
    public function second_test()
    {
        $this->assertEquals(10, $this->user::$number);
    }
    /** @test */
    public function can_only_add_integers_to_number(){
        $this->expectException(TypeError::class);
        $this->user->incNum("Hello kid");
    }
}
