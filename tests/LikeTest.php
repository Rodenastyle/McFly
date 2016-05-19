<?php

use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LikeTest extends TestCase
{
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
            ->visit("/likes")
            ->see("Favoritos");

        /*
            El botón de favorito se ejecuta a través de AJAX, y el método click() espera ser llevado a otra página
            por lo que no he podido ejecutar tal acción en la prueba unitaria.
        */
    }
}
