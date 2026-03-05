<?php

namespace App\Http\Controllers\Contact;

use App\Application\Contact\DTO\ContactCreateDTO;
use App\Application\Contact\DTO\ContactUpdateDTO;
use App\Domain\Contact\Services\ContactService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\ContactFormRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    public function __construct(
        private ContactService $service
    ) {}

    public function index(): View
    {
        $data = $this->service->all();
        return view('contacts.index', compact('data'));
    }

    public function create(): View
    {
        return view('contacts.create');
    }

    public function store(ContactFormRequest $request): RedirectResponse
    {
        $dto = ContactCreateDTO::makeFromArray($request->validated());
        $this->service->create($dto);

        return redirect()
            ->route('contacts.index')
            ->with('success', 'Contact created.');
    }

    public function show(int $id): View
    {
        $data = $this->service->show($id);
        return view('contacts.show', compact('data'));
    }

    public function edit(int $id): View
    {
        $data = $this->service->show($id);
        return view('contacts.edit', compact('data'));
    }

    public function update(ContactFormRequest $request, int $id): RedirectResponse
    {
        $dto = ContactUpdateDTO::makeFromArray($request->validated(), $id);
        $this->service->update($dto);

        return redirect()->back()->with('success', 'Contact updated.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->service->delete($id);
        return redirect()->route('contacts.index')->with('success', 'Contact deleted.');
    }
}
