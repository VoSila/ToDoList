<?php

namespace App\Http\Controllers;

use App\Http\Requests\Note\DeleteRequest;
use App\Http\Requests\Note\EditRequest;
use App\Http\Requests\Note\SearchRequest;
use App\Http\Requests\Note\StoreRequest;
use App\Models\Note as NoteModel;
use App\Repository\NotesRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;

class NotesController extends Controller
{
    /**
     * @var NotesRepository
     */
    private NotesRepository $notesRepository;

    /**
     * @param NotesRepository $notesRepository
     */
    public function __construct(NotesRepository $notesRepository)
    {
        $this->notesRepository = $notesRepository;
    }

    /**
     * Page with completed notes
     *
     * @return Factory|View
     */
    public function getCompleted(FormRequest $request): View|Factory
    {
        $elements = $request->elements;

        if ($elements === null) {
            $elements = 3;
        }
        $notes = $this->notesRepository->getNotesByStatus(NoteModel::COMPLETED, $elements);

        return view('completed-notes', ['data' => $notes]);
    }

    /**
     * Page with not completed notes
     *
     * @return Factory|View
     */
    public function getNotCompleted(FormRequest $request): Factory|View
    {
        $elements = $request->elements;

        if ($elements === null) {
            $elements = 3;
        }
        $notes = $this->notesRepository->getNotesByStatus(NoteModel::NOT_COMPLETED, $elements);

        return view('not-completed', ['data' => $notes]);
    }

    /**
     * Store note
     *
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $this->notesRepository->create(
            $request->getName(),
            $request->getMessage(),
            auth()->id()
        );


        return redirect()
            ->route('not.completed.notes')
            ->with('success', trans('translations.sending_message'));
    }

    /**
     * Edit note
     *
     * @param EditRequest $request
     * @return RedirectResponse
     */
    public function edit(EditRequest $request): RedirectResponse
    {
        $this->notesRepository->update(
            $request->getId(),
            $request->getName(),
            $request->getMessage(),
        );

        return redirect()
            ->route('not.completed.notes')
            ->with('success', trans('translations.edit_message'));
    }

    /**
     * @param EditRequest $request
     *
     * @return View
     */
    public function updateNote(EditRequest $request): View
    {
        $note = $this->notesRepository->findById($request->getId());

        return view('edit-note', ['data' => $note]);
    }

    /**
     * Delete note
     *
     * @param DeleteRequest $request
     * @return RedirectResponse
     */
    public function delete(DeleteRequest $request): RedirectResponse
    {
        $this->notesRepository->delete($request->getId());

        return redirect()
            ->route('not.completed.notes')
            ->with('success', trans('translations.delete_message'));
    }

    /**
     * Search note
     *
     * @param SearchRequest $request
     * @return Factory|View
     */
    public function search(SearchRequest $request): View|Factory
    {
        $searchElement = $request->getSearch();
        $searchHistory = session()->get('search_history', []);

        if (!in_array($searchElement, $searchHistory)) {
            $searchHistory[] = $searchElement;
            session()->put('search_history', $searchHistory);
        }

        $note = $this->notesRepository->search($request->getSearch());
        return view('not-completed', ['data' => $note,]);
    }

    /**
     * @param SearchRequest $request
     * @return array|View|null
 */
    public function searchBlock(SearchRequest $request): array|View|null
    {
        $searchElement = $request->getSearch();

        // Сохраняем поисковый запрос в сессии
        $searchHistory = session()->get('search_history', []);
        $searchHistory[] = $searchElement;
        session()->put('search_history', $searchHistory);

        return view('inc.header', ['search' => $searchElement, 'searchHistory' => $searchHistory]);
    }

    /**
     * @return RedirectResponse
     */
    public function searchButton(): RedirectResponse
    {

        session()->forget('search_history');

        return redirect()->route('not.completed.notes');
    }

    /**
     * Mark as completed note
     *
     * @param EditRequest $request
     * @return RedirectResponse
     */
    public function markAsCompleted(EditRequest $request): RedirectResponse
    {
        $this->notesRepository->markAsCompleted($request->getId());

        return redirect()
            ->route('completed.notes')
            ->with('success', trans('translations.done_message'));
    }

    /**
     * @param EditRequest $request
     *
     * @return RedirectResponse
     */
    public function markAsNotCompleted(EditRequest $request): RedirectResponse
    {
        $this->notesRepository->markAsNotCompleted($request->getId());

        return redirect()
            ->route('not.completed.notes')
            ->with('success', trans('translations.sending_message'));
    }
}
