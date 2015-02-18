<?php

class ExampleTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testBasicExample()
	{
		$response = $this->call('GET', '/');

		$this->assertEquals(200, $response->getStatusCode());
	}

	public function testPays()
	{
		$response = $this->call('GET', 'pays');

		$this->assertEquals(200, $response->getStatusCode());
	}

	public function testContact()
	{
		$response = $this->call('GET', 'contact');

		$this->assertEquals(200, $response->getStatusCode());
	}

	public function testArticles()
	{
		$response = $this->call('GET', '/articles');

		$this->assertEquals(404, $response->getStatusCode());
	}

	public function testVideos()
	{
		$response = $this->call('GET', 'videos');

		$this->assertEquals(200, $response->getStatusCode());
	}

	public function testLogin()
	{
		$response = $this->call('GET', '/login');

		$this->assertEquals(200, $response->getStatusCode());
	}

	public function testAdminHome()
	{
		$response = $this->call('GET', '/admin');

		$this->assertEquals(302, $response->getStatusCode());
	}
	public function testAdmin()
	{
		$this->call('GET', '/admin');

		$this->assertRedirectedToAction('AuthenticationController@getIndex');
	}

}
