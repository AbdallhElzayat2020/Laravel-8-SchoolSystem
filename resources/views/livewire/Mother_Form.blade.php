@if ($currentStep != 2)
    <div style="display: none" class="row setup-content" id="step-2">
@endif
<div class="col-xs-12">
    <div class="col-md-12">
        <br>

        <div class="form-row">
            <div class="col">
                <label for="title">{{ trans('Parent_trans.Name_Mother') }}</label>
                <input type="text" wire:model="Name_Mother" class="form-control">
                @error('Name_Mother')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="title">{{ trans('Parent_trans.Name_Mother_en') }}</label>
                <input type="text" wire:model="Name_Mother_en" class="form-control">
                @error('Name_Mother_en')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-3">
                <label for="title">{{ trans('Parent_trans.Job_Mother') }}</label>
                <input type="text" wire:model="Job_Mother" class="form-control">
                @error('Job_Mother')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="title">{{ trans('Parent_trans.Job_Mother_en') }}</label>
                <input type="text" wire:model="Job_Mother_en" class="form-control">
                @error('Job_Mother_en')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col">
                <label for="title">{{ trans('Parent_trans.National_ID_Mother') }}</label>
                <input type="text" wire:model="National_ID_Mother" class="form-control">
                @error('National_ID_Mother')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="title">{{ trans('Parent_trans.Passport_ID_Mother') }}</label>
                <input type="text" wire:model="Passport_ID_Mother" class="form-control">
                @error('Passport_ID_Mother')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col">
                <label for="title">{{ trans('Parent_trans.Phone_Mother') }}</label>
                <input type="text" wire:model="Phone_Mother" class="form-control">
                @error('Phone_Mother')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">{{ trans('Parent_trans.Nationality_Father_id') }}</label>
                <select class="custom-select my-1 mr-sm-2" wire:model="Nationality_Mother_id">
                    <option selected>{{ trans('Parent_trans.Choose') }}...</option>
                    @foreach ($Nationalities as $National)
                        @php
                            $name = json_decode($National->Name, true); // تحويل النص إلى مصفوفة JSON
                        @endphp
                        <option value="{{ $National->id }}">
                            {{ LaravelLocalization::getCurrentLocale() == 'ar' ? $name['ar'] : $name['en'] }}
                        </option>
                    @endforeach
                </select>
                @error('Nationality_Mother_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group col">
                <label for="inputState">{{ trans('Parent_trans.Blood_Type_Father_id') }}</label>
                <select class="custom-select my-1 mr-sm-2" wire:model="Blood_Type_Mother_id">
                    <option selected>{{ trans('Parent_trans.Choose') }}...</option>
                    @foreach ($Type_Bloods as $Type_Blood)
                        @php
                            $name = json_decode($Type_Blood->Name, true);
                        @endphp
                        <option value="{{ $Type_Blood->id }}">
                            {{ $name[LaravelLocalization::getCurrentLocale()] ?? $Type_Blood->Name }}
                        </option>
                    @endforeach
                </select>
                @error('Blood_Type_Mother_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group col">
                <label for="inputZip">{{ trans('Parent_trans.Religion_Father_id') }}</label>
                <select class="custom-select my-1 mr-sm-2" wire:model="Religion_Mother_id">
                    <option selected>{{ trans('Parent_trans.Choose') }}...</option>
                    @foreach ($Religions as $Religion)
                        @php
                            $name = json_decode($Religion->Name, true);
                        @endphp
                        <option value="{{ $Religion->id }}">
                            {{ $name[LaravelLocalization::getCurrentLocale()] ?? $Religion->Name }}
                        </option>
                    @endforeach
                </select>
                @error('Religion_Mother_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>


        <div class="form-group">
            <label for="exampleFormControlTextarea1">{{ trans('Parent_trans.Address_Mother') }}</label>
            <textarea class="form-control" wire:model="Address_Mother" id="exampleFormControlTextarea1" rows="4"></textarea>
            @error('Address_Mother')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-danger btn-sm mx-3 nextBtn btn-lg pull-right" type="button" wire:click="back(1)">
            {{ trans('Parent_trans.Back') }}
        </button>

        <button class="btn btn-success btn-sm mx-3 nextBtn btn-lg pull-right" type="button"
            wire:click="secondStepSubmit">{{ trans('Parent_trans.Next') }}</button>

    </div>
</div>
</div>
