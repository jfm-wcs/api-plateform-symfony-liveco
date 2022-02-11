<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TodoItemRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=TodoItemRepository::class)
 */
class TodoItem
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"read:todoLists"})
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:todoLists"})
     */
    private string $title;

    /**
     * @ORM\Column(type="boolean")
     */
    private bool $isDone;

    /**
     * @ORM\ManyToOne(targetEntity=TodoList::class, inversedBy="todoItems")
     * @ORM\JoinColumn(nullable=false)
     */
    private TodoList $todoList;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getIsDone(): ?bool
    {
        return $this->isDone;
    }

    public function setIsDone(bool $isDone): self
    {
        $this->isDone = $isDone;

        return $this;
    }

    public function getTodoList(): ?TodoList
    {
        return $this->todoList;
    }

    public function setTodoList(?TodoList $todoList): self
    {
        $this->todoList = $todoList;

        return $this;
    }
}
