<?php

namespace AppBundle\Domain\Service\MovePlayer;

use AppBundle\Domain\Entity\Game\Game;
use AppBundle\Domain\Entity\Player\Player;

/**
 * Class to validate the player asking for the game
 *
 * @package AppBundle\Domain\Service\MovePlayer
 */
class ValidatePlayerService implements ValidatePlayerServiceInterface
{
    /** @var AskPlayerNameInterface */
    protected $askPlayerNameService;

    /**
     * ValidatePlayerService constructor.
     *
     * @param AskPlayerNameInterface $askPlayerNameService
     */
    public function __construct(AskPlayerNameInterface $askPlayerNameService)
    {
        $this->askPlayerNameService = $askPlayerNameService;
    }

    /**
     * Validates the player asking for the name
     *
     * @param Player $player
     * @param Game $game
     * @return void
     * @throws MovePlayerException
     */
    public function validate(Player& $player, Game $game = null)
    {
        // Asks for the name and email of the player
        $data = $this->askPlayerNameService->askPlayerName(
            $player->url(),
            $player->uuid(),
            $game ? $game->uuid() :  null
        );

        if (!$data || !isset($data['name'])) {
            throw new MovePlayerException('Invalid API response - missing "name"!');
        }

        $player->setPlayerIds($data['name'], $data['email'] ?? null);
    }
}
