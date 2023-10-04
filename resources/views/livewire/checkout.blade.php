<section>
  {{-- style="background-color: #f1efef;" --}}
  <div class="container">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-6">
        <div class="card shadow-sm" style="border-radius: 15px;">
          <div class="card-body p-0">
              <div class="p-5">
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <h1 class="text-black">Checkout</h1>
                </div>
                <hr class="my-4">
                @foreach ($carts as $index=>$cart)
                  <div class="row mb-3 d-flex justify-content-between align-items-center">
                    <div class="col-md-6 col-lg-6 col-xl-6">
                      <h6 class=""> {{$cart['name']}}</h6>
                      <small class="text-black mb-0">Rp{{ number_format($cart['pricesingle'], 0, ',', '.') }}</small>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-6">
                      <p style="float: right">
                          x {{$cart['qty']}}
                      </p>
                    </div>
                  </div>
                  @endforeach
                  <div class="d-flex flex-column">
                    <div class="d-flex flex-row justify-content-between mt-3">
                      <p class="text-uppercase">Diskon</p>
                      <p>-Rp{{ number_format($summary['diskon'], 0, ',', '.') }}</p>
                    </div>
                    <div class="d-flex flex-row justify-content-between mt-3">
                      <p class="text-uppercase">PPN</p>
                      <p>Rp{{ number_format($summary['pajak'], 0, ',', '.') }}</p>
                    </div>
                  </div>
                  
                  <div class="d-flex justify-content-between mt-3">
                    <h5 class="text-uppercase">Total Bill</h5>
                    <h5>Rp{{ number_format($summary['total'], 0, ',', '.') }}</h5>
                  </div>
                  <div class="row justify-content-between">
                    <div class="col-auto">
                      <button wire:click="saveOrder('unpaid')" id="status" class="btn app-btn-dismiss mt-4">
                        {{ __('Save Transaction') }}
                      </button>
                    </div>
                    <div class="col-auto">
                      <button wire:click="saveOrder('paid')" id="status"  class="btn app-btn-primary mt-4 w-full">
                        {{ __('Confirm Bill') }}
                      </button>
                    </div>
                    {{-- <div class="col-6">
                      <button type="submit" value="unpaid" name="status" wire:click="updateStatus({{"unpaid"}})" id="status" class="btn app-btn-primary mt-4">
                        {{ __('Save Transaction') }}
                      </button>
                    </div>
                    <div class="col-6">
                      <button type="submit" value="paid" name="status" wire:click="updateStatus({{"paid"}})" id="status"  class="btn app-btn-primary mt-4 w-full">
                        {{ __('Confirm Bill') }}
                      </button>
                    </div> --}}
                  </div>
                </div>
                </div>
              </div>
            {{-- </form> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
</section>