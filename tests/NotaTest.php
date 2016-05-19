<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;

class NotaTest extends TestCase
{
    use DatabaseTransactions; //Trait para hacer rollback a los datos tramitados por la prueba unitaria
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = User::where("email", "test@test.com")->first();
        $this
            ->actingAs($user)
            ->visit("/notas")
            ->see("Notas")
            ->click("Crear")
            ->seePageIs("/notas/create")
            ->type("hola", "title")
            ->type("mundo", "body")
            ->press("Crear")
            ->seePageIs("/notas")
            ->see("hola")
            ->see("mundo");
    }
}
