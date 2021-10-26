<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEztravelRequest;
use App\Http\Requests\UpdateEztravelRequest;
use App\Repositories\EztravelRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class EztravelController extends AppBaseController
{
    /** @var  EztravelRepository */
    private $eztravelRepository;

    public function __construct(EztravelRepository $eztravelRepo)
    {
        $this->eztravelRepository = $eztravelRepo;
    }

    /**
     * Display a listing of the Eztravel.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $eztravels = $this->eztravelRepository->all();

        return view('eztravels.index')
            ->with('eztravels', $eztravels);
    }

    /**
     * Show the form for creating a new Eztravel.
     *
     * @return Response
     */
    public function create()
    {
        return view('eztravels.create');
    }

    /**
     * Store a newly created Eztravel in storage.
     *
     * @param CreateEztravelRequest $request
     *
     * @return Response
     */
    public function store(CreateEztravelRequest $request)
    {
        $input = $request->all();

        $eztravel = $this->eztravelRepository->create($input);

        Flash::success('Eztravel saved successfully.');

        return redirect(route('eztravels.index'));
    }

    /**
     * Display the specified Eztravel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $eztravel = $this->eztravelRepository->find($id);

        if (empty($eztravel)) {
            Flash::error('Eztravel not found');

            return redirect(route('eztravels.index'));
        }

        return view('eztravels.show')->with('eztravel', $eztravel);
    }

    /**
     * Show the form for editing the specified Eztravel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $eztravel = $this->eztravelRepository->find($id);

        if (empty($eztravel)) {
            Flash::error('Eztravel not found');

            return redirect(route('eztravels.index'));
        }

        return view('eztravels.edit')->with('eztravel', $eztravel);
    }

    /**
     * Update the specified Eztravel in storage.
     *
     * @param int $id
     * @param UpdateEztravelRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEztravelRequest $request)
    {
        $eztravel = $this->eztravelRepository->find($id);

        if (empty($eztravel)) {
            Flash::error('Eztravel not found');

            return redirect(route('eztravels.index'));
        }

        $eztravel = $this->eztravelRepository->update($request->all(), $id);

        Flash::success('Eztravel updated successfully.');

        return redirect(route('eztravels.index'));
    }

    /**
     * Remove the specified Eztravel from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $eztravel = $this->eztravelRepository->find($id);

        if (empty($eztravel)) {
            Flash::error('Eztravel not found');

            return redirect(route('eztravels.index'));
        }

        $this->eztravelRepository->delete($id);

        Flash::success('Eztravel deleted successfully.');

        return redirect(route('eztravels.index'));
    }
}
