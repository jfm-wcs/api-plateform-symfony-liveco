<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TodoListRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use DateTime;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"read:todoLists"}},
 *     formats="json"
 * )
 * @ORM\Entity(repositoryClass=TodoListRepository::class)
 */
class TodoList
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
    private string $name;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"read:todoLists"})
     */
    private DateTime $createdAt;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"read:todoLists"})
     */
    private bool $isActive;

    /**
     * @ORM\OneToMany(targetEntity=TodoItem::class, mappedBy="todoList", orphanRemoval=true)
     * @Groups({"read:todoLists"})
     */
    private Collection $todoItems;

    /**
     * TodoList constructor.
     */
    public function __construct()
    {
        $this->createdAt = new DateTime();
        $this->isActive = true;
        $this->todoItems = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * @return Collection|TodoItem[]
     */
    public function getTodoItems(): Collection
    {
        return $this->todoItems;
    }

    public function addTodoItem(TodoItem $todoItem): self
    {
        if (!$this->todoItems->contains($todoItem)) {
            $this->todoItems[] = $todoItem;
            $todoItem->setTodoList($this);
        }

        return $this;
    }

    public function removeTodoItem(TodoItem $todoItem): self
    {
        if ($this->todoItems->removeElement($todoItem)) {
            // set the owning side to null (unless already changed)
            if ($todoItem->getTodoList() === $this) {
                $todoItem->setTodoList(null);
            }
        }

        return $this;
    }
}
