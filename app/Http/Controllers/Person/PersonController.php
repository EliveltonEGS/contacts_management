<?php

namespace App\Http\Controllers\Person;

use App\Application\Person\DTO\PersonDTO;
use App\Application\Person\UseCase\{
    CreatePersonUseCase,
    DeletePersonUseCase,
    FindPersonUseCase,
    GetAllPersonUseCase,
    UpdatePersonUseCase
};
use App\Http\Controllers\Controller;
use App\Http\Requests\Person\PersonFormRequest;
use App\Models\Person;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PersonController extends Controller
{
    public function __construct(
        private GetAllPersonUseCase $getAllPersonUsecase,
        private CreatePersonUseCase $createPersonUseCase,
        private FindPersonUseCase $findPersonUseCase,
        private UpdatePersonUseCase $updatePersonUseCase,
        private DeletePersonUseCase $deletePersonUseCase
    ) {}

    public function index(): View
    {
        $persons = $this->getAllPersonUsecase->execute();
        return view('persons.index', compact('persons'));
    }

    public function create(): View
    {
        return view('persons.create');
    }

    public function store(PersonFormRequest $request): RedirectResponse
    {
        $dto = PersonDTO::makeFromArray($request->validated());
        $this->createPersonUseCase->execute($dto->toEntity());

        return redirect()
            ->back()
            ->with('success', 'Person created successfully.');
    }

    public function show(Person $person): View
    {
        $person = $this->findPersonUseCase->execute($person->id);
        return view('persons.show', compact('person'));
    }

    public function edit(Person $person): View
    {
        $person = $this->findPersonUseCase->execute($person->id);
        return view('persons.edit', compact('person'));
    }

    public function  update(PersonFormRequest $request, Person $person): RedirectResponse
    {
        $dto = PersonDTO::makeFromArray($request->validated(), $person->id);
        $this->updatePersonUseCase->execute($dto->toEntity());

        return redirect()
            ->back()
            ->with('success', 'Person updated successfully.');
    }

    public function destroy(Person $person): RedirectResponse
    {
        $this->deletePersonUseCase->execute($person->id);

        return redirect()
            ->route('persons.index')
            ->with('success', 'Person deleted successfully.');
    }
}
