<?php

namespace AppBundle\Form\CreateGame;

use AppBundle\Domain\Entity\Game\Game;
use AppBundle\Exception\PlayerOutOfBoundsException;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Form entity: GameEntity
 *
 * @package AppBundle\Form\CreateGame
 */
class GameEntity
{
    /**
     * @var int
     * @Assert\NotBlank()
     * @Assert\Range(min=10, max=25)
     */
    private $height = Game::DEFAULT_MAZE_HEIGHT;

    /**
     * @var int
     * @Assert\NotBlank()
     * @Assert\Range(min=10, max=50)
     */
    private $width = Game::DEFAULT_MAZE_WIDTH;

    /**
     * @var int
     * @Assert\NotBlank()
     * @Assert\Range(min=1, max=9)
     */
    private $playerNum = 1;

    /**
     * @var int
     * @Assert\NotBlank()
     * @Assert\Range(min=0, max=50)
     */
    private $minGhosts = Game::DEFAULT_MIN_GHOSTS;

    /**
     * @var int
     * @Assert\NotBlank()
     * @Assert\Range(min=0, max=100)
     */
    private $ghostRate = Game::DEFAULT_GHOST_RATE;

    /**
     * @var int
     * @Assert\NotBlank()
     * @Assert\Range(min=50, max=5000)
     */
    private $limit = Game::DEFAULT_MOVES_LIMIT;

    /**
     * @var string
     * @Assert\Length(min=0, max=48)
     */
    private $name = null;

    /**
     * @var PlayerEntity[]
     * @Assert\Valid()
     */
    private $players = array();

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param int $height
     * @return $this
     */
    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param int $width
     * @return $this
     */
    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @return int
     */
    public function getPlayerNum()
    {
        return $this->playerNum;
    }

    /**
     * @param int $playerNum
     * @return $this
     */
    public function setPlayerNum($playerNum)
    {
        $this->playerNum = $playerNum;
        return $this;
    }

    /**
     * @return int
     */
    public function getMinGhosts()
    {
        return $this->minGhosts;
    }

    /**
     * @param int $minGhosts
     * @return $this
     */
    public function setMinGhosts($minGhosts)
    {
        $this->minGhosts = $minGhosts;
        return $this;
    }

    /**
     * @return int
     */
    public function getGhostRate()
    {
        return $this->ghostRate;
    }

    /**
     * @param int $ghostRate
     * @return $this
     */
    public function setGhostRate($ghostRate)
    {
        $this->ghostRate = $ghostRate;
        return $this;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * @param int $limit
     * @return GameEntity
     */
    public function setLimit(int $limit): GameEntity
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return PlayerEntity[]
     */
    public function getPlayers()
    {
        return $this->players;
    }

    /**
     * @param PlayerEntity[] $players
     * @return $this
     */
    public function setPlayers($players)
    {
        $this->players = $players;
        return $this;
    }

    /**
     * @param PlayerEntity $player
     * @return $this
     */
    public function addPlayer(PlayerEntity $player)
    {
        $this->players[] = $player;
        return $this;
    }

    /**
     * @param int $pos
     * @return PlayerEntity
     * @throws PlayerOutOfBoundsException
     */
    public function getPlayerAt($pos)
    {
        if (!array_key_exists($pos, $this->players)) {
            throw new PlayerOutOfBoundsException('The key ' . $pos . ' in invalid for players array.');
        }
        return $this->players[$pos];
    }
}
