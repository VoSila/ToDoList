<?php

namespace App\Repository;

use App\Models\Note as NoteModel;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Contracts\Pagination\LengthAwarePaginator;

class NotesRepository
{
    /**
     * Create new note model
     *
     * @param int $userId
     * @param string $name
     * @param string $message
     *
     * @return NoteModel
     */
    public function create(string $name, string $message, int $userId): NoteModel
    {
        $note = new NoteModel();
        $note->status = 0;
        $note->user_id = $userId;
        $note->name = $name;
        $note->message = $message;

        return $this->save($note);
    }

    /**
     * Update note model
     *
     * @param int $id
     * @param string $name
     * @param string $message
     *
     * @return NoteModel|null
     */
    public function update(int $id, string $name, string $message): NoteModel|null
    {
        /** @var NoteModel $note */
        if ($note = NoteModel::query()->find($id)) {
            $note->name = $name;
            $note->message = $message;
            $this->save($note);
        }

        return $note;
    }

    /**
     * Save note model
     *
     * @param NoteModel $notes
     * @return NoteModel
     */
    public function save(NoteModel $notes): NoteModel
    {
        $notes->save();
        return $notes;
    }

    /**
     * Delete note model
     *
     * @param int $id
     * @return Void
     */
    public function delete(int $id): void
    {
        if ($note = $this->findById($id)) {
            $note->delete();
        }
    }

    /**
     * Get notes by status
     *
     * @param int $status
     * @return LengthAwarePaginator
     */
    public function getNotesByStatus(int $status, int $elements): LengthAwarePaginator
    {
        return NoteModel::query()
            ->where(NoteModel::STATUS, $status)
            ->latest()
            ->paginate($elements);
    }

    /**
     * Mark as completed
     *
     * @param int $id
     * @return void
     */
    public function markAsCompleted(int $id): void
    {
        if ($note = $this->findById($id)) {
            $note->update(
                [
                    NoteModel::STATUS => 1
                ]
            );
        }
    }

    /**
     * Mark as not completed
     *
     * @param int $id
     * @return void
     */
    public function markAsNotCompleted(int $id): void
    {
        if ($note = $this->findById($id)) {
            $note->update(
                [
                    NoteModel::STATUS => 0
                ]
            );
        }
    }

    /**
     * Find note model by id
     *
     * @param int $id
     * @return NoteModel|Model|null
     */
    public function findById(int $id): NoteModel|Model|null
    {
        return NoteModel::query()
            ->where(NoteModel::ID, '=', $id)
            ->first();
    }

    /**
     * Search note models
     *
     * @param string $name
     * @return LengthAwarePaginator
     */
    public function search(string $name): LengthAwarePaginator
    {
        return NoteModel::query()
            ->where(NoteModel::NAME, 'LIKE', '%' . $name . '%')
            ->latest()
            ->paginate();
    }
}



