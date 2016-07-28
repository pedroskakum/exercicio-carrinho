<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SistemaStoreTest extends TestCase
{
    /**
     * teste Logando Errado.
     *
     * @return void
     */
    public function testLogandoErrado()
    {
        $this->visit('/')
            ->press('Login')
            ->seePageIs('/')
            ->seeText('The email field is required')
            ->seeText('The password field is required');

        $this->visit('/')
            ->type(Faker\Factory::create()->email, 'email')
            ->type(str_random(10), 'password')
            ->press('Login')
            ->seePageIs('/')
            ->seeText('Email e senha não conferem');

    }

    /**
     * teste Logando Certo.
     */
    public function testLogandoCerto(){
        
        $password = str_random(10);
        $user = factory(\App\User::class)->create(['email' => Faker\Factory::create()->safeEmail, 'password' => bcrypt($password)]);

        $this->visit('/')
            ->type($user->email, 'email')
            ->type($password, 'password')
            ->press('Login')
            ->seePageIs('/produtos')
            ->seeText($user->name);
    }
}
