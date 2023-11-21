@extends('profile.order-edit.layout')

@section('input')
    <form action="{{ route('user.order.design.update', $order->ulid) }}" method="POST" enctype="multipart/form-data"
        onsubmit="validationSelectDesign(event)">
        @csrf
        @method('patch')
        <div class="p-5">
            <div class="mb-3">
                <label class="col-form-label-sm" for="categoryInput">Category</label>
                <select class="form-select form-select-sm" id="categoryInput" aria-label=".form-select-sm example">
                    <option selected disabled>Design - {{ $order->orderable->order_title }}</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="col-form-label-sm" for="planInput">Plan</label>
                <select class="form-select form-select-sm @error('design_plan_id') is-invalid @enderror"
                    name="design_plan_id" id="planInput" aria-label=".form-select-sm example" required>
                    <option selected disabled>Select the plan</option>
                    @foreach ($plans as $plan)
                        <option
                            {{ old('design_plan_id', $order->orderable->plan->id) == $plan->id ? 'selected' : null }}
                            value="{{ $plan->id }}">
                            {{ $plan->title }}</option>
                    @endforeach
                </select>
                @error('design_plan_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="col-form-label-sm" for="nameInput">Name</label>
                <input type="text" class="form-control form-control-sm" name="name_customer" id="nameInput"
                    placeholder="Name" readonly value="{{ old('name_customer', auth()->user()->name) }}">
                <small>
                    <div id="nameHelp" class="form-text">Update profile jika ingin mengubah</div>
                </small>
            </div>
            <div class="mb-3">
                <label class="col-form-label-sm" for="emailInput">Email</label>
                <input type="email" class="form-control form-control-sm" name="email_customer" id="emailInput"
                    placeholder="Email" readonly value="{{ old('email_customer', auth()->user()->email) }}">
                <small>
                    <div id="emailHelp" class="form-text">Update profile jika ingin mengubah</div>
                </small>
            </div>
            <div class="mb-3">
                <label class="col-form-label-sm" for="phoneInput">No Telepon</label>
                <input type="text" class="form-control form-control-sm @error('number_customer') is-invalid @enderror"
                    name="number_customer" id="phoneInput" placeholder="No Telepon"
                    value="{{ old('number_customer', $order->number_customer) }}">
                @error('number_customer')
                    <div id="numberInvalid" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="col-form-label-sm" for="sloganInput">Slogan <span class="text-muted">(Optional)</span></label>
                <input type="text" class="form-control form-control-sm @error('slogan') is-invalid @enderror"
                    name="slogan" id="sloganInput" placeholder="Slogan"
                    value="{{ old('slogan', $order->orderable?->slogan) }}">
                @error('slogan')
                    <div id="sloganInvalid" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="col-form-label-sm" for="colorInput">Color</label>
                <input type="hidden" name="input_type" value="color" id="inputType">
                <div class="d-flex gap-1" id="colorInputSection">
                    <input type="{{ old('input_type', 'color') }}"
                        class="form-control {{ old('input_type') === 'text' ? 'form-control-sm' : 'form-control-color' }}"
                        name="color" id="colorInput" value="{{ old('color', $order->orderable->color) }}">
                    <button type="button" onclick="changeInputType()" id="changeColorInput"
                        class="btn btn-sm btn-general">{{ old('input_type') === 'text' ? 'Ubah ke Input Color?' : 'Ubah ke Input Teks?' }}</button>
                </div>
            </div>
            <div class="mb-3">
                <label for="descriptionInput" class="col-form-label-sm">Description</label>
                <textarea class="form-control form-control-sm @error('description') is-invalid @enderror" name="description"
                    id="descriptionInput" rows="3">{{ old('description', $order->description) }}</textarea>
                @error('description')
                    <div id="descriptionInvalid" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <div id="deleted-id-image" hidden></div>
                <button class="btn btn-sm btn-general" type="button" id="uploadImage" onclick="addNewImage(this)"
                    data-input-image-count="{{ count($order->orderable->images) }}">Want Upload
                    New Image?</button>
                <div id="container-image">
                    @foreach ($order->orderable->images as $image)
                        <div id="imageSection{{ $image->id }}" class="mt-2">
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($image->path) }}"
                                class="preview-image{{ $image->id }} img-fluid col-md-8 col-lg-4 mb-2 rounded"
                                alt="preview image">
                            <div class="d-flex">
                                <div class="mb-3 me-3">
                                    <input class="form-control form-control-sm" name="gambar[]" type="file"
                                        accept=".jpg, .jpeg, .png, .webp" id="image{{ $image->id }}"
                                        onchange="validateDesignFile(this, {{ $image->id }})">
                                </div>
                                <div>
                                    <button class="btn btn-sm btn-danger" type="button"
                                        onclick="deleteImageOld(this,{{ $image->id }})">Delete</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="mb-3 text-center">
            <button type="submit" class="btn btn-general rounded-2">Edit Order</button>
        </div>
    </form>
