<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatePurchaseTransactionRequest;
use App\Http\Requests\UpdatePurchaseTransactionRequest;
use App\Repositories\PurchaseTransactionRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PurchaseTransactionController extends InfyOmBaseController
{
    /** @var  PurchaseTransactionRepository */
    private $purchaseTransactionRepository;

    public function __construct(PurchaseTransactionRepository $purchaseTransactionRepo)
    {
        $this->purchaseTransactionRepository = $purchaseTransactionRepo;
    }

    /**
     * Display a listing of the PurchaseTransaction.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->purchaseTransactionRepository->pushCriteria(new RequestCriteria($request));
        $purchaseTransactions = $this->purchaseTransactionRepository->all();

        return view('purchaseTransactions.index')
            ->with('purchaseTransactions', $purchaseTransactions);
    }

    /**
     * Show the form for creating a new PurchaseTransaction.
     *
     * @return Response
     */
    public function create()
    {
        return view('purchaseTransactions.create');
    }

    /**
     * Store a newly created PurchaseTransaction in storage.
     *
     * @param CreatePurchaseTransactionRequest $request
     *
     * @return Response
     */
    public function store(CreatePurchaseTransactionRequest $request)
    {
        $input = $request->all();

        $purchaseTransaction = $this->purchaseTransactionRepository->create($input);

        Flash::success('PurchaseTransaction saved successfully.');

        return redirect(route('purchaseTransactions.index'));
    }

    /**
     * Display the specified PurchaseTransaction.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $purchaseTransaction = $this->purchaseTransactionRepository->findWithoutFail($id);

        if (empty($purchaseTransaction)) {
            Flash::error('PurchaseTransaction not found');

            return redirect(route('purchaseTransactions.index'));
        }

        return view('purchaseTransactions.show')->with('purchaseTransaction', $purchaseTransaction);
    }

    /**
     * Show the form for editing the specified PurchaseTransaction.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $purchaseTransaction = $this->purchaseTransactionRepository->findWithoutFail($id);

        if (empty($purchaseTransaction)) {
            Flash::error('PurchaseTransaction not found');

            return redirect(route('purchaseTransactions.index'));
        }

        return view('purchaseTransactions.edit')->with('purchaseTransaction', $purchaseTransaction);
    }

    /**
     * Update the specified PurchaseTransaction in storage.
     *
     * @param  int              $id
     * @param UpdatePurchaseTransactionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePurchaseTransactionRequest $request)
    {
        $purchaseTransaction = $this->purchaseTransactionRepository->findWithoutFail($id);

        if (empty($purchaseTransaction)) {
            Flash::error('PurchaseTransaction not found');

            return redirect(route('purchaseTransactions.index'));
        }

        $purchaseTransaction = $this->purchaseTransactionRepository->update($request->all(), $id);

        Flash::success('PurchaseTransaction updated successfully.');

        return redirect(route('purchaseTransactions.index'));
    }

    /**
     * Remove the specified PurchaseTransaction from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $purchaseTransaction = $this->purchaseTransactionRepository->findWithoutFail($id);

        if (empty($purchaseTransaction)) {
            Flash::error('PurchaseTransaction not found');

            return redirect(route('purchaseTransactions.index'));
        }

        $this->purchaseTransactionRepository->delete($id);

        Flash::success('PurchaseTransaction deleted successfully.');

        return redirect(route('purchaseTransactions.index'));
    }
}
