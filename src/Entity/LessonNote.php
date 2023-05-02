<?php

namespace App\Entity;

use App\Repository\LessonNoteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LessonNoteRepository::class)]
class LessonNote
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $my_lesson = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $my_lesson_part = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $my_lesson_memo = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMyLesson(): ?string
    {
        return $this->my_lesson;
    }

    public function setMyLesson(string $my_lesson): self
    {
        $this->my_lesson = $my_lesson;

        return $this;
    }

    public function getMyLessonPart(): ?string
    {
        return $this->my_lesson_part;
    }

    public function setMyLessonPart(?string $my_lesson_part): self
    {
        $this->my_lesson_part = $my_lesson_part;

        return $this;
    }

    public function getMyLessonMemo(): ?string
    {
        return $this->my_lesson_memo;
    }

    public function setMyLessonMemo(?string $my_lesson_memo): self
    {
        $this->my_lesson_memo = $my_lesson_memo;

        return $this;
    }
}
