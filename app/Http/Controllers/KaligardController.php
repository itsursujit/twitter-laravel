<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateKaligardRequest;
use App\Http\Requests\UpdateKaligardRequest;
use App\Repositories\KaligardRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class KaligardController extends InfyOmBaseController
{
    /** @var  KaligardRepository */
    private $kaligardRepository;

    public function __construct(KaligardRepository $kaligardRepo)
    {
        $this->kaligardRepository = $kaligardRepo;
    }

    /**
     * Display a listing of the Kaligard.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->kaligardRepository->pushCriteria(new RequestCriteria($request));
        $kaligards = $this->kaligardRepository->all();

        return view('kaligards.index')
            ->with('kaligards', $kaligards);
    }

    /**
     * Show the form for creating a new Kaligard.
     *
     * @return Response
     */
    public function create()
    {
        return view('kaligards.create');
    }

    /**
     * Store a newly created Kaligard in storage.
     *
     * @param CreateKaligardRequest $request
     *
     * @return Response
     */
    public function store(CreateKaligardRequest $request)
    {
        $input = $request->all();

        $kaligard = $this->kaligardRepository->create($input);

        if(!empty($input['image']) ){
            $image = $request->file('image');
            if($image->isValid()) {
                $destinationPath = public_path().'/images/kaligards/';
                $fileName = $kaligard->id . '.'.$image->getClientOriginalExtension();
                $filePath = '/images/kaligards/' . $fileName;
                $this->upload($image, $destinationPath, $fileName);

                $kaligard->image = $filePath;
                $kaligard->update();
            }
        }

        Flash::success('Kaligard saved successfully.');

        return redirect(route('kaligards.index'));
    }

    /**
     * Display the specified Kaligard.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kaligard = $this->kaligardRepository->findWithoutFail($id);

        if (empty($kaligard)) {
            Flash::error('Kaligard not found');

            return redirect(route('kaligards.index'));
        }

        return view('kaligards.show')->with('kaligard', $kaligard);
    }

    /**
     * Show the form for editing the specified Kaligard.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kaligard = $this->kaligardRepository->findWithoutFail($id);

        if (empty($kaligard)) {
            Flash::error('Kaligard not found');

            return redirect(route('kaligards.index'));
        }

        return view('kaligards.edit')->with('kaligard', $kaligard);
    }

    /**
     * Update the specified Kaligard in storage.
     *
     * @param  int              $id
     * @param UpdateKaligardRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKaligardRequest $request)
    {
        $kaligard = $this->kaligardRepository->findWithoutFail($id);

        if (empty($kaligard)) {
            Flash::error('Kaligard not found');

            return redirect(route('kaligards.index'));
        }

        $kaligard = $this->kaligardRepository->update($request->all(), $id);

        Flash::success('Kaligard updated successfully.');

        return redirect(route('kaligards.index'));
    }

    /**
     * Remove the specified Kaligard from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kaligard = $this->kaligardRepository->findWithoutFail($id);

        if (empty($kaligard)) {
            Flash::error('Kaligard not found');

            return redirect(route('kaligards.index'));
        }

        $this->kaligardRepository->delete($id);

        Flash::success('Kaligard deleted successfully.');

        return redirect(route('kaligards.index'));
    }
}
