<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        /*
        $this->userLoggedIn();
        $this->visit('/plastic/list');
        $this->type('test', 'searchContent');
        $this->press('search');
        //$this->seePageIs('/plastic/list');
        $this->see('test');
        */
    }
    public function testPlasticList()
    {
        $this->userLoggedIn();

        $this->call('GET', '/plastic/list');

        $this->assertResponseOk();

        $this->assertViewHas('plastic');
        $this->assertViewHas('search');
    }

    public function testPlasticSave()
    {
        $this->userLoggedIn();

        $this->call('POST', '/plastic/save');

    }
}
