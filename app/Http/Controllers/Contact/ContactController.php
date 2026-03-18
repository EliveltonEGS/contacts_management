<?php

namespace App\Http\Controllers\Contact;

use App\Application\Contact\DTO\ContactCreateDTO;
use App\Application\Contact\DTO\ContactUpdateDTO;
use App\Domain\Contact\Services\ContactService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\ContactFormRequest;
use App\Models\Contact;
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

    public function show(Contact $contact): View
    {
        $data = $this->service->show($contact->id);
        return view('contacts.show', compact('data'));
    }

    public function edit(Contact $contact): View
    {
        $data = $this->service->show($contact->id);
        return view('contacts.edit', compact('data'));
    }

    public function update(ContactFormRequest $request, Contact $contact): RedirectResponse
    {
        $dto = ContactUpdateDTO::makeFromArray($request->validated(), $contact->id);
        $this->service->update($dto);

        return redirect()->back()->with('success', 'Contact updated.');
    }

    public function destroy(Contact $contact): RedirectResponse
    {
        $this->service->delete($contact->id);
        return redirect()->route('contacts.index')->with('success', 'Contact deleted.');
    }
}