@endsection

@push('scripts')
    <script>
        const changeInputType = () => {
            const colorInput = `
               <input type="color" class="form-control form-control-color" name="color" id="colorInput" value="{{ old('color', $order->orderable->color) }}" title="Choose your color" />
            `;
            const textInput = `
               <input type="text" class="form-control form-control-sm" name="color" id="colorInput" value="{{ old('color', $order->orderable->color) }}">
            `;

            const currentInputType = $('#colorInput').prop('type');

            $('#colorInput').remove();
            $('#changeColorInput')
                .text(currentInputType === 'text' ? 'Ubah ke Input Teks?' : 'Ubah ke Input Color?')
                .before(currentInputType === 'text' ? colorInput : textInput);
            $('#inputType').val(currentInputType !== 'text' ? 'text' : 'color');
        };

        let imageIndexReal = 0;
        const addNewImage = (input) => {
            const inputImageCount = $(input).data('input-image-count') + 1;
            imageIndexReal++;

            const imageSection = `
               <div id="newImageSection${imageIndexReal}" class="mt-2">
                  <img class="preview-image${imageIndexReal} d-none img-fluid col-md-8 col-lg-4 mb-2 rounded" alt="preview image">
                  <div class="d-flex">
                     <div class="me-3 mb-3">
                           <input class="form-control form-control-sm" name="gambar[]" type="file" accept=".jpg, .jpeg, .png, .webp" id="image${imageIndexReal}" onchange="validateDesignFile(this, ${imageIndexReal})">
                     </div>
                     <div>
                           <button class="btn btn-sm btn-danger" type="button" onclick="deleteImageNew(${imageIndexReal})">Delete</button>
                     </div>
                  </div>
               </div>
            `;

            $('#container-image').append(imageSection);

            // Mengubah nilai data-input-image-count pada elemen tombol
            // Mengubah teks tombol menjadi "More"
            // Menghilangkan tombol "Want Upload Image?" setelah ada 3 input gambar
            $(input).data('input-image-count', inputImageCount)
                .attr('data-input-image-count', inputImageCount)
                .text('More New Image')
                .toggle(inputImageCount < 3);
        }

        const deleteImageNew = (imageIndex) => {
            // Menghapus parent div dengan id yang sesuai
            $(`#newImageSection${imageIndex}`).remove();

            // Mengurangi nilai data-input-image-count
            let uploadImage = $('#uploadImage');
            let currentCount = uploadImage.data('input-image-count');
            uploadImage.data('input-image-count', currentCount - 1)
                .attr('data-input-image-count', currentCount - 1);

            // Memeriksa jika data-input-image-count kurang dari 3, maka tampilkan tombol, dan ketika input countnya 0 berubah isi teks ke "Want Upload Image?"
            (currentCount - 1 < 3) && uploadImage.show();
            (currentCount - 1 == 0) && uploadImage.text('Want Upload New Image?');
        }

        const deleteImageOld = (el, imageId) => {
            // Temukan elemen terdekat dengan ID yang sesuai
            const confirmDelete = confirm("Apakah Anda yakin ingin menghapus gambar ini?");

            if (confirmDelete) {
                const imageDiv = $(el).closest(`#imageSection${imageId}`);

                if (imageDiv) {
                    imageDiv.remove();

                    const deletedImageInput = `
                        <input type="text" name="img_deleted[]" value="${imageId}">
                    `;

                    // Tambahkan input teks ke dalam div "deleted-id-image"
                    $("#deleted-id-image").append(deletedImageInput);

                    // Mengurangi nilai data-input-image-count
                    const uploadImage = $('#uploadImage');
                    const currentCount = uploadImage.data('input-image-count');
                    uploadImage.data('input-image-count', currentCount - 1)
                        .attr('data-input-image-count', currentCount - 1);

                    // Memeriksa jika data-input-image-count kurang dari 3, maka tampilkan tombol, dan ketika input countnya 0 berubah isi teks ke "Want Upload Image?"
                    (currentCount - 1 < 3) && uploadImage.show();
                    (currentCount - 1 == 0) && uploadImage.text('Want Upload New Image?');
                }
            }
        }

        const previewImage = (input, index) => {
            const [file] = input.files;
            if (file) {
                $(`.preview-image${index}`).removeClass("d-none").attr('src', URL.createObjectURL(file));
            }
        }

        const allowedExtensionsDesign = ['jpg', 'jpeg', 'png', 'webp'];

        const validateDesignFile = (input, index) => {
            validateFile(input, allowedExtensionsDesign, index);
            previewImage(input, index);
        }
    </script>
@endpush
