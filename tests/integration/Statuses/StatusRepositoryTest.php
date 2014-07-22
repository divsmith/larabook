<?php


use Larabook\Statuses\StatusRepository;
use Laracasts\TestDummy\Factory as TestDummy;

class StatusRepositoryTest extends \Codeception\TestCase\Test
{
   /**
    * @var \IntegrationTester
    */
    protected $tester;

    protected function _before()
    {
        $this->repo = new StatusRepository();
    }

    /** @test */
    public function it_gets_all_statuses_for_a_user()
    {
        // Given I have two users
        $users = TestDummy::times(2)->create('Larabook\Users\User');

        // And statuses for both of them
        TestDummy::times(2)->create('Larabook\Statuses\Status', [
            'user_id' => $users[0] -> id,
            'body' => 'My status'
        ]);

        TestDummy::times(2)->create('Larabook\Statuses\Status', [
            'user_id' => $users[1] -> id,
            'body' => 'His status'
        ]);

        // When I fetch statuses for one user
        $statusesForUser = $this->repo->getAllForUser($users[0]->id);

        // Then I should receive only the relevant statuses
        $this->assertCount(2, $statusesForUser);
        $this->assertEquals('My status', $statusesForUser[0]->body);
        $this->assertEquals('My status', $statusesForUser[1]->body);
    }

}